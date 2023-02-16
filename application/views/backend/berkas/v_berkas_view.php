<?php

$this->load->view('Backend/Parts/header');
$this->load->view('Backend/Parts/navbar_main');
$this->load->view('Backend/Parts/sidebar');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Profile</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Profile</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<div class="content">
		<div class="container-fluid">
			<div class="row">

				<div class="col-lg-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="card-title">Kelola PO</h5>
						</div>
						<div class="card-body">

												<form class="form" method="post" id="frm_add">

								<div class="form-group row">
									<label for="input_customer_name" class="col-sm-2 col-form-label">Customer Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_no" name="input_customer_name" placeholder="Customer Name">
									</div>
								</div>

								<div class="form-group row">
									<label for="input_customer_id" class="col-sm-2 col-form-label">Customer ID</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_customer_id" name="input_customer_id" placeholder="Customer ID">
									</div>
								</div>

								<div class="form-group row">
									<label for="input_project_id" class="col-sm-2 col-form-label">Project ID</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="input_project_id" name="input_project_id" placeholder="Project ID">
									</div>
								</div>

								<div class="form-group row">
									<label for="input_project_date" class="col-sm-2 col-form-label">Project Date</label>
									<div class="col-md-3">
										<input type="date" class="form-control" id="input_project_date" name="input_project_date" placeholder="Project Date">
									</div>
								</div>

								<div class="form-group row">
									<label for="input_jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="input_jenis_barang" name="input_jenis_barang" placeholder="Jenis Barang">
									</div>
								</div>

                                <div class="form-group row">
									<label for="input_nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="input_nama_barang" name="input_nama_barang" placeholder="Nama Barang">
									</div>
								</div>

                                <div class="form-group row">
									<label for="input_ukuran_barang" class="col-sm-2 col-form-label">Ukuran Barang</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="input_ukuran_barang" name="input_ukuran_barang" placeholder="Ukuran Barang">
									</div>
								</div>

                                <div class="form-group row">
									<label for="input_warna_barang" class="col-sm-2 col-form-label">Warna Barang</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="input_nama_barang" name="input_warna_barang" placeholder="Warna Barang">
									</div>
								</div>

                                <div class="form-group row">
									<label for="input_keterangan" class="col-sm-2 col-form-label">Keterangan</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="input_keterangan" name="input_keterangan" placeholder="Keterangan">
									</div>
								</div>


							</form>


						</div>

						<div class="card-footer">
							<button type="button" class="btn btn-primary" id="btn_save">Save</button>
						</div>

					</div><!-- /.card -->
				</div>

			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('Backend/Parts/footer'); ?>

<script>
	var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000
	});


	function set_editable(is_edit = false) {
		var btn_txt = $('#btn_edit').text();
		var btn_save = $('#btn_save');

		var input_customer_id = $('#input_customer_id');
		var input_customer_name = $('#input_customer_name');
		var input_project_id = $('#input_project_id');
		var input_project_date = $('#input_project_date');
		var input_jenis_barang = $('#input_jenis_barang');
		var input_ukuran_barang = $('#input_ukuran_barang');
		var input_warna_barang = $('#input_warna_barang');
		var input_keterangan = $('#input_keterangan');

		if (is_edit) {
			input_customer_name.prop('readonly', false);
			input_project_id.prop('readonly', false);
			if (input_project_id.val() == '') {
				input_project_id.prop('readonly', false);
			}
			// input_email.prop('readonly', false);
			btn_save.prop('hidden', false);
			btn_txt = 'Cancel';
			$('#btn_edit').removeClass('btn-primary');
			$('#btn_edit').addClass('btn-danger');
		} else {
			input_customer_name.prop('readonly', true);
			input_project_id.prop('readonly', true);
			// if (input_nik.val() != '') {
				input_project_id.prop('readonly', true);
			// }
			// input_email.prop('readonly', true);
			btn_save.prop('hidden', true);
			btn_txt = 'Edit';
			$('#btn_edit').removeClass('btn-danger');
			$('#btn_edit').addClass('btn-primary');
		}

		$('#btn_edit').text(btn_txt);
	}

	$('#btn_edit').on('click', function(e) {
		var btn_txt = $(this).text();
		if (btn_txt == 'Edit') {
			set_editable(true);
		} else {
			set_editable(false);
		}
	});


	$('#btn_save').on('click', function(e) {
		var link_berkas = '<?= base_url() . 'backend/berkas/update'; ?>';

		var form = $('#frm_berkas');
		var data = form.serializeArray();
		var formHtml = form[0];
		var NewData = new FormData(formHtml);

		var input_project_id = $('#input_project_id');

		if(!input_nik.prop('readonly')){
			NewData.append('input_project_id', input_project_id.val());
		}

		$.ajax({
			url: link_berkas,
			type: "POST",
			data: NewData,
			dataType: "JSON",
			contentType: false,
			cache: false,
			processData: false
		}).done(function(response) {

			if (response.success) {
				Toast.fire({
					icon: 'success',
					title: response.msg
				});

				set_editable(false);

			} else {
				Toast.fire({
					icon: 'error',
					title: response.msg
				});
			}
		});
	});
</script>
