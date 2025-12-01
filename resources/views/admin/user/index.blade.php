@extends('admin.layout')
@section('content')

<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h3>Data User</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-icon btn-sm me-2 mb-2" title="Refresh Halaman"><i class="fa fa-undo"></i></a>
                            <a class="btn btn-success btn-sm me-2 mb-2" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" onClick="clearForm()"><i class="fa fa-plus"></i>Tambah User</a>
                        </div>
                    </div>

                @include('admin.user.create')
					
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300 gy-2 gs-6" id="user-table">
                            <thead style="background-color: #d30e00;">
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th style="width: 2%;color: white;border-bottom: white;" >Number</th>
                                    <th style="width: 2%;color: white;border-bottom: white;" >No</th>
                                    <th style="color: white;border-bottom: white;">Nama User</th>
                                    <th style="color: white;border-bottom: white;">Email</th>
                                    <th style="color: white;border-bottom: white;">Nama Pegawai</th>
                                    <th style="color: white;border-bottom: white;">Grup</th>
                                    <th style="width: 10%;color: white;border-bottom: white;">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    var table;

    $(document).ready(function () {
        table = $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.list') }}",
            columns: [
				{data: 'id', name: 'id', visible: false},
				{data: 'number', name: 'number'}, // Kolom nomor urut
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'employee', name: 'employee'},
                {data: 'group', name: 'group'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
			order: [
				[0, 'desc'] // Mengatur pengurutan kolom pertama (id) secara descending
			],
            paging: true,
			drawCallback: function () {
                var api = this.api();
                var startIndex = api.context[0]._iDisplayStart; // Indeks baris pertama di halaman
                api.column(1, {page: 'current'}).nodes().each(function (cell, i) {
                    cell.innerHTML = startIndex + i + 1; // Menghitung nomor urut berdasarkan indeks baris dan nomor halaman
                });
            }
        });

        $('#myForm').submit(function (e) {
            e.preventDefault(); // Hindari pengiriman form secara default

            var action = document.getElementById('action').innerText;
            var id_user = $('#id_user').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var group_id = $('#group_id').val();
            var agency_id = $('#agency_id').val();
            var counter_id = $('#counter_id').val();
            var password_confirmation = $('#password_confirmation').val();

            // Buat objek FormData untuk mengirim data form, termasuk file
            var formData = new FormData();
            formData.append('id', id_user);
            formData.append('name', name);
            formData.append('email', email);
            formData.append('password', password);
            formData.append('group_id', group_id);
            formData.append('agency_id', agency_id);
            formData.append('counter_id', counter_id);
            formData.append('password_confirmation', password_confirmation);
            formData.append('_token', "{{ csrf_token() }}");

            // Kirim permintaan validasi ke controller via Ajax
            var url = "{{ url('/user/validate') }}";
            $.ajax({
                url: url + "/" + action,
                type: "POST",
                data: formData,
                contentType: false, // Tidak mengatur contentType secara otomatis
                processData: false, // Tidak memproses data secara otomatis
                success: function (response) {
                   
                    $('.fv-plugins-message-container').html(''); // Hapus pesan kesalahan
                    $('.is-invalid').removeClass('is-invalid'); // Hapus kelas is-invalid dari bidang-bidang yang divalidasi

                    if (action === "Simpan") {
                        send();
                    } else {
                        update(id_user);
                    }

                },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;

                    // Bersihkan semua pesan kesalahan sebelum menampilkan yang baru
                    $('.fv-plugins-message-container').html('');

                    // Tampilkan pesan kesalahan untuk setiap bidang jika ada
                    if (errors) {
                        $.each(errors, function (key, value) {
                            $('#' + key + '-error').html(value[0]);
                        });
                    }
                }
            });
        });

    });

    function clearForm(){
        document.getElementById("head_title").textContent = "Tambah User";
        $('#myForm')[0].reset();
        document.getElementById("action").textContent = "Simpan";
    }

    // Fungsi untuk menampilkan notifikasi toast dengan ikon centang
    function showSuccessToast(message) {
        toastr.success(message, '', {
            iconClass: 'toast-success', // Kelas untuk ikon centang
        });
    }
    
    // Create Data
    function send() {
        var formData = new FormData($('#myForm')[0]); // Buat objek FormData dari formulir

        // Kirim data formulir ke server menggunakan AJAX
        $.ajax({
            url: "{{ url('user/store') }}",
            type: "POST",
            data: formData,
            contentType: false, // Biarkan jQuery menentukan contentType secara otomatis
            processData: false, // Biarkan jQuery menangani proses data secara otomatis
            success: function (response) {
                showSuccessToast(response.message); // Tampilkan notifikasi toast
                $('#myForm')[0].reset(); // Reset form setelah berhasil menambahkan data
                $('#kt_modal_add_user').modal('hide');
                table.ajax.reload(null, false);
            },
            error: function (xhr) {
                // Tangani kesalahan jika pengiriman formulir gagal
                console.error("Error pengiriman formulir:", xhr);
            }
        });
    }
        
    // Get Data
    function getData(id){
        document.getElementById("head_title").textContent = "Ubah User";
        document.getElementById("action").textContent = "Update";
        // Kirim data formulir ke server menggunakan AJAX

        var url = "{{ url('/user/edit') }}";
        $.ajax({
            url: url + "/" + id,
            type: "GET",
            success: function (response) {
                document.getElementById("id_user").value = response.data.id;
                document.getElementById("name").value = response.data.name;
                document.getElementById("email").value = response.data.email;
                document.getElementById("group_id").value = response.data.group_id;
                document.getElementById("agency_id").value = response.data.agency_id;
                document.getElementById("counter_id").value = response.data.counter_id;
                togglePositionInput(response.data.group_id);
                console.log(response.data.group_id);

                var url = "{{ url('/get_counter') }}";
                $.ajax({
                    url: url + "/" + response.data.agency_id +"/" + response.data.counter_id,
                    success: function(response){
                        $("#counter_id").html(response);
                    }
                });

            },
            error: function (xhr) {
                // Tangani kesalahan jika pengiriman formulir gagal
                console.error("Error pengiriman formulir:", xhr);
            }
        });
    }

    function togglePositionInput(value) {
        if (value === 1) {
            document.getElementById('xxx').style.display = 'none'; 
            document.getElementById('yyy').style.display = 'none'; 
        } else if (value === 2) {
            document.getElementById('xxx').style.display = 'inline'; 
            document.getElementById('yyy').style.display = 'none'; 
        } else {
            document.getElementById('xxx').style.display = 'inline'; 
            document.getElementById('yyy').style.display = 'inline'; 
        }
    }

    // Update Data
    function update(id) {
        var formData = new FormData($('#myForm')[0]); // Buat objek FormData dari formulir
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('_method', "PUT");
        
        // Kirim data formulir ke server menggunakan AJAX

        var url = "{{ url('/user/edit') }}";
        $.ajax({
            url: url + "/" + id,
            type: "POST",
            data: formData,
            contentType: false, // Biarkan jQuery menentukan contentType secara otomatis
            processData: false, // Biarkan jQuery menangani proses data secara otomatis
            success: function (response) {
                showSuccessToast(response.message); // Tampilkan notifikasi toast untuk keberhasilan
                $('#myForm')[0].reset(); // Reset form setelah berhasil memperbarui data
                $('#kt_modal_add_user').modal('hide'); // Tutup modal setelah berhasil memperbarui data
                table.ajax.reload(null, false); // Muat ulang DataTables setelah update
            },
            error: function (xhr) {
                // Tangani kesalahan jika pengiriman formulir gagal
                console.error("Error pengiriman formulir:", xhr);
            }
        });
    }
    
    // Delete Data
    function deleteData(id) {
        new Swal({
            title: 'Apakah Kamu Yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em'
        }).then(function (result) {
            if (result.isConfirmed) {
                new Swal(
                    'Deleted!',
                    'Data Berhasil Dihapus.',
                    'success'
                ).then(function () {
                    var url = "{{ url('/user/delete') }}";
                    $.ajax({
                        url: url + "/" + id,
                        success: function (response) {
                            showSuccessToast(response.message);
                            $('#myForm')[0].reset();
                            table.ajax.reload(null, false);
                        },
                        error: function (xhr) {
                            console.error("Error pengiriman formulir:", xhr);
                        }
                    });
                });
            }
        });
    }



</script>

       
@endsection