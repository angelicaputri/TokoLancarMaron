	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Toko Lancar Maron
				<small>Semua data barang</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url("inventory") ?>"><i class="fa fa-archive"></i> Toko Lancar Maron</a></li>
				<li class="active">Semua Data</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Import Excel
					</h3>

					<div class="box-tools pull-right">
						<button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Tampilkan/Sembunyikan</button>
					</div>
				</div>
				<div class="box-body <?php if (!isset($open_form)){ echo "hide";} ?>" id="add_new">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form method="post" id="import_form" enctype="multipart/form-data" action="<?php echo base_url('excel_import/import') ?>" method="post">
						   <p><label>Pilih File Excel</label>
						   <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
						   <input type="submit" name="import" value="Import" class="btn btn-info" />
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>

			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<a href="<?php echo base_url("inventory/createXLS") ?>" target="blank" class="btn btn-sm btn-primary"> <i class="fa fa-file-excel-o"></i></a>
					<div class="box-tools pull-right">
						<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<?php echo $message;?>
					<div class="table-responsive" id="customer_data">
						<table class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Sales/Supplier</th>
									<th>Satuan</th>
									<th>Harga Dasar</th>
									<th>Harga Grosir</th>
									<th>Harga Eceran</th>
									<th>Stok Awal</th>
									<th>Masuk</th>
									<th>Keluar</th>
									<th>Stok Akhir</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
							<?php if (count($data_list->result())>0): ?>
								<?php foreach ($data_list->result() as $data): ?>
								<tr>
									<td><?php echo $data->code; ?></td>
									<td><?php echo $data->brand; ?></td>
									<td><?php echo $data->category_name; ?></td>
									<td><?php echo $data->satuan; ?></td>
									<td><?php echo $data->dasar; ?></td>
									<td><?php echo $data->grosir; ?></td>
									<td><?php echo $data->ecer; ?></td>
									<td><?php echo $data->awal; ?></td>
									<td><?php echo $data->masuk; ?></td>
									<td><?php echo $data->keluar; ?></td>
									<td><?php echo $data->akhir; ?></td>
									<td width="5%">
										<form action="<?php echo base_url('inventory/delete/'.$data->code) ?>" method="post" autocomplete="off">
											<div class="btn-group-vertical"><!-- 
												<a class="btn btn-sm btn-default" href="<?php //echo base_url('inventory/detail/'.$data->code) ?>" role="button"><i class="fa fa-eye"></i> Detail</a> -->
												<a class="btn btn-sm btn-primary" href="<?php echo base_url('inventory/edit/'.$data->code) ?>" role="button"><i class="fa fa-pencil"></i></a>
												<input type="hidden" name="id" value="<?php echo $data->id; ?>">
												<button type="submit" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i></button>
											</div>
										</form>
									</td>
								</tr>
								<?php endforeach ?>
							<?php else: ?>
								<tr>
									<td class="text-center" colspan="12">No Data Found!</td>
								</tr>
							<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<?php echo $pagination; ?>
					<?php echo (isset($last_query)) ? $last_query : ""; ?>&nbsp;
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
