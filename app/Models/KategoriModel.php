<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'idKategori';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = ['namaKategori', 'iconKategori', 'colorKategori', 'slugKategori'];

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

    public function getKategori()
    {
        $builder = $this->table($this->table);
        return $builder->get();
    }

    public function getKategoriById($id = null)
    {
        $builder = $this->table($this->table);
        if ($id) {
            $builder->where([
                'idKategori' => $id
            ]);
        }
        return $builder->get();
    }
}
