<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Form Data Pengguna</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <br />
            <form oninput="" id="<?= $data['idForm'] ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= BASEURL; ?>/pengguna/<?= $data['methodForm'] ?>" enctype="multipart/form-data">
                <?php
                    if ($data['methodForm']=="updateData") {
                        echo "<input type='hidden' name='rs_pengguna_id_ex' id='rs_pengguna_id_ex' />";
                    }
                ?>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NAMA LENGKAP<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="rs_pengguna_nama" id="rs_pengguna_nama" placeholder="ex. RINI WULANSARI" />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">NAMA PENGGUNA<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_pengguna_pengguna" id="rs_pengguna_pengguna" placeholder="Ex : riniwulansari" value="" />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">KATA SANDI<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="password" required="required" class="form-control " name="rs_pengguna_sandi" id="rs_pengguna_sandi" placeholder="" />
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a href="<?= BASEURL; ?>/pengguna" class="btn btn-primary" type="button">BATAL</a>
                        <button type="submit" class="btn btn-success"><?= $data['buttonMethod']?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>