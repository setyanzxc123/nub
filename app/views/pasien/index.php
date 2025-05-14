<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Tabel Data Pasien</h2>
			<?php
			if ($_SESSION['rs_pengguna_id_ex'] == "admin") {
				?><a href="<?= BASEURL; ?>/pasien/addData" class='btn btn-primary active btn-sm' role="button" aria-pressed="true"
					style="float: right;">TAMBAH</a>
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
									<th>NAMA PASIEN</th>
									<th>JENIS KELAMIN</th>
									<th>TTL</th>
									<th>PEKERJAAN</th>
									<th>ALAMAT</th>
									<th>TELEPON</th>
									<th>GOLONGAN DARAH</th>
									<th>WAKTU MASUK</th>
									<th>NOMOR IDENTITAS</th>
									<th>AKSI LAB</th>
									<th>AKSI RADIOLOGI</th>
									<th>NAMA IBU</th>
									<th>NAMA AYAH</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['pasien'] as $pasien): ?>
									<tr>
										<td class='text-nowrap'><?= $pasien['rs_pasien_nama'] ?></td>
										<td>
											<?php
											if ($pasien['rs_pasien_jenkel'] == "L") {
												echo "LAKI-LAKI";
											} else {
												echo "PEREMPUAN";
											}
											?>
										</td>
										<td class='text-nowrap'>
											<?= $pasien['rs_pasien_tmpt_lhr'] . ", " . (string) date('d F Y', strtotime($pasien['rs_pasien_tgl_lhr'])) ?>
										</td>
										<td><?= $pasien['rs_pasien_kerja'] ?></td>
										<td><?= $pasien['rs_pasien_alamat'] ?></td>
										<td><?= $pasien['rs_pasien_telp'] ?></td>
										<td><?= $pasien['rs_pasien_darah'] ?></td>
										<td class='text-nowrap'>
											<?= (string) date('d F Y H:i:s', strtotime($pasien['rs_pasien_waktu'])) ?></td>
										<td><?= $pasien['rs_pasien_iden'] ?></td>
										<td>
											<a href='<?= BASEURL ?>/laboratorium/<?= $pasien['rs_pasien_id_ex'] ?>' id=''
												title='Lihat Hasil Lab' class='btn btn-primary dim'><i
													class='fa fa-database'></i></a>

											<button class="btn btn-primary dim" title="Cetak Hasil Lab"
												onclick="deleteData('Mencetak Hasil Laboratorium <?= $pasien['rs_pasien_nama'] ?>', '<?= BASEURL ?>/pasien/printOut/<?= $pasien['rs_pasien_id_ex'] ?>', '<?= BASEURL ?>/hasil/diagnosis-<?= $pasien['rs_pasien_id_ex'] ?>.docx')">
												<i class='fa fa-print'></i>
											</button>


										</td>
										<td>
											<button class="btn btn-success" title="Lihat Hasil Radiologi"
												onclick="return showModalImage('rs_pasien_rad_pre', 'imgModalPreview', 'titleModalPreview', 'PRATINJAU HASIL RADIOLOGI', '<?= BASEURL; ?>/img/uploads/<?= $pasien['rs_pasien_rad'] ?>')"
												id='' title='Lihat Hasil' class='btn btn-success dim'>
												<i class='fa fa-eye' data-toggle="modal" data-target="#modalPreviewAll"></i>
											</button>
										</td>
										<td><?= $pasien['rs_pasien_ibu'] ?></td>
										<td><?= $pasien['rs_pasien_ayah'] ?></td>
										<td>
											<?php
											if ($_SESSION['rs_pengguna_id_ex'] == "admin") {
												?>
												<a href='<?= BASEURL ?>/pasien/editData/<?= $pasien['rs_pasien_id_ex'] ?>' id=''
													title='Ubah' class='btn btn-warning dim'><i class='fa fa-pencil'></i></a>

												<button class="btn btn-danger dim" title="Hapus Data Alternatif"
													onclick="deleteData('Menghapus <?= $pasien['rs_pasien_nama'] ?> Dalam Data Pasien', '<?= BASEURL; ?>/pasien/deleteData/<?= $pasien['rs_pasien_id_ex'] ?>/<?= $pasien['rs_pasien_rad'] ?>')"
													id='' class='btn btn-success dim'>
													<i class='fa fa-trash'></i>
												</button>
												<?php
											} else {
												echo "<i>Aksi hanya dapat dilakukan oleh Admin</i>";
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