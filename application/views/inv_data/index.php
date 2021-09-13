	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Toko Lancar Maron
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-archive"></i> &nbsp; Toko Lancar Maron</li>
				<li class="active">Tambah Data</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Insert New Data box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data
					</h3>

					<div class="box-tools pull-right">
						<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
					</div>
				</div>
				<div class="box-body show" id="add_new">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php echo $message;?>
						<form id="input_form" action="<?php echo base_url('inventory/add') ?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data" name="autoSumForm">
								<h3>Informasi Barang</h3>
								<fieldset>
									<div class="form-group">
										<label for="code" class="control-label col-md-2">Kode Barang</label>
										<div class="col-md-4">
											<input type="text" name="code" id="code" class="form-control required" required>
										</div>
									</div>
									<div class="form-group">
										<label for="brand" class="control-label col-md-2">Nama Barang</label>
										<div class="col-md-8">
											<input type="text" name="brand" id="brand" class="form-control required" required>
											<div class="autocomplete-suggestions hide">
										    <div class="autocomplete-suggestion autocomplete-selected"></div>
										    <div class="autocomplete-suggestion"></div>
										    <div class="autocomplete-suggestion"></div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="sales" class="control-label col-md-2">Supplier/Sales</label>
										<div class="col-md-4">
											<select name="sales" id="sales" class="form-control select2 required" style="width:100%">
												<?php foreach ($cat_list->result() as $lls) {
													echo "<option value='".$lls->id."'>".$lls->name."</option>";
													} ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="satuan" class="control-label col-md-2">Satuan</label>
										<div class="col-md-4">
											<input type="text" name="satuan" id="satuan" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label for="dasar" class="control-label col-md-2">Harga Dasar</label>
										<div class="col-md-4">
											<input type="number" name="dasar" id="dasar" class="form-control required" required>
										</div>
									</div>
									<div class="form-group">
										<label for="grosir" class="control-label col-md-2">Harga Grosir</label>
										<div class="col-md-4">
											<input type="number" name="grosir" id="grosir" class="form-control required" required>
										</div>
									</div>
									<div class="form-group">
										<label for="ecer" class="control-label col-md-2">Harga Eceran</label>
										<div class="col-md-4">
											<input type="number" name="ecer" id="ecer" class="form-control required" required>
										</div>
									</div>
									<div class="form-group">
										<label for="awal" class="control-label col-md-2">Stok Awal</label>
										<div class="col-md-4">
											<input type="number" name="awal" id="awal" class="form-control prc required" onfocus="startCalculate()" onblur="stopCalc()" required>
										</div>
									</div>
									<div class="form-group">
										<label for="masuk" class="control-label col-md-2">Masuk</label>
										<div class="col-md-4">
											<input type="number" name="masuk" id="masuk" class="form-control required" onFocus="startCalc();" onBlur="stopCalc();" required>
										</div>
									</div>
									<div class="form-group">
										<label for="keluar" class="control-label col-md-2">Keluar</label>
										<div class="col-md-4">
											<input type="number" name="keluar" id="keluar" class="form-control required" onFocus="startCalc();" onBlur="stopCalc();" required>
										</div>
									</div>
									<div class="form-group">
										<label for="keluar" class="control-label col-md-2">Stok Akhir</label>
										<div class="col-md-4">
											<input type="number" name="akhir" id="akhir" class="form-control" readonly>
										</div>
									</div>
								</fieldset>
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Toko Lancar Maron
					</h3>

					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
					  <div class="col-md-8 col-md-offset-2">
							<div class="btn-group btn-group-justified">
								<div class="btn-group">
									<button class="btn btn-default" title="Show / Hide" id="myboxwidget">
										<i class="fa fa-plus fa-3x"></i><br>
										<h4>Tambah Data</h4>
									</button>
								</div>
								<a href="<?php echo base_url('inventory/all'); ?>" class="btn btn-default" role="button">
									<i class="fa fa-list fa-3x"></i><br>
									<h4>Semua Data</h4>
								</a>
								<a href="<?php echo base_url('inventory/by_category'); ?>" class="btn btn-default" role="button">
									<i class="fa fa-star fa-3x"></i><br>
									<h4>Berdasarkan Supplier/Sales</h4>
								</a>
							</div>
					  </div>
					</div>

				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
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
