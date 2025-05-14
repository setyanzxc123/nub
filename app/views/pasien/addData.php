<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Form Data Pasien</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <br />
            <form oninput="" id="<?= $data['idForm'] ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= BASEURL; ?>/pasien/<?= $data['methodForm'] ?>" enctype="multipart/form-data">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">ID PASIEN<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_pasien_id_ex" id="rs_pasien_id_ex" placeholder="Otomatis" value="<?= $data['id_pasien'] ?>"  disabled/>
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NAMA LENGKAP<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" required="required" class="form-control " name="rs_pasien_nama" id="rs_pasien_nama" placeholder="ex. Rini Wulansari" />
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">JENIS KELAMIN<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <select id="rs_pasien_jenkel" name="rs_pasien_jenkel" class="form-control" required="required">
                            <option value="" hidden>Pilih Salah Satu Jenis Kelamin</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                                        
                        </select>
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">TEMPAT LAHIR<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_pasien_tmpt_lhr" id="rs_pasien_tmpt_lhr" placeholder="ex. Palu" />
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">TANGGAL LAHIR<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control date" type="date" name="rs_pasien_tgl_lhr" id="rs_pasien_tgl_lhr" required="required">
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">PEKERJAAN<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_pasien_kerja" id="rs_pasien_kerja" placeholder="ex. Karyawan" />
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">ALAMAT<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <textarea required="required" class="form-control " name="rs_pasien_alamat" id="rs_pasien_alamat"></textarea>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">TELEPON<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_pasien_telp" placeholder="ex. 0822xxxxxxxx" id="rs_pasien_telp" />
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">STATUS HUBUNGAN<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <select id="rs_pasien_hub" name="rs_pasien_hub" class="form-control" required="required">
                            <option value="" hidden>Pilih Salah Satu Status Hubungan</option>
                            <option value="1">Menikah</option>
                            <option value="2">Belum Menikah</option>
                            </select>
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">AGAMA<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <select id="rs_pasien_agama" name="rs_pasien_agama" class="form-control" required="required">
                            <option value="" hidden>Pilih Salah Satu Agama</option>
                            <option value="1">Islam</option>
                            <option value="2">Kristen</option>
                            <option value="3">Hindu</option>
                            <option value="4">Budha</option>
                            <option value="5">Kong Hu Cu</option>
                            <option value="6">Katolik</option>
                        </select>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">WAKTU MASUK<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" class="form-control" required="required" class="form-control " id="rs_pasien_waktu" name="rs_pasien_waktu" placeholder="Otomatis" disabled/>
                        <script>
                            Number.prototype.padLeft = function(base,chr){
                                var  len = (String(base || 10).length - String(this).length)+1;
                                return len > 0? new Array(len).join(chr || '0')+this : this;
                            }
                            var d = new Date, dformat = [ (d.getMonth()+1).padLeft(),d.getDate().padLeft(),d.getFullYear()].join('/')+' ' +[ d.getHours().padLeft(),d.getMinutes().padLeft(),d.getSeconds().padLeft()].join(':');
                            document.getElementById("rs_pasien_waktu").value = dformat;
                        </script>
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">KETERANGAN<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <textarea required="required" class="form-control " name="rs_pasien_ket" id="rs_pasien_ket"></textarea>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NAMA IBU<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_pasien_ibu" placeholder="ex: Hasanah" id="rs_pasien_ibu" />
                    </div>
                </div>


                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NAMA AYAH<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_pasien_ayah" placeholder="ex: Sulitiyo" id="rs_pasien_ayah" />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">GOLONGAN DARAH<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <select id="rs_pasien_darah" name="rs_pasien_darah" class="form-control" required="required">
                            <option value="" hidden>Pilih Salah Satu Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NOMOR IDENTITAS (KTP/SIM)<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" class="form-control " name="rs_pasien_iden" placeholder="ex: 72100xxxxxxx" id="rs_pasien_iden" />
                    </div>
                </div>


                <!-- Lampiran Hasil Lab -->
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">LAMPIRAN HASIL RADIOLOGI<span class="required">*</span></label>
                    <div class="col-md-12">
                        <?php 
                            if ($data['methodForm']=="insertData") {
                                $require = "required='required'";
                            }else{
                                $require = "";
                            }
                         ?>
                        <input type="file" <?= $require ?> id="rs_pasien_rad" name="rs_pasien_rad" accept=".jpg, .png, .jpeg"  onchange="readURL(this, 'rs_pasien_rad_pre')" value="" />
                    </div>
                </div>

                <div class='form-group row justify-content-center'>
                    <div class='input-group-prepend bg-transparent'>
                        <span class='input-group-text bg-transparent border-0 img' id='basic-addon1'>
                            <img src='<?= BASEURL; ?>/img/radiology.png' class='rounded img-thumbnail' id="rs_pasien_rad_pre" style='width: 250px; height: 250px; object-fit: cover;' onclick="showModalImage('rs_pasien_rad_pre', 'imgModalPreview', 'titleModalPreview', 'PRATINJAU HASIL RADIOLOGI', '')" data-toggle="modal" data-target="#modalPreviewAll"/> 
                        </span>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <a href="<?= BASEURL; ?>/pasien" class="btn btn-primary" type="button">BATAL</a>
                        <button type="submit" class="btn btn-success"><?= $data['buttonMethod']?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    
</script>


<!-- <script src="http://localhost/rini/public/vendors/validator/multifield.js"></script>
<script src="http://localhost/rini/public/vendors/validator/validator.js"></script>
<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({ "events": ['blur', 'input', 'change'] }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function (e) {
        var submit = true,
        validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function (e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function () {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);
</script> -->