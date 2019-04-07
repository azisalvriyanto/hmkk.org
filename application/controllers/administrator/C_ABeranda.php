<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_ABeranda extends CI_Controller {
    public function index() {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Beranda",
				"judul_sub" => "Keterangan"
			);
			$data  = $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

			$this->load->view("administrator/beranda", $data);
		} else {
			redirect("administrator");
		}
	}
}