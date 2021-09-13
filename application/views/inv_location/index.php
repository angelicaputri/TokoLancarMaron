	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Nota Masuk
				<small>Place for your inventory</small>
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-map-marker"></i> &nbsp; Nota Masuk</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<?php echo $message; ?>
			<!-- Insert New Data box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Nota Masuk
					</h3>

					<div class="box-tools pull-right">
						<button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Tampilkan/Sembunyikan</button>
					</div>
				</div>
				<div class="box-body <?php if (!isset($open_form)){ echo "hide";} ?>" id="add_new">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form action="<?php echo base_url('locations/add') ?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
								<label for="code" class="control-label col-md-2">Kode Nota</label>
								<div class="col-md-8 <?php if (form_error('code')) {echo "has-error";} ?>">
									<input type="text" name="code" id="code" class="form-control" value="<?php echo set_value('code'); ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label for="nomor" class="control-label col-md-2">Nomor Nota</label>
								<div class="col-md-8 <?php if (form_error('nomor')) {echo "has-error";} ?>">
									<input type="text" name="nomor" id="nomor" class="form-control" value="<?php echo set_value('nomor'); ?>"  required>
								</div>
							</div>
							<div class="form-group">
								<label for="masuk" class="control-label col-md-2">Tanggal Masuk</label>
								<div class="col-md-8 <?php if (form_error('masuk')) {echo "has-error";} ?>">
									<input type="date" name="masuk" id="masuk" class="form-control" value="<?php echo set_value('masuk'); ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label for="tempo" class="control-label col-md-2">Tanggal Jatuh Tempo</label>
								<div class="col-md-8 <?php if (form_error('tempo')) {echo "has-error";} ?>">
									<input type="date" name="tempo" id="tempo" class="form-control" value="<?php echo set_value('tempo'); ?>"  required>
								</div>
							</div>
							<div class="form-group">
								<label for="lunas" class="control-label col-md-2">Tanggal Lunas</label>
								<div class="col-md-8 <?php if (form_error('lunas')) {echo "has-error";} ?>">
									<input type="date" name="lunas" id="lunas" class="form-control" value="<?php echo set_value('lunas'); ?>"  required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-2">
									<button type="submit" class="btn btn-primary" onclick="return confirm('Tambah data?')">Tambah Data</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Nota Masuk
					</h3>

					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Nomor Nota</th>
									<th>Tanggal Masuk</th>
									<th>Tanggal Jatuh Tempo</th>
									<th>Tanggal Lunas</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
							<?php if (count($data_list->result())>0): ?>
								<?php foreach ($data_list->result() as $data): ?>
								<tr>
									<td><?php echo $data->code; ?></td>
									<td><?php echo $data->nomor; ?></td>
									<td><?php echo $data->masuk; ?></td>
									<td><?php echo $data->tempo; ?></td>
									<td><?php echo $data->lunas; ?></td>
									<td width="5%">
										<form action="<?php echo base_url('locations/delete/'.$data->id) ?>" method="post" autocomplete="off">
											<div class="btn-group-vertical">
												<a class="btn btn-sm btn-primary" href="<?php echo base_url('locations/edit/'.$data->id) ?>" role="button"><i class="fa fa-pencil"></i> </a>
												<input type="hidden" name="id" value="<?php echo $data->id; ?>">
												<button type="submit" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i></button>
											</div>
										</form>
									</td>
								</tr>
								<?php endforeach ?>
							<?php else: ?>
								<tr>
									<td class="text-center" colspan="6">No Data Found!</td>
								</tr>
							<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<?php echo $pagination; ?>
					<?php //echo $last_query ?>&nbsp;
					<!-- Footer -->
				</div>
				<!-- /.box-footer-->
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- =========================== / CONTENT =========================== -->
