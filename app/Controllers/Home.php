<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        // tulis code construct disini
    }

    public function index()
    {
        $data = [
            'status' => true,
            'message' => 'Selamat datang di rest api irsyad',
        ];
        return $this->respond($data);
    }
}
