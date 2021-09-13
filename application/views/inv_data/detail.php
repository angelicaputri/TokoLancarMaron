<!-- =========================== CONTENT =========================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Toko Lancar Maron
      <small>Detailed information</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-archive"></i> &nbsp; Toko Lancar Maron</li>
      <li class="active">Data Detail</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php foreach ($data_detail->result() as $data){
          $curr_code             = $data->code;
          $curr_sales            = $data->category_name;
          $curr_brand            = $data->brand;
          $curr_satuan           = $data->satuan;
          $curr_dasar            = $data->dasar;
          $curr_grosir           = $data->grosir;
          $curr_ecer             = $data->ecer;
          $curr_awal             = $data->awal;
          $curr_masuk            = $data->masuk;
          $curr_keluar           = $data->keluar;
          $curr_akhir            = $data->akhir;
    } ?>
		<!-- Data detail box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $curr_brand  ?>
				</h3>

				<div class="box-tools pull-right">
					<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
				</div>
			</div>
			<div class="box-body">
        <?php echo $message;?>

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 form-horizontal">
          <table class="table table-bordered table-hover">
            <tr>
              <th class="col-lg-3 active">Kode Barang</th>
              <td><?php echo $curr_code ?></td>
            </tr>
            <tr>
              <th class="active">Nama Barang</th>
              <td><?php echo $curr_brand ?></td>
            </tr>
            <tr>
              <th class="active">Sales/Supplier</th>
              <td><?php echo $curr_sales ?></td>
            </tr>
          </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <hr>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-horizontal">
              <h4>Detail Informasi</h4>
              <table class="table table-bordered table-hover">
                <tr>
                  <th class="col-lg-4 active">Satuan</th>
                  <td><?php echo $curr_satuan ?></td>
                </tr>
                <tr>
                  <th class="active">Harga Dasar</th>
                  <td><?php echo $curr_dasar ?></td>
                </tr>
                <tr>
                  <th class="active">Harga Grosir</th>
                  <td><?php echo $curr_grosir ?></td>
                </tr>
                <tr>
                  <th class="active">Harga Eceran</th>
                  <td><?php echo $curr_ecer ?></td>
                </tr>
                 <tr>
                  <th class="active">Stok Awal</th>
                  <td><?php echo $curr_awal ?></td>
                </tr>
                 <tr>
                  <th class="active">Masuk</th>
                  <td><?php echo $curr_masuk ?></td>
                </tr>
                 <tr>
                  <th class="active">Keluar</th>
                  <td><?php echo $curr_keluar ?></td>
                </tr>
                 <tr>
                  <th class="active">Stok Akhir</th>
                  <td><?php echo $curr_akhir ?></td>
                </tr>
              </table>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-horizontal">
              <h4>Status Logs</h4>
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Changed by</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($status_logs->result() as $status_log): ?>
                    <tr>
                      <td class="col-lg-4"><?php echo $status_log->created_on ?></td>
                      <td><?php echo $status_log->status_name ?></td>
                      <td><?php echo $status_log->first_name. " " . $status_log->last_name ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
          <hr>
          <a href="<?php echo base_url('inventory/edit/').$curr_code; ?>" class="btn btn-primary btn-lg">Edit Data</a>
        </div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
