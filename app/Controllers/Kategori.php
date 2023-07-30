<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    use ResponseTrait;
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function getKategori()
    {
        $data = $this->kategoriModel->getKategori()->getResult();
        if (count($data) > 0) {
            $response = [
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data,
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ];
        }

        return $this->respond($response);
    }

    public function getKategoriById($id)
    {
        $data = $this->kategoriModel->getKategoriById($id)->getResult();
        if (count($data) > 0) {
            $response = [
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data,
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ];
        }

        return $this->respond($response);
    }
}
