<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Artikel extends CI_Model {
    public function daftar()
    {
        $query = $this->db->select("pengguna_nama, artikel_keterangan_keterangan, artikel.*")->from("artikel")
        ->join("pengguna", "pengguna.pengguna_username=artikel.artikel_penerbit")
        ->join("artikel_keterangan", "artikel_keterangan_id=artikel.artikel_keterangan")
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
                "keterangan" => "Artikel tidak ditemukan."
            );
        }
    }

    public function lihat($id)
    {
        $query = $this->db->select("pengguna_nama, artikel_keterangan_keterangan, artikel.*")->from("artikel")
        ->join("pengguna", "pengguna.pengguna_username=artikel.artikel_penerbit")
        ->join("artikel_keterangan", "artikel_keterangan_id=artikel.artikel_keterangan")
        ->where("artikel_id", $id)->get();

        if ($query->num_rows() > 0) {
            $query  = $query->row();
            return array(
                "status" => 200,
                "keterangan" => array(
                    "id" => $query->artikel_id,
                    "keterangan" => $query->artikel_keterangan_keterangan,
                    "waktu" => $query->artikel_waktu,
                    "penerbit_nama" => $query->pengguna_nama,
                    "judul" => $query->artikel_judul,
                    "isi" => $query->artikel_isi
                )
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Artikel tidak ditemukan."
            );
        }
    }
}