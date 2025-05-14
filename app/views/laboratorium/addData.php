<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Form Data Laboratorium Pasien</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <br />
            <form oninput="" id="<?= $data['idForm'] ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= BASEURL; ?>/laboratorium/<?= $data['methodForm'] ?>" enctype="multipart/form-data">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">ID PASIEN<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_pasien_id_ex" id="rs_pasien_id_ex" placeholder="Otomatis" value="<?= $data['id_pasien'] ?>" disabled />
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NAMA LENGKAP<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="rs_pasien_nama" id="rs_pasien_nama" placeholder="ex. Rini Wulansari" disabled />
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">DIAGNOSIS<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <select id="rs_lab_pasien_diag" name="rs_lab_pasien_diag" class="form-control" required="required"
                        onfocus="ambilDataSelect('rs_lab_pasien_diag', '<?= BASEURL; ?>/anotherInclude/getDiagnosis', 'Pilih Salah Satu Diagnosis', toRemove=[], removeMessage=[], '')"
                        >
                            <option value="" hidden>Pilih Salah Satu Diagnosis</option>
                            
                                        
                        </select>
                    </div>
                </div>


                
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a href="<?= BASEURL; ?>/<?= $data['urlForm'] ?>" class="btn btn-primary" type="button">BATAL</a>
                        <button type="submit" class="btn btn-success"><?= $data['buttonMethod']?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>