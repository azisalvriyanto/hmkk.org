<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_AProfil extends CI_Controller {
    public function index() {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Profil",
				"judul_sub" => "Profil"
			);
			$data  = $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

			$pengguna		= $this->M_Pengguna->lihat($this->session->userdata("username"));
			if ($pengguna["status"] === 200) {
				$data = @array_merge($data,
					array(
						"data" => array(
							"keterangan" => $pengguna["keterangan"]["keterangan"],
							"username" => $pengguna["keterangan"]["username"],
							"nama" => $pengguna["keterangan"]["nama"],
							"email" => $pengguna["keterangan"]["email"],
							"motto" => $pengguna["keterangan"]["motto"]
						)
					)
				);
			} else {
				redirect(base_url("administrator/")."pengguna");
			}

			$this->load->view("administrator/profil", $data);
		} else {
			redirect("administrator");
		}
	}
}