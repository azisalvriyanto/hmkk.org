<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Pengaturan extends CI_Model {
    public function lihat()
    {
        $query = $this->db->select("*")->from("pengaturan")->order_by("pengaturan_tahun", "desc")->get();
        if ($query->num_rows() > 0) {
            $query = $query->row();
            return array(
                "status" => 200,
                "keterangan" => array(
                    "tahun" => $query->pengaturan_tahun,
                    "nama_panjang" => $query->pengaturan_nama_panjang,
                    "nama_pendek" => $query->pengaturan_nama_pendek,
                    "deskripsi" => $query->pengaturan_deskripsi,
                    "tentang" => $query->pengaturan_tentang,
                    "kontak" => array(
                        "alamat" => $query->pengaturan_alamat,
                        "email" => $query->pengaturan_email,
                        "telepon" => $query->pengaturan_telepon,
                        "facebook" => $query->pengaturan_facebook,
                        "twitter" => $query->pengaturan_twitter,
                        "instagram" => $query->pengaturan_instagram,
                        "youtube" => $query->pengaturan_youtube,
                        "peta" => $query->pengaturan_peta
                    )
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