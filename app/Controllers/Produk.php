<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProdukModel;

class Produk extends ResourceController
{
    use ResponseTrait;
    protected $kategoriModel;
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function getProduk()
    {
        $data = $this->produkModel->getProduk()->getResult();
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

    public function getProdukSearch($id)
    {
        $data = $this->produkModel->getProdukSearch($id)->getResult();
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

    public function getProdukById($id)
    {
        $data = $this->produkModel->getProdukById($id)->getResult();
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

    public function addProduk()
    {
        // dd($_POST);
        // dd($this->request->getFile('gambarProdukView'));
        $kategori = explode(',', $this->request->getVar('kategoriProdukView'));
        $foto = $this->request->getFile('gambarProdukView');
        $fotoName = $foto->getRandomName();
        $dataInsert = [
            'skuProduk' => $this->request->getVar('skuProdukView'),
            'namaProduk' => $this->request->getVar('namaProdukView'),
            'hargaProduk' => $this->request->getVar('hargaProdukView'),
            'isReadyProduk' => 1,
            'gambarProduk' => $fotoName,
            'kategoriProduk' => $kategori[0],
        ];

        if ($foto->move('assets/images/' . $kategori[1] . '/', $fotoName, true)) {
            if ($this->produkModel->insert($dataInsert)) {
                $response = [
                    'status' => true,
                    'message' => 'Berhasil ditambah',
                ];
                return $this->respond($response);
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Gagal ditambah',
                ];
                return $this->respond($response);
            };
        } else {
            $response = [
                'status' => false,
                'message' => 'Gagal diupload',
            ];
            return $this->respond($response);
        };
    }

    public function deleteProduk($idProduk)
    {
        $kategori = explode(',', $this->request->getVar('fotoInfoView'));
        if (unlink('assets/images/' . $kategori[0] . '/' . $kategori[1])) {
            if ($this->produkModel->delete($idProduk)) {
                $response = [
                    'status' => true,
                    'message' => 'Berhasil dihapus',
                ];
                return $this->respond($response);
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Gagal dihapus',
                ];
                return $this->respond($response);
            };
        } else {
            $response = [
                'status' => false,
                'message' => 'Gagal Menghapus Gambar',
            ];
            return $this->respond($response);
        };
    }
}
