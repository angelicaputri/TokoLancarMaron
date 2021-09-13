	<!-- =========================== CONTENT =========================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Pencarian Data
				<small>Menampilkan Semua Data Yang Dicari</small>
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-archive"></i> &nbsp; Pencarian Data</li>
				<li class="active">Pencarian</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<?php echo $message;?>

			<!-- Search Data box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Pencarian Data
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Tampilkan/Sembunyikan</button>
					</div>
				</div>
				<div class="box-body <?php echo (isset($results)) ? "hide" : "show" ?>" id="add_new">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<form id="search_form" action="<?php echo base_url('inventory/search/results') ?>" method="post" autocomplete="off" class="form form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-md-8 col-md-offset-2">
									<div class="input-group input-group-lg">
									  <input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo set_value("keyword"); ?>" placeholder="Search for..." required>
										<span class="input-group-btn">
							        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span> Pencarian</button>
							      </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-2">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="CatFilter">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														<span class="fa fa-star"></span> &nbsp; Filter Berdasarkan Supplier/Sales
														<span class="pull-right">
															<span class="caret"></span>
														</span>
													</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="CatFilter">
												<div class="panel-body">
													<?php if (count($cat_list->result())>3): ?>
														<?php
														$batas = ceil(count($cat_list->result())/2);
														$xs    = 0;
														foreach ($cat_list->result() as $cls2):
															// Flagging untuk menentukan jumlah data kategori
															$xs++;
															// Jika 1, col 1.
															if ($xs==1) {
																echo "<div class='col-md-6'>";
															}
															// Jika sudah batas, col 2
															elseif($xs==$batas+1) {
																echo "</div>";
																echo "<div class='col-md-6'>";
															}
															?>
															<div class="radio">
																<label for="category_<?php echo $cls2->id; ?>">
																	<input type="checkbox" name="category[]" id="category_<?php echo $cls2->id; ?>" value="<?php echo $cls2->id; ?>" <?php echo set_checkbox('category[]', $cls2->id); ?>>
																	<?php echo $cls2->name ?>
																</label>
															</div>
														<?php endforeach; echo "</div>"; ?>
													<?php else: ?>
														<div class="col-md-12">
															<?php $xs = 0;
															foreach ($cat_list->result() as $cls2):
																$xs++; ?>
																<div class="radio">
																	<label for="category_<?php echo $cls2->id; ?>">
																		<input type="checkbox" name="category[]" id="category_<?php echo $cls2->id; ?>" value="<?php echo $cls2->id; ?>" <?php echo set_checkbox('category[]', $cls2->id); ?>>
																		<?php echo $cls2->name ?>
																	</label>
																</div>
															<?php endforeach; ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		<?php if (isset($results)): ?>
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">hasil Pencarian
					</h3>
					<div class="box-tools pull-right">
						<!-- <button class="btn btn-default btn-box-tool" title="Show / Hide" id="myboxwidget"><i class="fa fa-plus"></i> Show / Hide</button> -->
					</div>
				</div>
				<div class="box-body show">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
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
							<?php if (count($results->result())>0): ?>
								<?php foreach ($results->result() as $result): ?>
								<tr>
									<td><?php echo $result->code; ?></td>
									<td><?php echo $result->brand; ?></td>
									<td><?php echo $result->satuan; ?></td>
									<td><?php echo $result->dasar; ?></td>
									<td><?php echo $result->grosir; ?></td>
									<td><?php echo $result->ecer; ?></td>
									<td><?php echo $result->awal; ?></td>
									<td><?php echo $result->masuk; ?></td>
									<td><?php echo $result->keluar; ?></td>
									<td><?php echo $result->akhir; ?></td>
									<td width="5%">
										<form action="<?php echo base_url('inventory/delete/'.$result->code) ?>" method="post" autocomplete="off">
											<div class="btn-group-vertical">
												<a class="btn btn-sm btn-primary" href="<?php echo base_url('inventory/edit/'.$result->code) ?>" role="button"><i class="fa fa-pencil"></i></a>
												<input type="hidden" name="id" value="<?php echo $result->id; ?>">
												<button type="submit" class="btn btn-sm btn-danger" role="button" onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i></button>
											</div>
										</form>
									</td>
								</tr>
								<?php endforeach ?>
							<?php else: ?>
								<tr>
									<td class="text-center" colspan="10">No Data Found!</td>
								</tr>
							<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		<?php endif; ?>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- =========================== / CONTENT =========================== -->
