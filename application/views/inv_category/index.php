	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Data Supplier/Sales
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-star"></i> &nbsp; Data Supplier/Sales</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<?php echo $message;?>

			<!-- Insert New Data box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Supplier/Sales
					</h3>

					<div class="box-tools pull-right">
						<button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Tampilkan/Sembunyikan</button>
					</div>
				</div>
				<div class="box-body <?php if (!isset($open_form)){ echo "hide";} ?>" id="add_new">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form action="<?php echo base_url('categories/add') ?>" method="post" autocomplete="off" class="form form-horizontal">
							<div class="form-group">
								<label for="code" class="control-label col-md-2">Kode</label>
								<div class="col-md-8 <?php if (form_error('code')) {echo "has-error";} ?>">
									<input type="text" name="code" id="code" class="form-control" value="<?php echo set_value('code'); ?>"  required>
									<?php //echo form_error('code'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="control-label col-md-2">Nama Perusahaan</label>
								<div class="col-md-8 <?php if (form_error('name')) {echo "has-error";} ?>">
									<input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name'); ?>"  required>
								</div>
							</div>
							<div class="form-group">
								<label for="sales" class="control-label col-md-2">Nama Sales</label>
								<div class="col-md-8 <?php if (form_error('sales')) {echo "has-error";} ?>">
									<input type="text" name="sales" id="sales" class="form-control" value="<?php echo set_value('sales'); ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label for="telepon" class="control-label col-md-2">Nomor Telepon</label>
								<div class="col-md-8 <?php if (form_error('telepon')) {echo "has-error";} ?>">
									<input type="number" name="telepon" id="telepon" class="form-control" value="<?php echo set_value('telepon'); ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-2">
									<button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?')">Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->



			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Import Excel
					</h3>

					<div class="box-tools pull-right">
						<button class="btn btn-default btn-box-tool" title="Show / Hide" id="helo"><i class="fa fa-plus"></i> Tampilkan/Sembunyikan</button>
					</div>
				</div>
				<div class="box-body <?php if (!isset($open_form)){ echo "hide";} ?>" id="add_neww">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form method="post" id="import_form" enctype="multipart/form-data" action="<?php echo base_url('excel_import/importSS') ?>" method="post">
						   <p><label>Pilih File Excel</label>
						   <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
						   <input type="submit" name="import" value="Import" class="btn btn-info" />
						</form>
					</div>
				</div>
				</div>
				<!-- /.box-body -->


			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Data Supplier/Sales
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
									<th>Nama Perusahaan</th>
									<th>Nama Sales</th>
									<th>Nomor Telpon</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
							<?php if (count($data_list->result())>0): ?>
								<?php foreach ($data_list->result() as $data): ?>
								<tr>
									<td><?php echo $data->code; ?></td>
									<td><?php echo $data->name; ?></td>
									<td><?php echo $data->sales; ?></td>
									<td><?php echo $data->telepon; ?></td>
									<td width="5%">
										<form action="<?php echo base_url('categories/delete/'.$data->id) ?>" method="post" autocomplete="off">
											<div class="btn-group-vertical">
												<a class="btn btn-sm btn-primary" href="<?php echo base_url('categories/edit/'.$data->id) ?>" role="button"><i class="fa fa-pencil"></i></a>
												<input type="hidden" name="id" value="<?php echo $data->id; ?>">
												<button type="submit" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i></button>
											</div>
										</form>
									</td>
								</tr>
								<?php endforeach ?>
							<?php else: ?>
								<tr>
									<td class="text-center" colspan="5">Tidak Ada Data!</td>
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
