	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Categories
				<small>Group your inventory</small>
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-star"></i> &nbsp; Categories</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Update Category Data box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Category
					</h3>

					<div class="box-tools pull-right">
						<!-- <button class="btn btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
					</div>
				</div>
				<div class="box-body">
					<?php echo $message;?>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form action="<?php echo base_url('categories/edit/').$id ?>" method="post" autocomplete="off" class="form form-horizontal">
							<?php foreach ($data_list->result() as $data){
								$curr_code        = $data->code;
								$curr_name        = $data->name;
								$curr_sales 	  = $data->sales;
								$curr_telepon 	  = $data->telepon;
							} ?>
							<div class="form-group">
								<label for="code" class="control-label col-md-2">Kode</label>
								<div class="col-md-8">
									<p class="form-control-static"><?php echo $curr_code ?></p>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="control-label col-md-2">Nama Perusahaan</label>
								<div class="col-md-8">
									<p class="form-control-static"><?php echo $curr_name ?></p>
								</div>
							</div>
							<div class="form-group">
								<label for="sales" class="control-label col-md-2">Nama Sales</label>
								<div class="col-md-8 <?php if (form_error('sales')) {echo "has-error";} ?>">
									<input type="text" name="sales" id="sales" class="form-control" value="<?php echo $curr_sales ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label for="telepon" class="control-label col-md-2">Nomor Telepon</label>
								<div class="col-md-8 <?php if (form_error('telepon')) {echo "has-error";} ?>">
									<input type="number" name="telepon" id="telepon" class="form-control" value="<?php echo $curr_telepon ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-2">
									<button type="submit" class="btn btn-primary" onclick="return confirm('Simpan perubahan?')">Ubah</button>
									<a class="btn btn-danger" href="<?php echo base_url('categories'); ?>" role="button">Batal</a>
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
