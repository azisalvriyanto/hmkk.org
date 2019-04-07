<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_AGaleri extends CI_Controller {
    public function index() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Galeri",
                "judul_sub" => "Keterangan"
            );
            $data  = $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

			$pengaturan    = $this->M_Pengaturan->lihat();
			if ($pengaturan["status"] === 200) {
                $galeri     = $this->M_Galeri->lihat($pengaturan["keterangan"]["tahun"]);
				if ($galeri["status"] === 200) {
					$data = @array_merge($data,
						array(
							"data" => $galeri["keterangan"]
						)
					);
				} else {
					$data = @array_merge($data,
						array(
							"data" => ""
						)
					);
				}
			} else {
				$data = @array_merge($data,
					array(
						"data" => ""
					)
				);
			}

			$this->load->view("administrator/galeri", $data);
        } else {
            redirect("administrator");
        }
    }
}