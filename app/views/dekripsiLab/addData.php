<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Form Data Dekripsi Laboratorium</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <br />
            <form oninput="" id="<?= $data['idForm'] ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= BASEURL; ?>/dekripsiLab/<?= $data['methodForm'] ?>" enctype="multipart/form-data">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">KODE FILE<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_dekripsi_kode" id="rs_dekripsi_kode" placeholder="Otomatis" value="<?= $data['dekripsiLab'] ?>"  disabled/>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">KUNCI D<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="kunci_d" id="kunci_d" placeholder="" value="" />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">KUNCI N<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="kunci_n" id="kunci_n" placeholder="" value="" />
                    </div>
                </div>                


                <!-- Lampiran Hasil Lab -->
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">LAMPIRAN HASIL LAB<span class="required">*</span></label>
                    <div class="col-md-12">
                        <input type="file" require="require" id="rs_dekripsi_file" name="rs_dekripsi_file" accept=".docx" />
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a href="<?= BASEURL; ?>/dekripsiLab" class="btn btn-primary" type="button">BATAL</a>
                        <button type="submit" class="btn btn-success"><?= $data['buttonMethod']?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>