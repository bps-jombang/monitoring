<?php 

class Model_admin extends CI_Model {  }

    private $user           = "user",
            $seksi          = "seksi",
            $kegiatan       = "seksi",
            $kegiatandetail = "seksi",
            $mitra          = "mitra",

    // ONLY CREATES
    public function createUser()
    {
        // id_kecamatan,id_role,id_seksi,id_user,nama_user
    }
    public function createKegiatanDanDetail()
    {
        // id_seksi,satuan,target_penyelesaian,uraian_kegiatan,vol,id_user,realisasi,target
        # code...
    }
    public function createSeksi()
    {
        // nama_seksi
        # code...
    }
    public function createJabatan()
    {
        // nama_jabatan
        # code...
    }
    public function createMitra()
    {
        // nama_mitra
        # code...
    }
    
    // ONLY UPDATE
    public function updateUser()
    {
        //
    }
    public function updateKegiatanDanDetail()
    {
        //
    }
    public function updateSeksi()
    {
        //
    }
    public function updateJabatan()
    {
        //
    }
    public function updateMitra()
    {
        //
    }

    // ONLY SHOW ALL
    public function getAllUser()
    {
        //
    }
    public function getAllKegiatanDanDetail()
    {
        //
    }
    public function getAllSeksi()
    {
        //
    }
    public function getAllJabatan()
    {
        //
    }
    public function getAllMitra()
    {
        //
    }

    // ONLY SHOW BY ID
    public function getByIdUser($id)
    {
        //
    }
    public function getByIdKegiatanDanDetail($id)
    {
        //
    }
    public function getByIdSeksi($id)
    {
        //
    }
    public function getByIdJabatan($id)
    {
        //
    }
    public function getByIdMitra($id)
    {
        //
    }

    // ONLY DELETE
    public function deleteByIdUser()
    {
        //
    }
    public function deleteByIdKegiatanDanDetail()
    {
        //
    }
    public function deleteByIdSeksi()
    {
        //
    }
    public function deleteByIdJabatan()
    {
        //
    }
    public function deleteByIdMitra()
    {
        //
    }
?>