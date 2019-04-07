<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_AMasuk extends CI_Controller {
	public function index() {
		if($this->session->userdata("username")) {
			redirect("administrator/beranda");
		} else {
			$data  = array(
				"api" => base_url("..")."/api.hmkk.org"
      );

			$this->load->view("administrator/masuk", $data);
		}
  }
}