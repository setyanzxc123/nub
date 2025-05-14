<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Form Data Enkripsi Laboratorium</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <br />
            <form oninput="" id="<?= $data['idForm'] ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= BASEURL; ?>/enkripsiLab/<?= $data['methodForm'] ?>" enctype="multipart/form-data">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">KODE FILE<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_enkripsi_kode" id="rs_enkripsi_kode" placeholder="Otomatis" value="<?= $data['enkripsiLab'] ?>"  disabled/>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">KUNCI P<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="kunci_p" id="kunci_p" placeholder="" value="<?= $data['kunci']['prima_p'] ?>"disabled />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">KUNCI Q<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="kunci_q" id="kunci_q" placeholder="" disabled value="<?= $data['kunci']['prima_q'] ?>" />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">KUNCI E<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="kunci_e" id="kunci_e" placeholder="" disabled value="<?= $data['kunci']['bilangan_e'] ?>" />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">KUNCI D<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="kunci_d" id="kunci_d" placeholder="" disabled value="<?= $data['kunci']['bilangan_d'] ?>" />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">KUNCI N<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="kunci_n" id="kunci_n" placeholder="" disabled value="<?= $data['kunci']['bilangan_n'] ?>" />
                    </div>
                </div>                


                <!-- Lampiran Hasil Lab -->
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">LAMPIRAN HASIL LAB<span class="required">*</span></label>
                    <div class="col-md-12">
                        <input type="file" require="require" id="rs_enkripsi_file" name="rs_enkripsi_file" accept=".docx" />
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a href="<?= BASEURL; ?>/enkripsiLab/addData" class="btn btn-primary" type="button">TEMUKAN KUNCI</a>
                        <a href="<?= BASEURL; ?>/enkripsiLab" class="btn btn-primary" type="button">BATAL</a>
                        <button type="submit" class="btn btn-success"><?= $data['buttonMethod']?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>