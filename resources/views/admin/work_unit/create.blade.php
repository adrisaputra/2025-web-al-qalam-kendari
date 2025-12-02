<script src="{{ url('backend/assets/ckeditor/ckeditor.js')}}"></script>
<div class="modal fade" id="kt_modal_add_work_unit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_work_unit_header">
                <h2 class="fw-bolder" id="head_title"></h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form id="myForm" action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_work_unit_scroll" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_work_unit_header" data-kt-scroll-wrappers="#kt_modal_add_work_unit_scroll">

                        <input type="hidden" class="form-control" id="id_work_unit"/>
                            
                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('Nama Unit Kerja') }}</label>
                           <input type="text" class="form-control" placeholder="Nama Unit Kerja" name="name" id="name" />
                            <div id="name-error" class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-bold fs-6 mb-2">{{ __('Apakah Unit Kerja Melakukan SPMB ? ') }}</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="spmb_status" id="spmb_status" class="form-control" onchange="displaySpmbUrl();">
                                        <option value="">- Pilih -</option>
                                        <option value="Y">Ya</option>
                                        <option value="N">Tidak</option>
                                    </select>
                                    <div id="spmb_status-error" class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <div class="col-md-9" id="display_spmb_url" style="display:none">
                                    <input type="text" class="form-control" placeholder="URL Pendaftaran SPMB" name="spmb_url" id="spmb_url" />
                                    <div id="spmb_url-error" class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                            </div>
                        </div>

                        <div class="fv-row mb-7" id="display_spmb_requirement" style="display:none">
                            <label class="fw-bold fs-6 mb-2">{{ __('Persyaratan Pendaftaran SPMB') }}</label>
                            <textarea name="spmb_requirement" id="spmb_requirement" class="form-control ckeditor"></textarea>
                            <div id="spmb_requirement-error" class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-bold fs-6 mb-2">{{ __('Logo Unit Kerja') }}</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <span class="text-red" id="show_image"></span>
                            <div id="image-error" class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                    </div>
                    <div class="text-center pt-15">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm" id="action" title="Tambah Data"> Simpan</button>
                        <button type="button" class="btn btn-warning btn-flat btn-sm" title="Kembali" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function displaySpmbUrl() {
        var status = document.getElementById("spmb_status").value;
        var display_spmb_url = document.getElementById("display_spmb_url");
        var display_spmb_requirement = document.getElementById("display_spmb_requirement");
        if (status === "Y") {
            display_spmb_url.style.display = "block";
            display_spmb_requirement.style.display = "block";
        } else {
            display_spmb_url.style.display = "none";
            display_spmb_requirement.style.display = "none";
            document.getElementById("spmb_url").value = ""; // Clear the URL field when hiding
            document.getElementById("spmb_requirement").value = ""; // Clear the URL field when hiding
        }
    }

    
    CKEDITOR.replace('text', {
        filebrowserUploadUrl: "{{route('upload_news', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

    // FIX: CKEditor di dalam Bootstrap 5 Modal tidak bisa diketik
    document.addEventListener('focusin', (e) => {
        // kalau target ada di dalam ckeditor dialog/iframe → biarkan
        if (e.target.closest('.cke_dialog') || e.target.tagName === 'IFRAME') {
            e.stopImmediatePropagation();
        }
    }, true);

    if (bootstrap && bootstrap.Modal) {
        bootstrap.Modal.prototype._enforceFocus = function() {
            document.removeEventListener('focusin.bs.modal', this._focusinHandler);
        };
    }

    // Inisialisasi CKEditor setiap kali modal dibuka
    $('#kt_modal_add_news').on('shown.bs.modal', function() {
        if (CKEDITOR.instances['text']) {
            CKEDITOR.instances['text'].destroy(true);
        }
    });
</script>
