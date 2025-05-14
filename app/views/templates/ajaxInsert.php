<script>
    $(function(){
        $(document).ready(function(){
            var <?= $data['idForm'] ?>=$('#<?= $data['idForm'] ?>');
            <?= $data['idForm'] ?>.submit(function(e){
                $("html, body").animate({scrollTop: 0}, 100);
                $('#loading').css("display", "flex");
                $('html').css("overflow", "hidden");
                $('#<?= $data['idForm'] ?> :input').prop("disabled", false);
                $(this).attr('disabled','disabled');
                e.preventDefault();
                $.ajax({
                    type : <?= $data['idForm'] ?>.attr('method'),
                    url : <?= $data['idForm'] ?>.attr('action'),
                    enctype : 'multipart/form-data',
                    data : new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType : 'json',
                    success:function(data){
                        if (data.response=="success") {
                            $('#loading').css("display", "none");
                            swal.fire({
                                title : "Terima Kasih",
                                text : data.content,
                                icon : data.response
                            }).then(function(){

                                window.location='<?= BASEURL; ?>/<?= $data['urlForm'] ?>';
                            });
                        }else{
                            $('#loading').css("display", "none");
                            swal.fire({
                                title : "Tidak Dapat Melanjutkan Proses",
                                text : data.content,
                                icon : data.response
                            });
                        }
                    },
                    error:function(data){
                        $('#loading').css("display", "none");
                        swal.fire({
                            title : "Tidak Dapat Melanjutkan Proses",
                            text : "Terdapat Kesalahan Sistem",
                            icon : "error"
                        });
                    }
                });
            });
        });
    });
</script>