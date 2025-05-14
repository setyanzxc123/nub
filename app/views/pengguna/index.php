<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
       	<div class="x_title">
            <h2>Tabel Data Pengguna</h2><a href="<?= BASEURL; ?>/pengguna/addData" class='btn btn-primary active btn-sm' role="button" aria-pressed="true" style="float: right;">TAMBAH</a>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
         	<div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
					
	                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
		                          	<th>NAMA PENGGUNA</th>
		                          	<th>NAMA LENGKAP</th>
		                          	<th>AKSI</th>
	                        	</tr>
	                      	</thead>
	                      	<tbody>
	                      		<?php foreach ($data['pengguna'] as $pengguna): ?>
		                        	<tr>
		                          		<td class='text-nowrap'><?= $pengguna['rs_pengguna_pengguna'] ?></td>
		                          		<td><?= $pengguna['rs_pengguna_nama'] ?></td>
		                          		
		                          		<td>
		                          			<a href='<?= BASEURL?>/pengguna/editData/<?= $pengguna['rs_pengguna_id_ex'] ?>' id='' title='Ubah' class='btn btn-warning dim'><i class='fa fa-pencil'></i></a>
		                          			<?php
		                          				if ($_SESSION['rs_pengguna_id_ex']!=$pengguna['rs_pengguna_pengguna']) {
		                          			?>
		                          				<button class="btn btn-danger dim" title="Hapus Data Pengguna" onclick="deleteData('Menghapus <?= $pengguna['rs_pengguna_pengguna'] ?> Dalam Data Pengguna', '<?= BASEURL; ?>/pengguna/deleteData/<?= $pengguna['rs_pengguna_id_ex'] ?>')" id='' class='btn btn-success dim'>
	                                        		<i class='fa fa-trash'></i>
	                                    		</button>
		                          			<?php
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