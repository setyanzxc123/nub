<script type="text/javascript">
    function readURL(input, img) {
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById(img).setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }else{
             document.getElementById(img).setAttribute('src', '/assets/no_preview.png');
        }
    }
    function showModalImage(input, img, titleModalPreview, titleModalResults, imageSource) {
        if (imageSource!="") {
            var input_src = imageSource;
        }else{
            var input_src = document.getElementById(input).src;
        }
        
        document.getElementById(img).setAttribute('src', input_src);
        var titleModalPreview = document.getElementById(titleModalPreview);
        titleModalPreview.innerText = titleModalResults;
    }
    function callData(idInput, valInput) {
        console.log("Bisa");
        var a = Object.keys(idInput).length;
        for (j = a - 1; j >= 0; j--) {
            if (document.getElementById(Object.keys(idInput)[j]).tagName=="SELECT") {
                if (document.getElementById(Object.keys(idInput)[j]).options.length>1) {
                    document.getElementById(Object.keys(idInput)[j]).value = valInput[j];
                }
            }else if(document.getElementById(Object.keys(idInput)[j]).tagName=="IMG"){
                document.getElementById(Object.keys(idInput)[j]).setAttribute('src', valInput[j]);
            }else{
                var typeDoc = document.getElementById(Object.keys(idInput)[j]).type;
                if (typeDoc=="text"||typeDoc=="date"||typeDoc=="textarea"||typeDoc=="number"||typeDoc=="hidden") {
                    document.getElementById(Object.keys(idInput)[j]).value = valInput[j];
                }else{
                    document.getElementById(Object.keys(idInput)[j]).innerHTML = valInput[j];
                }
            }
            console.log(document.getElementById(Object.keys(idInput)[j]).tagName);
        }
    }
    function ambilDataSelect(idSelect, link, messageHidden, toRemove, removeMessage, extraParam){
        let idSelectInput = document.getElementById(idSelect);
        let idSelectInputExtra = "";
        if (extraParam!='') {
            idSelectInputExtra = document.getElementById(extraParam).value;
        }else{
            idSelectInputExtra = "";
        }
        link+=idSelectInputExtra;
        let xhr = new XMLHttpRequest();
        xhr.open('GET',link,true);
        xhr.onload = function()
        {
            if (this.status==200)
            {
                let daftar = JSON.parse(xhr.responseText);
                let hasil = "";
                var length = idSelectInput.options.length;
                for (i = length-1; i >= 0; i--) {
                    idSelectInput.options[i] = null;
                }
                var lengthRemove = toRemove.length;

                for (j = lengthRemove - 1; j >= 0; j--) {
                    let idSelectInputRemove = document.getElementById(toRemove[j]);
                    var lengthOpt = idSelectInputRemove.options.length;
                    for (k = lengthOpt-1; k >= 0; k--) {
                        idSelectInputRemove.options[k] = null;
                    }
                    var optHide = document.createElement('option');
                    optHide.innerHTML = removeMessage[j];
                    optHide.value = '0'; 
                    optHide.setAttribute('hidden', 'hidden');
                    idSelectInputRemove.appendChild(optHide);
                }
                var optHide = document.createElement('option');
                optHide.innerHTML = messageHidden;
                optHide.value = '0'; 
                optHide.setAttribute('hidden', 'hidden');
                idSelectInput.appendChild(optHide);             
                daftar.forEach(function(data)
                {
                    var opt = document.createElement('option');
                    opt.appendChild( document.createTextNode(`${data.optText}`));
                    opt.value = `${data.optValue}`; 
                    idSelectInput.appendChild(opt);     
                });
            }
        }
        xhr.send();
    }

    

    /*fungsi deleteData
    Parameter Yang Dibutuhkan :
    - pesan : Pesan yang akan ditampilkan sebelum mengeksekusi link
    - link : Sebagai link yang akan dituju untuk merealisasikan fungsi yang akan dijalankan, hasil dari link tersebut adalah JSON

    Plugin Yang Dibutuhkan :
    - Sweetalert 2
    */
    function deleteData(pesan, link, locationend = ''){
        Swal.fire({
            title: 'Apakah Anda Menyutui?',
            text: pesan,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2ecc71',
            cancelButtonColor: '#e74c3c',
            confirmButtonText: 'Setuju',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', link, true);
                xhr.onload = function(){
                    if (this.status==200)
                    {
                        let data = JSON.parse(xhr.responseText);
                        if (data.response=='success') {
                            swal.fire({
                                title : 'Terima Kasih',
                                text : data.content,
                                icon : data.response
                            }).then(function(){
                                if (locationend=='') {
                                    location.reload(); 
                                }else{
                                    window.location.href = locationend;
                                }
                                
                            });
                        }else{
                            swal.fire({
                                title : 'Tidak Dapat Melanjutkan Proses',
                                text : data.content,
                                icon : data.response
                            });
                        }
                    }else{
                        swal.fire({
                            title : 'Tidak Dapat Melanjutkan Proses',
                            text : 'Request failed.  Returned status of ' + xhr.status,
                            icon : 'error'
                        });
                    }
                }
                xhr.send();
            }
        });
    }

    
    
</script>