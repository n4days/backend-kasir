<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'idProduk';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['skuProduk', 'namaProduk', 'hargaProduk', 'isReadyProduk', 'gambarProduk', 'kategoriProduk'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getProduk()
    {
        $builder = $this->table($this->table);
        $builder->join('kategori', 'kategori.idKategori=' . $this->table . '.kategoriProduk', 'LEFT');
        return $builder->get();
    }

    public function getProdukSearch($id = null)
    {
        $builder = $this->table($this->table);
        $builder->join('kategori', 'kategori.idKategori=' . $this->table . '.kategoriProduk', 'LEFT');
        if ($id) {
            $builder->where([
                'idKategori' => $id,
            ]);
        }
        return $builder->get();
    }

    public function getProdukById($id = null)
    {
        $builder = $this->table($this->table);
        if ($id) {
            $builder->where([
                'idProduk' => $id,
            ]);
        }
        return $builder->get();
    }
}
