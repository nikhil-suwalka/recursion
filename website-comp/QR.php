<video id="preview" class="p-1 border"
       style="position: fixed;right: 0;bottom: 0;min-width: 100%;min-height: 100%;"></video>
<section id="scanner" class="content-section text-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                <div class="col-sm-12">

                </div>
                <script type="text/javascript">
                    var scanner = new Instascan.Scanner({
                        video: document.getElementById('preview'),
                        scanPeriod: 5,
                        mirror: false
                    });
                    scanner.addListener('scan', function (content) {
                        $.ajax({
                            url: content,
                            type: 'GET',
                            success:function(result){
                                if(result){
                                    document.getElementById("alert").innerHTML="Hello";
                                    alert("Hellow");
                                }
                            }
                        });
                    });
                    Instascan.Camera.getCameras().then(function (cameras) {
                        if (cameras.length > 0) {
                            scanner.start(cameras[0]);
                            $('[name="options"]').on('change', function () {
                                if (cameras[0] != "") {
                                    scanner.start(cameras[0]);
                                } else {
                                    alert('No Front camera found!');
                                }
                            });
                        } else {
                            console.error('No cameras found.');
                            alert('No cameras found.');
                        }
                    }).catch(function (e) {
                        console.error(e);
                        alert(e);
                    });
                </script>
            </div>

        </div>
    </div>
</section>