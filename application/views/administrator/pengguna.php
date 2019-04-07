<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("administrator/_partials/head.php") ?>

        <style type="text/css">
            .table td {
                vertical-align : middle;
            }

            tbody tr:hover {
                background-color: #fbfbfb;
                color: #007bff;
                box-shadow: inset .1875rem 0 0 #007bff;
                will-change: background-color,box-shadow,color;
                transition: box-shadow .2s ease,color .2s ease,background-color .2s ease;
            }

            .focus {
                background-color: #fbfbfb;
                color: #007bff;
                box-shadow: inset .1875rem 0 0 #007bff;
                will-change: background-color,box-shadow,color;
                transition: box-shadow .2s ease,color .2s ease,background-color .2s ease;
            }
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
                            <div class="col">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <div class="form-row">
                                            <div class="col-md-9  mt-2 mb-2">
                                                <h6 class="m-0">Daftar Pengguna</h6>
                                            </div>
                                            <div class="col-md-3 pt-1 text-center">
                                                <a href="<?= base_url("administrator/") ?>pengguna/tambah">
                                                    <button type="button" class="btn btn-accent" id="tambah">
                                                        <i class="fas fa-user-plus mr-1"></i>
                                                        Tambah Pengguna
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 pb-3 text-center">
                                                        
                                        <table class="table mb-0" id="table"<?= !empty($data) ? "" : " hidden" ?>>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col" class="border-0">#</th>
                                                    <th scope="col" class="border-0">Nama</th>
                                                    <th scope="col" class="border-0">Email</th>
                                                    <th scope="col" class="border-0">Keterangan</th>
                                                    <th scope="col" class="border-0">Pengaturan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody"><?php
                                            if (!empty($data)) {
                                                for ($i=0; $i<count($data); $i++) { ?>

                                                <tr id="<?= $data[$i]["pengguna_username"] ?>">
                                                    <td><?= $i+1 ?></td>
                                                    <td><?= $data[$i]["pengguna_nama"] ?></td>
                                                    <td><?= $data[$i]["pengguna_email"] ?></td>
                                                    <td><?= $data[$i]["pengguna_keterangan_keterangan"] ?></td>
                                                    <td class="text-nowrap">
                                                        <button type="button" onclick="sunting(`<?= $data[$i]['pengguna_username'] ?>`, `<?= $data[$i]['pengguna_nama'] ?>`);" class="btn btn-sm btn-outline-info mr-1">
                                                            <i class="fas fa-pencil-alt mr-1"></i>
                                                            Sunting
                                                        </button>
                                                        <button type="button" onclick="hapus(`<?= $data[$i]['pengguna_username'] ?>`, `<?= $data[$i]['pengguna_nama'] ?>`);" class="btn btn-sm btn-outline-danger mr-1">
                                                            <i class="fas fa-trash-alt mr-1"></i>
                                                            Hapus
                                                        </button>
                                                    </td>
                                                <tr><?php } } ?>

                                            </tbody>
                                        </table>

                                        <div id="keterangan" class="row"<?= !empty($data) ? " hidden" : "" ?>>
                                            <div class="col-md-12 text-center pt-3">
                                                <label>Daftar anggota tidak ditemukan.</label>
                                            </div>
                                        </div>
                                    </div>
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

            function sunting(username, nama) {
                $("#"+username).addClass("focus");

                swal({
                    title: "Apakah anda yakin?",
                    text: "Anda akan menyunting data dari \""+nama+"\".",
                    icon: "warning",
                    buttons: true,
                })
                .then((yes) => {
                    if (yes) {
                        window.location.assign(`<?= base_url("administrator/")."pengguna/" ?>`+username);
                    }
                    else {
                        $("#"+username).removeClass("focus");
                    }
                });
            }

            function hapus(username, nama) {
                $("#"+username).addClass("focus");

                swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, anda tidak dapat memulihkan data dari \""+nama+"\".",
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
                                        title: "Data Berhasil dihapus.",
                                        icon: "success",
                                        button: "Tutup"
                                    });

                                    $("#"+username).closest("tr").remove();
                                } else {
                                    swal({
                                        title: "Data gagal dihapus.",
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

                                    $("#"+username).removeClass("focus");
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

                                $("#"+username).removeClass("focus");
                            }
                        });
                    }
                    else {
                        $("#"+username).removeClass("focus");
                    }
                });
            }
        </script>
        <!-- //javascript -->
	</body>
</html>