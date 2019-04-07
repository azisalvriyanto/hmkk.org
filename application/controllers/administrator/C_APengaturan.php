<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_APengaturan extends CI_Controller {
  public function index() {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Pengaturan",
				"judul_sub" => "Profil"
			);
			$data  = $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

			$pengaturan		= $this->M_Pengaturan->lihat();
			if ($pengaturan["status"] === 200) {
				$data = @array_merge($data,
					array(
						"data" => $pengaturan["keterangan"]
					)
				);
			} else {
				$data = @array_merge($data,
					array(
						"data" => ""
					)
				);
			}

			$this->load->view("administrator/pengaturan", $data);
		} else {
			redirect("administrator");
		}
	}
}