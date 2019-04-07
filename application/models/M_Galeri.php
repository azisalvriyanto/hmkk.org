<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Galeri extends CI_Model {
    public function lihat($tahun)
    {
        $query = $this->db->select("*")->from("galeri")->where("galeri_tahun", $tahun)->get();
        if ($query->num_rows() > 0) {
            $query = $query->row();
            return array(
                "status" => 200,
                "keterangan" => array(
                    "tahun" => $query->galeri_tahun,
                    "instagram" => $query->galeri_instagram
                )
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Profil organisasi tidak ditemukan."
            );
        }
    }
}