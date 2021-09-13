	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Inventory
				<small>Your data sorted per category</small>
			</h1>

			<ol class="breadcrumb">
				<li><a href="<?php echo base_url("inventory") ?>"><i class="fa fa-archive"></i> Inventory</a></li>
				<li><a href="<?php echo base_url("inventory/by_category"); ?>">Category</a></li>
				<li class="active"><?php echo $category_name ?></li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Supplier/Sales : <?php echo $category_name ?>
					</h3>

					<div class="box-tools pull-right">
						<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<?php echo $message;?>

					<div class="table-responsive">
						<table class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
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
									<td><?php echo $data->akhir; ?></td>
									<td width="15%">
										<form action="<?php echo base_url('inventory/delete/'.$data->code) ?>" method="post" autocomplete="off">
											<div class="btn-group-vertical">
												<a class="btn btn-sm btn-default" href="<?php echo base_url('inventory/detail/'.$data->code) ?>" role="button"><i class="fa fa-eye"></i> Detail</a>
												<a class="btn btn-sm btn-primary" href="<?php echo base_url('inventory/edit/'.$data->code) ?>" role="button"><i class="fa fa-pencil"></i> Edit</a>
												<input type="hidden" name="id" value="<?php echo $data->id; ?>">
												<button type="submit" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Delete this data?')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										</form>
									</td>
								</tr>
								<?php endforeach ?>
							<?php else: ?>
								<tr>
									<td class="text-center" colspan="5">No Data Found!</td>
								</tr>
							<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<?php echo $pagination; ?>
					<br>
					<a href="<?php echo base_url('inventory/by_category'); ?>" class="btn btn-primary">Back to Inventory by Category</a>
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
