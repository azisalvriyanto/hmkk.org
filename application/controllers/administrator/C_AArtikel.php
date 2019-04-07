<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_AArtikel extends CI_Controller {
    public function index() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Artikel",
                "judul_sub" => "Daftar"
            );
            $data  = $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

            $artikel	= $this->M_Artikel->daftar();
            if ($artikel["status"] === 200) {
                $data = @array_merge($data,
                    array(
                        "data" => $artikel["keterangan"]
                    )
                );
            } else {
                $data = @array_merge($data,
                    array(
                        "data" => ""
                    )
                );
            }

            $this->load->view("administrator/artikel", $data);
        } else {
            redirect("administrator");
        }
    }

    public function tambah() {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Artikel",
                "judul_sub" => "Tambah"
            );
            $data  = $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

            $this->load->view("administrator/artikel_pengaturan", $data);
        } else {
            redirect("administrator/artikel");
        }
    }

    public function perbarui($id) {
        if($this->session->userdata("username")) {
            $menu = array(
                "judul" => "Artikel",
                "judul_sub" => "Sunting"
            );
            $data  = $this->M_Pendahuluan->administrator($menu, $this->session->userdata("username"));

            $result    = $this->M_Artikel->lihat($id);
            if ($result["status"] === 200) {
                $data = @array_merge($data,
                    array(
                        "data" => $result["keterangan"]
                    )
                );
            } else {
                redirect("administrator/artikel/tambah");
            }

            $this->load->view("administrator/artikel_pengaturan", $data);
        } else {
            redirect("administrator");
        }
    }
}