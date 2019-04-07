<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("administrator/_partials/head.php") ?>

        <style>
        </style>
    </head>
	<body class="h-100">
		<div class="container-fluid">
			<div class="row">
				<!-- sidebar -->
                <?php $this->load->view("administrator/_partials/sidebar.php") ?>
				
                <!-- //sidebar -->

				<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
					<!-- navbar -->
                    <?php $this->load->view("administrator/_partials/navbar.php") ?>

                    <!-- /navbar -->

					<div class="main-content-container container-fluid px-4">
						<!-- header -->
                        <?php $this->load->view("administrator/_partials/header.php") ?>

                        <!-- //header -->

						<!-- field -->
						<div class="row">
                            <div class="col-lg-12">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row">
                                            <div class="<?= !empty($data) ? "col-md-8" : "col-md-12" ?> mt-2 mb-2">
                                                <h6 class="m-0">Profil</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div hidden="true">
                                                        <form id="form-logo" enctype="multipart/form-data">
                                                            <input type="text" id="logo_tahun" name="logo_tahun" class="form-control" value="<?= $data["tahun"] ?>" hidden>
                                                            <input type="file" id="logo_file" name="logo_file" class="form-control">
                                                        </form>
                                                    </div>
                                                    <form id="profil-form"<?= !empty($data) ? "" : " hidden" ?>>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-5 text-center" style="margin: 1em 0;">
                                                                <img class="change-img rounded-circle" src="<?= base_url("assets/") ?>gambar/pengaturan/logo_<?= $data["tahun"] ?>.png" alt="User Avatar" height="140" width="140">
                                                                <button type="button" class="btn btn-secondary" id="perbarui-logo" style="margin-top: 70px; margin-left:-50px;">
                                                                    <i class="fas fa-pencil-alt mr-1"></i>
                                                                    Ubah
                                                                </button>
                                                            </div>
                                                            <div class="form-group col-md-7">
                                                                <div class="form-group">
                                                                    <label for="nama_panjang">Nama Panjang</label>
                                                                    <input type="text" class="form-control" id="nama_panjang" placeholder="Nama Lengkap" value="<?= !empty($data) ? $data["nama_panjang"] : "" ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_pendek">Nama Pendek</label>
                                                                    <input type="text" class="form-control" id="nama_pendek" placeholder="Nama Pendek" value="<?= !empty($data) ? $data["nama_pendek"] : "" ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="tentang">Tentang</label>
                                                                <textarea class="form-control" id="tentang" rows="3" placeholder="Sesuatu hal tentang organisasi."><?= !empty($data) ? $data["tentang"] : "" ?></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="deskripsi">Deskripsi</label>
                                                                <textarea class="form-control" id="deskripsi" rows="3" placeholder="Deskripsi organisasi."><?= !empty($data) ? $data["deskripsi"] : "" ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="alamat">Alamat</label>
                                                                <input type="text" class="form-control" id="alamat" placeholder="Alamat lengkap" value="<?= !empty($data) ? $data["kontak"]["alamat"] : "" ?>">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" id="email" placeholder="alvri@example.com" value="<?= !empty($data) ? $data["kontak"]["email"] : "" ?>">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="telepon">Telepon</label>
                                                                <input type="text" class="form-control" id="telepon" placeholder="+628..." value="<?= !empty($data) ? $data["kontak"]["telepon"] : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                <label for="facebook">Facebook</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">https://facebook.com/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="facebook" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= !empty($data) ? $data["kontak"]["facebook"] : "" ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="twitter">Twitter</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">https://twitter.com/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"  id="twitter" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= !empty($data) ? $data["kontak"]["twitter"] : "" ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="instagram">Instagram</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">https://instagram.com/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="instagram" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= !empty($data) ? $data["kontak"]["instagram"] : "" ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-6">
                                                                <label for="youtube">Youtube</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">https://youtube.com/channel/</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="youtube" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= !empty($data) ? $data["kontak"]["youtube"] : "" ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="peta">Google Maps</label>
                                                                <input type="text" class="form-control" id="peta" placeholder="https://www.google.com/maps/embed?pb=!1h33!7m42!1k5!1k998" aria-label="Peta" aria-describedby="basic-addon1" value="<?= !empty($data) ? $data["kontak"]["peta"] : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="text-center pt-3 pb-3">
                                                            <button type="button" class="btn btn-accent col-md-12" id="perbarui">
                                                                <i class="far fa-save mr-1"></i>
                                                                Perbarui Profil
                                                            </button>
                                                        </div>
                                                    </form>

                                                    <div id="profil-keterangan" class="col-md-12 text-center pt-2"<?= !empty($data) ? " hidden" : "" ?>>
                                                         <label>Profil organisasi tidak ditemukan.</label>
                                                     </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
						<!-- //field -->
						
                    </div>
                    
                    <!-- footer -->
                    <?php $this->load->view("administrator/_partials/footer.php") ?>
					
                    <!-- //footer -->
				</main>
			</div>
        </div>

        <!-- javascript -->
        <?php $this->load->view("administrator/_partials/javascript.php") ?>

        <script>
            var site_api = `<?= $api ?>`;
            
            $(document).ready(function() {
                $("#perbarui-logo").click(function() {
                    var form_logo = $("#form-logo")[0];

                    swal({
                        icon: "warning",
                        title: "Anda akan mengganti logo?",
                        content: form_logo,
						buttons: [
					 		true,
					 		{
					 			text: "Unggah",
					 			closeModal: false,
					 		}
                        ],
                    })
                    .then((yes) => {
                        if (yes) {
                            $.ajax({
                                url: site_api+"/pengaturan/logo",
                                dataType: "json",
                                method: "POST",
                                data: new FormData(form_logo),
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(response) {
                                    if (response.status === 200) {
                                        swal({
                                            title: "Logo berhasil diperbarui.",
                                            icon: "success",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
                                            location.reload();
                                        });
                                    } else {
                                        swal({
                                            title: "Logo gagal diperbarui.",
                                            text: response.keterangan,
                                            icon: "error",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
                                            location.reload();
                                        });
                                    }
                                },
                                error: function (jqXHR, exception) {
                                    if (jqXHR.status === 0) {
                                        keterangan = "Not connect (verify network).";
                                    } else if (jqXHR.status == 404) {
                                        keterangan = "Requested page not found.";
                                    } else if (jqXHR.status == 500) {
                                        keterangan = "Internal Server Error.";
                                    } else if (exception === "parsererror") {
                                        keterangan = "Requested JSON parse failed.";
                                    } else if (exception === "timeout") {
                                        keterangan = "Time out error.";
                                    } else if (exception === "abort") {
                                        keterangan = "Ajax request aborted.";
                                    } else {
                                        keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                                    }

                                    swal({
                                        title: "Logo gagal diperbarui.",
                                        text: response.keterangan,
                                        icon: "error",
                                        button: "Tutup"
                                    });

                                    $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <i class="fa fa-info mx-2"></i>
                                        <strong>`+keterangan+`</strong>
                                    </div>`);
                                }
                            });
                        }
                    });
                });

                $("#perbarui").click(function() {
                    $.ajax({
                        url: site_api+"/pengaturan/simpan",
                        dataType: "json",
                        type: "POST",
                        data : {
                            "tahun": `<?= $data["tahun"] ?>`,
                            "nama_panjang": $("#nama_panjang").val(),
                            "nama_pendek": $("#nama_pendek").val(),
                            "deskripsi": $("#deskripsi").val(),
                            "tentang": $("#tentang").val(),
                            "alamat": $("#alamat").val(),
                            "email": $("#email").val(),
                            "telepon": $("#telepon").val(),
                            "facebook": $("#facebook").val(),
                            "twitter": $("#twitter").val(),
                            "instagram": $("#instagram").val(),
                            "youtube": $("#youtube").val(),
                            "peta": $("#peta").val()
                        },
                        beforeSend: function (e) {
                            $("#perbarui").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan perubahan...");
                        },
                        success: function(response) {
                            $("#perbarui").html("<i class=\"far fa-save mr-1\"></i> Perbarui Profil");
                            if (response.status === 200) {
                                swal({
                                    title: "Profil berhasil diperbarui",
                                    icon: "success",
                                    button: "Tutup",
                                })
                                .then((value) => {
                                    location.reload();
                                });
                            } else {
                                $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                    <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-info mx-2"></i>
                                    <strong>`+response.keterangan+`</strong>
                                </div>`);
                            }
                        },
                        error: function (jqXHR, exception) {
                            $("#perbarui").html("<i class=\"far fa-save mr-1\"></i> Perbarui Profil");

                            if (jqXHR.status === 0) {
                                keterangan = "Not connect (verify network).";
                            } else if (jqXHR.status == 404) {
                                keterangan = "Requested page not found.";
                            } else if (jqXHR.status == 500) {
                                keterangan = "Internal Server Error.";
                            } else if (exception === "parsererror") {
                                keterangan = "Requested JSON parse failed.";
                            } else if (exception === "timeout") {
                                keterangan = "Time out error.";
                            } else if (exception === "abort") {
                                keterangan = "Ajax request aborted.";
                            } else {
                                keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                            }
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+keterangan+`</strong>
                            </div>`);
                        }
                    });
                });
            });
        </script>
        <!-- //javascript -->
	</body>
</html>