<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Pendahuluan extends CI_Model {
    public function umum($menu) {
        $data = array(
            "menu" => array(
                "judul" => $menu["judul"]
            )
        );

        $query = $this->db->select("*")->from("pengaturan")->order_by("pengaturan_tahun", "desc")->get();
        if ($query->num_rows() > 0) {
            $query = $query->row();
            $data = @array_merge($data,
                array(
                    "pengaturan" => array(
                        "tahun" => $query->pengaturan_periode,
                        "nama_panjang" => $query->pengaturan_nama_lengkap,
                        "nama_pendek" => $query->pengaturan_nama_pendek,
                        "logo" => base_url("assets/gambar/")."pengaturan/logo_".$query->pengaturan_periode.".png",
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
                )
            );
        }
        else {
            $data = @array_merge($data,
                array(
                    "pengaturan" => array(
                        "tahun" => "",
                        "nama_panjang" => "",
                        "nama_pendek" => "",
                        "deskripsi" => "",
                        "tentang" => "",
                        "kontak" => array(
                            "alamat" => "",
                            "email" => "",
                            "telepon" => "",
                            "facebook" => "",
                            "twitter" => "",
                            "instagram" => "",
                            "youtube" => "",
                            "peta" => ""
                        )
                    )
                )
            );
        }

        return $data;
    }

    public function administrator($menu, $username) {
        $data = array(
            "menu" => array(
                "judul" => $menu["judul"],
                "judul_sub" => $menu["judul_sub"]
            ),
            "api" => base_url("..")."/api.hmkk.org"
        );

        $query = $this->db->select("pengaturan_tahun, pengaturan_nama_panjang, pengaturan_nama_pendek")->from("pengaturan")->order_by("pengaturan_tahun", "desc")->get();
        if ($query->num_rows() > 0) {
            $query = $query->row();
            $data = @array_merge($data,
                array(
                    "pengaturan" => array(
                        "logo" => base_url("assets/gambar/")."pengaturan/logo_".$query->pengaturan_tahun.".png",
                        "nama_panjang" => $query->pengaturan_nama_panjang,
                        "nama_pendek" => $query->pengaturan_nama_pendek
                    )
                )
            );
        }
        else {
            $data = @array_merge($data,
                array(
                    "pengaturan" => array(
                        "tahun" => "",
                        "nama_panjang" => "",
                        "nama_pendek" => ""
                    )
                )
            );
        }

        $query = $this->db->select("pengguna_keterangan, pengguna_username, pengguna_password, pengguna_nama")->from("pengguna")
        ->where("pengguna_username", $username)->get();
        if ($query->num_rows() > 0) {
            $query = $query->row();
            $data = @array_merge($data,
                array(
                    "pengguna" => array(
                        "keterangan" => $query->pengguna_keterangan,
                        "username" => $query->pengguna_username,
                        "nama" => $query->pengguna_nama
                    )
                )
            );
        } else {
            $data = @array_merge($data,
                array(
                    "pengguna" => array(
                        "keterangan" => "",
                        "username" => "",
                        "nama" => ""
                    )
                )
            );
        }

        return $data;
    }
}