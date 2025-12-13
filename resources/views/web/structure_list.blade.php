<div class="heading-block border-bottom-0" style="margin-bottom: 0px;">
	<h3 style="color:#f44336" data-animate="fadeInUp" data-delay="100">{{ $title }}</h3>
</div>
<table class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300 gy-2 gs-6" id="realization-table" data-animate="fadeInUp" data-delay="100">
	<thead style="background-color: #d30e00;">
		<tr class="text-start text-muted fw-bolder fs-7 gs-0">
			<th style="color: white;border-bottom: white;">Nama</th>
			<th style="color: white;border-bottom: white;">Jabatan</th>
			<th style="color: white;border-bottom: white;"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($structure as $i => $v)
		<tr>
			<td>{{ $v->name }}</td>
			<td>{{ $v->position }}</td>
			<td><button class="btn btn-info me-2" style="color: #fff;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-scrollable" onClick="showDesc({{ $v->id}})">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right-circle">
						<circle cx="12" cy="12" r="10"></circle>
						<polyline points="12 16 16 12 12 8"></polyline>
						<line x1="8" y1="12" x2="16" y2="12"></line>
					</svg>
				</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="modal fade bs-example-modal-scrollable" tabindex="-1" role="dialog" aria-labelledby="scrollableModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"></h4>
				<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body">
				<table class="table table-rounded border table-row-bordered gy-2 gs-6" id="realization-table" data-animate="fadeInUp" data-delay="100">
					<tbody>
						<tr>
							<td><span class="text-red" id="show_photo"></span></td>
						</tr>
						<tr>
							<td style="background-color: #FF9800;color:#fff;font-weight:bold;text-align:center" id="show_name"></td>
						</tr>
						<tr>
							<td>
								<p style="font-weight:bold;text-align:center">Profil:</p>
								<p id="show_desc"></p>
							</td>
						</tr>
					</tbody>
				</table>
                
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('frontend/js/functions.js') }}"></script>
<script>
	function showDesc(id){
		$.ajax({
			url: "{{ url('page-get-structure') }}/"+id,
			method:'GET',
			success : function (response){
				document.getElementById('show_name').textContent = response.structure.name;
				
                if(response.structure.photo){
                    var photoLink = '<center><img src="{{ asset("storage/upload/structure/") }}/' + response.structure.photo + '"  style="width:40%"><center>';
                    document.getElementById("show_photo").innerHTML = photoLink;
                } else {
                    document.getElementById("show_photo").innerHTML = '';
                }

				$('#show_desc').html(response.structure.desc);
			}
		});
	}
</script>