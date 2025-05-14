<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
       	<div class="x_title">
            <h2>Tabel Data Enkripsi Laboratorium</h2>
<?php 
if($_SESSION['rs_pengguna_id_ex'] == "admin") {
?><a href="<?= BASEURL; ?>/enkripsiLab/addData" class='btn btn-primary active btn-sm' role="button" aria-pressed="true" style="float: right;">TAMBAH</a><?php
} else {
	
}
?>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
         	<div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
					
	                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
		                          	<th>NO</th>
		                          	<th>KODE FILE</th>
		                          	<th>KUNCI</th>
		                           	<th>FILE</th>
		                          	<th>AKSI</th>
	                        	</tr>
	                      	</thead>
	                      	<tbody>
                                  <?php $no=0; foreach ($data['enkripsiLab'] as $enkripsiLab): ?>
                                    <?php $no++ ?>
		                        	<tr>
		                          		<td class='text-nowrap'><?= $no ?></td>
		                          		<td class='text-nowrap'><?= $enkripsiLab['rs_enkripsi_kode'] ?></td>
		                          		<td class='text-nowrap'><?= $enkripsiLab['rs_enkripsi_kunci'] ?></td>
		                          		
<?php 
if(strpos($enkripsiLab['rs_enkripsi_kunci'], 'Pengguna: '.$_SESSION['rs_pengguna_id_ex']) ) { ?>
	<td>
	      <a href='<?= BASEURL?>/hasil/<?= $enkripsiLab['rs_enkripsi_file'] ?>' id='' title='Download Hasil Enkripsi Lab' class='btn btn-success dim'><i class='fa fa-download'></i></a>
	</td>
	<td>
		<button class="btn btn-danger dim" title="Hapus Data Hasil Enkripsi Lab" onclick="deleteData('Menghapus Data Hasil Enkripsi Lab', '<?= BASEURL; ?>/enkripsiLab/deleteData/<?= $enkripsiLab['rs_enkripsi_id_ex'] ?>/<?= $enkripsiLab['rs_enkripsi_file'] ?>')" id='' class='btn btn-success dim'>
		<i class='fa fa-trash'></i>
		</button>
	</td>
<?php
} else {
	echo "<td colspan='2'><i>Anda tidak dapat mengubah <br />atau menghapus file ini</i></td>";
}
?>
		                          		

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