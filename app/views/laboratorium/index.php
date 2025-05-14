<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
       	<div class="x_title">
            <h2>Tabel Data Laboratorium</h2>

            <a href="<?= BASEURL; ?>/laboratorium/addData/<?= $data['rs_pasien_id_ex'] ?>" class='btn btn-primary active btn-sm' role="button" aria-pressed="true" style="float: right;">TAMBAH</a>

            <a href="<?= BASEURL; ?>/pasien" class='btn btn-danger active btn-sm' role="button" aria-pressed="true" style="float: right;">KEMBALI</a>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
         	<div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
					
	                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
		                          	<th>NAMA PASIEN</th>
		                          	<th>KODE DIAGNOSIS</th>
		                          	<th>NAMA DIAGNOSIS</th>
		                          	<th>JENIS KELAMIN</th>
		                          	<th>TTL</th>
		                          	<th>GOLONGAN DARAH</th>
		                          	<th>WAKTU MASUK</th>
		                          	<th>NOMOR IDENTITAS</th>
		                          	<th>AKSI</th>
	                        	</tr>
	                      	</thead>
	                      	<tbody>
	                      		<?php foreach ($data['hasilLab'] as $hasilLab): ?>
		                        	<tr>
		                          		<td class='text-nowrap'><?= $hasilLab['rs_pasien_nama'] ?></td>
		                          		<td class='text-nowrap'><?= $hasilLab['rs_lab_pasien_diag'] ?></td>
		                          		<td class='text-nowrap'><?= $hasilLab['rs_diagnosis_nama'] ?></td>
		                          		<td>
		                          			<?php
		                          				if ($hasilLab['rs_pasien_jenkel']=="L") {
		                          					echo "LAKI-LAKI";
		                          				}else{
		                          					echo "PEREMPUAN";
		                          				}
		                          		  	?>
		                          		</td>
		                          		<td class='text-nowrap'><?= $hasilLab['rs_pasien_tmpt_lhr'].", ".(string)date('d F Y', strtotime($hasilLab['rs_pasien_tgl_lhr'])) ?></td>
		                          		<td><?= $hasilLab['rs_pasien_darah'] ?></td>
		                          		<td class='text-nowrap'><?= (string)date('d F Y H:i:s', strtotime($hasilLab['rs_pasien_waktu'])) ?></td>
		                          		<td><?= $hasilLab['rs_pasien_iden'] ?></td>
		                          		
		                          		<td>
		                          			<button class="btn btn-danger dim" title="Hapus Data Alternatif" onclick="deleteData('Menghapus <?= $hasilLab['rs_diagnosis_nama'] ?> Dalam Diagsosis Pasien <?= $hasilLab['rs_pasien_nama'] ?>', '<?= BASEURL; ?>/laboratorium/deleteData/<?= $hasilLab['rs_lab_pasien_id_ex'] ?>')" id='' class='btn btn-success dim'>
                                        		<i class='fa fa-trash'></i>
                                    		</button>
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