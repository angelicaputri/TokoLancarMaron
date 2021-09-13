<!-- =========================== CONTENT =========================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Toko Lancar Maron
      <small>Semua Data</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-archive"></i> &nbsp; Toko Lancar Maron</li>
      <li class="active">Edit Data</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

		<!-- Insert New Data box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Data
				</h3>

				<div class="box-tools pull-right">
					<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
				</div>
			</div>
			<div class="box-body" id="edit_data">
        <?php echo $message;?>
        <?php foreach ($data_list->result() as $data){
          $curr_code             = $data->code;
          $curr_sales            = $data->category_name;
          $curr_brand            = $data->brand;
          $curr_satuan           = $data->satuan;
          $curr_dasar			 = $data->dasar;
          $curr_grosir	         = $data->grosir;
          $curr_ecer	         = $data->ecer;
          $curr_awal             = $data->awal;
          $curr_masuk            = $data->masuk;
          $curr_keluar           = $data->keluar;
          $curr_akhir            = $data->akhir;
        } ?>

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<form id="input_form" action="<?php echo base_url('inventory/edit/').$code ?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data" name="autoSumForm">
							<h3>Informasi Barang</h3>
							<fieldset>
								<fieldset>
									<div class="form-group">
										<label for="code" class="control-label col-md-2">Kode Barang</label>
										<div class="col-md-4">
										<input type="text" name="code" id="code" class="form-control required <?php if (form_error('code')) { echo "error"; } ?>" value="<?php echo $curr_code ?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="brand" class="control-label col-md-2">Nama Barang</label>
										<div class="col-md-8">
											<input type="text" name="brand" id="brand" class="form-control required <?php if (form_error('brand')) { echo "error"; } ?>" value="<?php echo $curr_brand ?>" required>
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
                        					$selected = ($curr_sales == $lls->id) ? "selected" : "";
												echo "<option value='".$lls->id."' ".set_select('location', $lls->id)." $selected>".$lls->name."</option>";
												} ?>
										</select>
										</div>
									</div>
									<div class="form-group">
										<label for="satuan" class="control-label col-md-2">Satuan</label>
										<div class="col-md-4">
											<input type="text" name="satuan" id="satuan" class="form-control required <?php if (form_error('satuan')) { echo "error"; } ?>" value="<?php echo $curr_satuan ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="dasar" class="control-label col-md-2">Harga Dasar</label>
										<div class="col-md-4">
											<input type="number" name="dasar" id="dasar" class="form-control required <?php if (form_error('dasar')) { echo "error"; } ?>" value="<?php echo $curr_dasar ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label for="grosir" class="control-label col-md-2">Harga Grosir</label>
										<div class="col-md-4">
											<input type="number" name="grosir" id="grosir" class="form-control required <?php if (form_error('grosir')) { echo "error"; } ?>" value="<?php echo $curr_grosir ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label for="ecer" class="control-label col-md-2">Harga Eceran</label>
										<div class="col-md-4">
											<input type="number" name="ecer" id="ecer" class="form-control required <?php if (form_error('ecer')) { echo "error"; } ?>" value="<?php echo $curr_ecer ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label for="awal" class="control-label col-md-2">Stok Awal</label>
										<div class="col-md-4">
											<input type="number" name="awal" id="awal" class="form-control required <?php if (form_error('awal')) { echo "error"; } ?>" value="<?php echo $curr_awal ?>" onfocus="startCalculate()" onblur="stopCalc()" required>
										</div>
									</div>
									<div class="form-group">
										<label for="masuk" class="control-label col-md-2">Masuk</label>
										<div class="col-md-4">
											<input type="number" name="masuk" id="masuk" class="form-control required <?php if (form_error('masuk')) { echo "error"; } ?>" value="<?php echo $curr_masuk ?>" onFocus="startCalc();" onBlur="stopCalc();" required>
										</div>
									</div>
									<div class="form-group">
										<label for="keluar" class="control-label col-md-2">Keluar</label>
										<div class="col-md-4">
											<input type="number" name="keluar" id="keluar" class="form-control required <?php if (form_error('keluar')) { echo "error"; } ?>" value="<?php echo $curr_keluar ?>" onFocus="startCalc();" onBlur="stopCalc();" required>
										</div>
									</div>
									<div class="form-group">
										<label for="keluar" class="control-label col-md-2">Stok Akhir</label>
										<div class="col-md-4">
											<input type="number" name="akhir" id="akhir" class="form-control" value="<?php echo $curr_akhir ?>" readonly>
										</div>
									</div>
								</fieldset>
							</fieldset>
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
