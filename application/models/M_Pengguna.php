<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Pengguna extends CI_Model {
    public function daftar()
    {
        $query = $this->db->select("pengguna_keterangan_keterangan, pengguna.*")->from("pengguna")
        ->join("pengguna_keterangan", "pengguna.pengguna_keterangan=pengguna_keterangan.pengguna_keterangan_id")
        ->get();

        if ($query->num_rows() > 0) {
            return array(
                "status" => 200,
                "keterangan" => json_decode(json_encode($query->result()), TRUE)
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Daftar anggota tidak ditemukan."
            );
        }
    }

    public function lihat($username)
    {
        $query = $this->db->select("*")->from("pengguna")->where("pengguna_username", $username)->get();

        if ($query->num_rows() > 0) {
            $query  = $query->row();

            return array(
                "status" => 200,
                "keterangan" => array(
                    "keterangan" => $query->pengguna_keterangan,
                    "username" => $query->pengguna_username,
                    "nama" => $query->pengguna_nama,
                    "email" => $query->pengguna_email,
                    "motto" => $query->pengguna_motto
                )
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Profil tidak ditemukan."
            );
        }
    }
}