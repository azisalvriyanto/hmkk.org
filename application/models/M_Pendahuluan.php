<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Pendahuluan extends CI_Model {
    // public function umum($menu) {
    //     $data = array(
    //         "menu" => array(
    //             "judul" => $menu["judul"]
    //         )
    //     );

    //     $query = $this->db->select("*")->from("organisasi")->order_by("organisasi_periode", "desc")->get();
    //     if ($query->num_rows() > 0) {
    //         $query = $query->row();
    //         $data = @array_merge($data,
    //             array(
    //                 "organisasi" => array(
    //                     "periode" => $query->organisasi_periode,
    //                     "nama_lengkap" => $query->organisasi_nama_lengkap,
    //                     "nama_pendek" => $query->organisasi_nama_pendek,
    //                     "logo" => $query->organisasi_periode,
    //                     "visi" => $query->organisasi_visi,
    //                     "misi" => $query->organisasi_misi,
    //                     "deskripsi" => $query->organisasi_deskripsi,
    //                     "tentang" => $query->organisasi_tentang,
    //                     "sejarah" => $query->organisasi_sejarah,
    //                     "kontak" => array(
    //                         "alamat" => $query->organisasi_alamat,
    //                         "email" => $query->organisasi_email,
    //                         "telepon" => $query->organisasi_telepon,
    //                         "facebook" => $query->organisasi_facebook,
    //                         "twitter" => $query->organisasi_twitter,
    //                         "instagram" => $query->organisasi_instagram,
    //                         "youtube" => $query->organisasi_youtube,
    //                         "peta" => $query->organisasi_peta
    //                     )
    //                 )
    //             )
    //         );
    //     }
    //     else {
    //         $data = @array_merge($data,
    //             array(
    //                 "organisasi" => array(
    //                     "periode" => "",
    //                     "nama_lengkap" => "",
    //                     "nama_pendek" => "",
    //                     "visi" => "",
    //                     "misi" => "",
    //                     "deskripsi" => "",
    //                     "tentang" => "",
    //                     "sejarah" => "",
    //                     "kontak" => array(
    //                         "alamat" => "",
    //                         "email" => "",
    //                         "telepon" => "",
    //                         "facebook" => "",
    //                         "twitter" => "",
    //                         "instagram" => "",
    //                         "youtube" => "",
    //                         "peta" => ""
    //                     )
    //                 )
    //             )
    //         );
    //     }

    //     return $data;
    // }

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
                        "tahun" => $query->pengaturan_tahun,
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