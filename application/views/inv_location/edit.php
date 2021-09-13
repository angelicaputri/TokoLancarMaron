	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Nota Masuk
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-map-pin"></i> &nbsp; Nota Masuk</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Update Location Data box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Nota Masuk
					</h3>

					<div class="box-tools pull-right">
						<!-- <button class="btn btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
					</div>
				</div>
				<div class="box-body">

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php echo $message;?>
						<form action="<?php echo base_url('locations/edit/').$id ?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data">
							<?php foreach ($data_list->result() as $data){
								$curr_code      = $data->code;
								$curr_nomor     = $data->nomor;
								$curr_masuk     = $data->masuk;
								$curr_tempo     = $data->tempo;
								$curr_lunas 	= $data->lunas;
							} ?>
							<div class="form-group">
								<label for="code" class="control-label col-md-2">Code</label>
								<div class="col-md-8">
									<p class="form-control-static"><?php echo $curr_code ?></p>
									<input type="hidden" name="code" value="<?php echo $curr_code ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="nomor" class="control-label col-md-2">Nomor Nota</label>
								<div class="col-md-8 <?php if (form_error('nomor')) {echo "has-error";} ?>">
									<input type="text" name="nomor" id="nomor" class="form-control" value="<?php echo $curr_nomor ?>"  required>
								</div>
							</div>
							<div class="form-group">
								<label for="masuk" class="control-label col-md-2">Tanggal Masuk</label>
								<div class="col-md-8 <?php if (form_error('masuk')) {echo "has-error";} ?>">
									<input type="date" name="masuk" id="masuk" class="form-control" value="<?php echo $curr_masuk ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label for="tempo" class="control-label col-md-2">Tanggal Jatuh Tempo</label>
								<div class="col-md-8 <?php if (form_error('tempo')) {echo "has-error";} ?>">
									<input type="date" name="tempo" id="tempo" class="form-control" value="<?php echo $curr_tempo ?>"  required>
								</div>
							</div>
							<div class="form-group">
								<label for="lunas" class="control-label col-md-2">Tanggal Lunas</label>
								<div class="col-md-8 <?php if (form_error('lunas')) {echo "has-error";} ?>">
									<input type="date" name="lunas" id="lunas" class="form-control" value="<?php echo $curr_lunas ?>"  required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-2">
									<button type="submit" class="btn btn-primary" onclick="return confirm('Save your data?')">Submit</button>
									<a class="btn btn-danger" href="<?php echo base_url('locations'); ?>" role="button">Cancel</a>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- =========================== / CONTENT =========================== -->
