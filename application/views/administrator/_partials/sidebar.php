<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
					<div class="main-navbar">
						<nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
							<a class="navbar-brand w-100 mr-0" href="<?= base_url("administrator") ?>" style="line-height: 25px;">
								<div class="d-table m-auto d-flex align-items-center">
									<img id="main-logo" class="d-inline-block align-top mr-1" style="height: 25px;" src="<?= $pengaturan["logo"] ?>">
									<span class="d-none d-md-inline ml-1"><?= $pengaturan["nama_pendek"] ?></span>
								</div>
							</a>
							<a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
								<i class="material-icons">&#xE5C4;</i>
							</a>
						</nav>
					</div>
					<div class="nav-wrapper">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "beranda") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>beranda">
									<i class="material-icons">dashboard</i>
									<span>Beranda</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "pengguna") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>pengguna">
									<i class="material-icons">group</i>
									<span>Pengguna</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "artikel") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>artikel">
									<i class="material-icons">assignment</i>
									<span>Artikel</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "galeri") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>galeri">
									<i class="material-icons">perm_media</i>
									<span>Galeri</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link<?= (@strtolower($menu["judul"]) == "pengaturan") ? " active" : ""; ?>" href="<?= base_url("administrator/") ?>pengaturan">
									<i class="material-icons">settings</i>
									<span>Pengaturan</span>
								</a>
							</li>
						</ul>
					</div>
				</aside>