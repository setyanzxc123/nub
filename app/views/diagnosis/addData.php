<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Form Data Diagnosis</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <br />
            <form oninput="" id="<?= $data['idForm'] ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= BASEURL; ?>/diagnosis/<?= $data['methodForm'] ?>" enctype="multipart/form-data">
                <?php
                    if ($data['methodForm']=="updateData") {
                        $disable = "disabled";
                    }else{
                        $disable = "";
                    }
                ?>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">KODE DIAGNOSIS<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_diagnosis_kode" id="rs_diagnosis_kode" placeholder="Ex : A00.0" value=""  <?= $disable ?> />
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NAMA DIAGNOSIS<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="rs_diagnosis_nama" id="rs_diagnosis_nama" placeholder="ex. CHOLERA DUE TO VIBRIO CHOLERAE 01, BIOVAR CHOLERAE" />
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a href="<?= BASEURL; ?>/diagnosis" class="btn btn-primary" type="button">BATAL</a>
                        <button type="submit" class="btn btn-success"><?= $data['buttonMethod']?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>