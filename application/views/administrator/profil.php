<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("administrator/_partials/head.php") ?>

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
						<div class="row"><?php if ($menu["judul"] !== "Profil") { ?>
                                                        
                            <div class="col-md-12 text-right" style="margin-top: -62px;">
                                <button type="button" class="btn btn-info" id="kembali">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    Kembali
                                </button>
                            </div><?php } ?>

                            <div class="col-lg-4">
                                <div class="card card-small mb-4 pt-3">
                                    <div class="card-header border-bottom text-center">
                                        <div class="mb-3 mx-auto">
                                        <img class="rounded-circle" src="<?= base_url("assets/administrator/") ?>images/avatars/0.jpg" alt="User Avatar" width="110"> </div>
                                        <h4 id="tampil_nama" class="mb-0"><?= !empty($data["username"]) ? $data["nama"] : "{ Nama }" ?></h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-4">
                                        <div class="progress-wrapper">
                                            <span id="tampil_motto"><?= !empty($data["username"]) ? $data["motto"] : "{ Tidak ada motto. }" ?></span>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Detail Akun</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <form>
                                                    <div class="form-row"><?php if ($menu["judul"] === "Pengguna") { ?>

                                                        <div class="form-group col-md-3">
                                                            <label for="keterangan">Keterangan</label>
                                                            <select id="keterangan" class="form-control">
                                                                <?php
                                                                    foreach ($data["daftar_keterangan"] as $daftar_keterangan) { ?>
                                                                        <option value="<?= $daftar_keterangan["pengguna_keterangan_id"] ?>"<?= $daftar_keterangan["pengguna_keterangan_id"] === $data["keterangan"] ? " selected" : "" ?>><?= $daftar_keterangan["pengguna_keterangan_keterangan"] ?></option><?php } ?>

                                                            </select>
                                                        </div><?php } ?>
                                                        <div class="form-group <?= $menu["judul"] === "Profil" ? "col-md-8" : "col-md-5" ?>">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="Nama" value="<?= !empty($data["username"]) ? $data["nama"] : "" ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email" placeholder="Email" value="<?= !empty($data["username"]) ? $data["email"] : "" ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" id="username" placeholder="Username" value="<?= !empty($data["username"]) ? $data["username"] : "" ?>" <?= !empty($data["username"]) ? "onclick=\"ubah_username()\" readonly" : "" ?>>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control <?= !empty($data["username"]) ? "text-center": "" ?>" id="password" <?= !empty($data["username"]) ? "placeholder=\"Ubah password\" onclick=\"ubah_password()\" readonly" : "placeholder=\"Password\" value=\"\"" ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="motto">Motto</label>
                                                        <textarea class="form-control" name="motto" id="motto" rows="2" placeholder="Motto."><?= !empty($data["username"]) ? $data["motto"] : "" ?></textarea>
                                                    </div>
                                                    <div class="form-row pt-3">
                                                        <div class="form-group <?= $menu["judul_sub"] === "Tambah" ? "col-md-12" : " col-md-6" ?> text-center">
                                                            <button type="button" class="btn btn-accent<?= $menu["judul_sub"] === "Tambah" ? " col-md-12" : "" ?>" id="<?= !empty($data["username"]) ? "perbarui" : "tambah" ?>"><?= !empty($data["username"]) ? "<i class=\"far fa-save mr-1\"></i> Perbarui Profil" : "<i class=\"fas fa-user-plus mr-1\"></i> Tambah Profil" ?></button>
                                                        </div>
                                                        <?php
                                                            if (!empty($data["username"])) {
                                                                echo "<div class=\"form-group col-md-6 text-center\">
                                                            <button type=\"button\" class=\"btn btn-danger\" id=\"hapus\"><i class=\"fas fa-trash-alt mr-1\"></i> Hapus Profil</button>
                                                        </div>";
                                                            } else {
                                                                echo "";
                                                            }
                                                        ?>

                                                    </div>
                                                </form>
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
                $("#nama").keyup(function() {
                    if ($("#nama").val() !== "") {
                        var nama = $("#nama").val();
                    } else {
                        var nama = "{ Nama }";
                    }

                    $("#tampil_nama").html(nama);
                });

                $("#motto").keyup(function() {
                    if ($("#motto").val() !== "") {
                        var motto = $("#motto").val();
                    } else {
                        var motto = "{ Tidak ada motto. }";
                    }

                    $("#tampil_motto").html(motto);
                });

                $("#tambah").click(function() {
                    $.ajax({
                        url: site_api+"/pengguna/tambah",
                        dataType: "json",
                        type: "POST",
                        data : {
                            "keterangan": $("#keterangan").val(),
                            "username": $("#username").val(),
                            "password": $("#password").val(),
                            "nama": $("#nama").val(),
                            "email": $("#email").val(),
                            "motto": $("#motto").val()
                        },
                        beforeSend: function (e) {
                            $("#tambah").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan penambahan...");
                        },
                        success: function(response) {
                            $("#tambah").html("<i class=\"fas fa-user-plus mr-1\"></i> Tambah Profil");

                            if (response.status === 200) {
                                swal({
                                    title: "Profil berhasil ditambahkan.",
                                    icon: "success",
                                    button: "Tutup",
                                })
                                .then((value) => {
                                    window.location.assign(`<?= base_url("administrator/")."pengguna/" ?>`+$("#username").val());
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
                            $("#tambah").html("<i class=\"fas fa-user-plus mr-1\"></i> Tambah Profil");

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

                $("#perbarui").click(function() {
                    if ($("#keterangan").val()+"" !== "undefined") {
                        var keterangan = $("#keterangan").val();
                    } else {
                        var keterangan = Number(`<?= !empty($data["keterangan"]) ?>`)
                    }

                    $.ajax({
                        url: site_api+"/pengguna/perbarui",
                        dataType: "json",
                        type: "POST",
                        data : {
                            "keterangan": keterangan,
                            "username": $("#username").val(),
                            "nama": $("#nama").val(),
                            "email": $("#email").val(),
                            "motto": $("#motto").val()
                        },
                        beforeSend: function (e) {
                            $("#perbarui").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan perubahan...");
                        },
                        success: function(response) {
                            $("#perbarui").html("<i class=\"far fa-save mr-1\"></i> Perbarui Profil");
                            if (response.status === 200) {
                                swal({
                                    title: "Profil berhasil diperbarui.",
                                    icon: "success",
                                    button: "Tutup",
                                })
                                .then((yes) => {
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

                $("#hapus").click(function() {
                    var username = $("#username").val();
                    var nama = $("#nama").val();

                    swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, anda tidak dapat memulihkan data "+nama+".",
                        icon: "warning",
                        dangerMode: true,
						buttons: [
							true,
							{
								text: "Hapus",
								closeModal: false,
							}
						],
                    })
                    .then((yes) => {
                        if (yes) {
                            $.ajax({
                                url: site_api+"/pengguna/hapus/"+username,
                                dataType: "json",
                                type: "GET",
                                success: function(response) {
                                    if (response.status === 200) {
                                        swal({
                                            title: "Profil berhasil dihapus.",
                                            icon: "success",
                                            button: "Tutup"
                                        })
                                        .then((yes) => {
                                            if (username === `<?= $pengguna["username"] ?>`) {
                                                $.ajax({
                                                    url: `<?= $api ?>`+`/otentikasi/keluar`,
                                                    dataType: "json",
                                                    type: "GET",
                                                    success: function(response) {
                                                        if (response.status === 200) {
                                                            window.location.assign(`<?= base_url("administrator") ?>`);
                                                        } else {
                                                            swal({
                                                                title: "Silahkan coba lagi!",
                                                                text: response.keterangan,
                                                                icon: "error",
                                                                button: "Tutup"
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
                                                            title: "Silahkan coba lagi!",
                                                            text: keterangan,
                                                            icon: "error",
                                                            button: "Tutup"
                                                        });
                                                    }
                                                });
                                            } else {
                                                window.location.assign(`<?= base_url("administrator/")."pengguna" ?>`);
                                            }
                                        });
                                    } else {
                                        swal({
                                            title: "Profil gagal dihapus.",
                                            text: response.keterangan,
                                            icon: "error",
                                            button: "Tutup"
                                        });

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
                        }
                    });
                });

                $("#kembali").click(function() {
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Data yang anda sunting tidak akan disimpan.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((yes) => {
                        if (yes) {
                            window.location.assign(`<?= base_url("administrator/")."pengguna" ?>`);
                        }
                    });
                });
            });

            function ubah_username() {
                var username_lama = $("#username").val();

                swal({
                    icon: "warning",
                    title: "Anda akan merubah username dari username \""+$("#username").val()+"\".",
                    content: {
                        element: "input",
                        attributes: {
                        placeholder: "Massukan username baru..",
                        type: "text",
                        }
                    },
                    dangerMode: true,
                    buttons: [
                        true,
                        {
                            text: "Ubah!",
                            closeModal: false,
                        }
                    ],
                })
                .then(username_baru => {
                    if (!username_baru) throw null;

                    $.ajax({
                        url: site_api+"/pengguna/username",
                        dataType: "json",
                        type: "POST",
                        data : {
                            "username_lama": username_lama,
                            "username_baru": username_baru
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                swal({
                                    title: "Username berhasil diperbarui.",
                                    icon: "success",
                                    button: "Tutup"
                                })
                                .then((yes) => {
                                    if (yes) {
                                        if (username_lama === `<?= $pengguna["username"] ?>`) {
                                            $.ajax({
                                                url: `<?= $api ?>`+`/otentikasi/keluar`,
                                                dataType: "json",
                                                type: "GET",
                                                success: function(response) {
                                                    if (response.status === 200) {
                                                        window.location.assign(`<?= base_url("administrator") ?>`);
                                                    } else {
                                                        swal({
                                                            title: "Silahkan coba lagi!",
                                                            text: response.keterangan,
                                                            icon: "error",
                                                            button: "Tutup"
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
                                                        title: "Silahkan coba lagi!",
                                                        text: keterangan,
                                                        icon: "error",
                                                        button: "Tutup"
                                                    });
                                                }
                                            });
                                        } else {
                                            $("input[id=username]").val(username_baru);
                                        }
                                    }
                                });
                            } else {
                                swal({
                                    title: "Username gagal diperbarui.",
                                    text: response.keterangan,
                                    icon: "error",
                                    button: "Tutup"
                                });
                            }
                        },
                        error: function (jqXHR, exception) {
                            swal.stopLoading();
                            swal.close();

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
                })
                .catch(err => {
                    if (err) {
                        swal("Oh noes!", "The AJAX request failed!", "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });
            }

            function ubah_password() {
                swal({
                    icon: "warning",
                    title: "Anda akan merubah password dari username \""+$("#username").val()+"\".",
                    content: {
                        element: "input",
                        attributes: {
                        placeholder: "Massukan password anda.",
                        type: "password",
                        },
                    },
                    dangerMode: true,
                    buttons: [
                        true,
                        {
                            text: "Ubah!",
                            closeModal: false,
                        }
                    ],
                })
                .then(password => {
                    if (!password) throw null;

                    $.ajax({
                        url: site_api+"/pengguna/password",
                        dataType: "json",
                        type: "POST",
                        data : {
                            "username": $("#username").val(),
                            "password": password
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                swal({
                                    title: "Kata sandi berhasil diperbarui.",
                                    icon: "success",
                                    button: "Tutup"
                                })
                                .then((yes) => {
                                    if (yes) {
                                        if ($("#username").val() === `<?= $pengguna["username"] ?>`) {
                                            $.ajax({
                                                url: `<?= $api ?>`+`/otentikasi/keluar`,
                                                dataType: "json",
                                                type: "GET",
                                                success: function(response) {
                                                    if (response.status === 200) {
                                                        window.location.assign(`<?= base_url("administrator") ?>`);
                                                    } else {
                                                        swal({
                                                            title: "Silahkan coba lagi!",
                                                            text: response.keterangan,
                                                            icon: "error",
                                                            button: "Tutup"
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
                                                        title: "Silahkan coba lagi!",
                                                        text: keterangan,
                                                        icon: "error",
                                                        button: "Tutup"
                                                    });
                                                }
                                            });
                                        }
                                    }
                                });
                            } else {
                                swal({
                                    title: "Password gagal diperbarui.",
                                    text: response.keterangan,
                                    icon: "error",
                                    button: "Tutup"
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

                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+keterangan+`</strong>
                            </div>`);
                        }
                    });
                })
                .catch(err => {
                    if (err) {
                        swal("Oh noes!", "The AJAX request failed!", "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });
            }
        </script>
        <!-- //javascript -->
	</body>
</html>