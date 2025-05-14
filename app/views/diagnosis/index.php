<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Tabel Data Diagnosis</h2>
			<?php
			if ($_SESSION['rs_pengguna_id_ex'] == "admin") {
				?><a href="<?= BASEURL; ?>/diagnosis/addData" class='btn btn-primary active btn-sm' role="button"
					aria-pressed="true" style="float: right;">TAMBAH</a>
				<?php
			} else {

			}
			?>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box table-responsive">

						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>NO</th>
									<th>KODE DIAGNOSIS</th>
									<th>NAMA DIAGNOSIS</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0;
								foreach ($data['diagnosis'] as $diagnosis):
									$no++ ?>
									<tr>
										<td class='text-nowrap'><?= $no ?></td>
										<td><?= $diagnosis['rs_diagnosis_kode'] ?></td>
										<td><?= $diagnosis['rs_diagnosis_nama'] ?></td>

										<td>
											<?php
											if ($_SESSION['rs_pengguna_id_ex'] == "admin") {
												?><a href='<?= BASEURL ?>/diagnosis/editData/<?= $diagnosis['rs_diagnosis_kode'] ?>' id='' title='Ubah'
													class='btn btn-warning dim'><i class='fa fa-pencil'></i></a>

												<button class="btn btn-danger dim" title="Hapus Data Alternatif"
													onclick="deleteData('Menghapus <?= $diagnosis['rs_diagnosis_nama'] ?> Dalam Data Diagnosis', '<?= BASEURL; ?>/diagnosis/deleteData/<?= $diagnosis['rs_diagnosis_kode'] ?>')"
													id='' class='btn btn-success dim'>
													<i class='fa fa-trash'></i>
												</button>
												<?php
											} else {
												echo "-";
											}
											?>

										</td>

									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>