<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_APengguna extends CI_Controller {
  	public function index() {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Pengguna",
				"judul_sub" => "Daftar"
			);
			$data		= $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

			$pengguna	= $this->M_Pengguna->daftar();
			if ($pengguna["status"] === 200) {
				$data = @array_merge($data,
					array(
						"data" => $pengguna["keterangan"]
					)
				);
			} else {
				$data = @array_merge($data,
					array(
						"data" => ""
					)
				);
			}

			$this->load->view("administrator/pengguna", $data);
		} else {
			redirect(base_url("administrator"));
		}
	}

	public function lihat($username) {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Pengguna",
				"judul_sub" => "Sunting"
			);
			$data		= $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

			$daftar_keterangan	= $this->db->select("*")->from("pengguna_keterangan")->get();
			$pengguna			= $this->M_Pengguna->lihat($username);
			if ($pengguna["status"] === 200 && !empty($daftar_keterangan)) {
				$data = @array_merge($data,
					array(
						"data" => array(
							"daftar_keterangan" => json_decode(json_encode($daftar_keterangan->result()), TRUE),
							"keterangan" => $pengguna["keterangan"]["keterangan"],
							"username" => $pengguna["keterangan"]["username"],
							"nama" => $pengguna["keterangan"]["nama"],
							"email" => $pengguna["keterangan"]["email"],
							"motto" => $pengguna["keterangan"]["motto"]
						)
					)
				);
			} else {
				redirect(base_url("administrator/")."keanggotaan");
			}

			//print_r($data); exit;

			$this->load->view("administrator/profil", $data);
		} else {
			redirect(base_url("administrator"));
		}
	}

	public function tambah() {
		if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Pengguna",
				"judul_sub" => "Tambah"
			);
			$data		= $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

			$daftar_keterangan	= $this->db->select("*")->from("pengguna_keterangan")->get();
			$data = @array_merge($data,
				array(
					"data" => array(
						"daftar_keterangan" => json_decode(json_encode($daftar_keterangan->result()), TRUE),
						"keterangan" => ""
					)
				)
			);

			$this->load->view("administrator/profil", $data);
		} else {
			redirect(base_url("administrator/")."keanggotaan");
		}
	}
}