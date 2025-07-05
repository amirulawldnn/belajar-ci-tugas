<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table            = 'diskon';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = ['tanggal', 'nominal', 'created_at', 'updated_at'];
    protected $validationRules = [
    'tanggal' => 'required|is_unique[diskons.tanggal]',
    'nominal' => 'required|numeric'
];

protected $validationMessages = [
    'tanggal' => [
        'required' => 'Tanggal wajib diisi',
        'is_unique' => 'Tanggal sudah digunakan'
    ],
    'nominal' => [
        'required' => 'Nominal wajib diisi',
        'numeric' => 'Nominal harus berupa angka'
    ]
];


    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // (opsional jika tidak digunakan)
    protected $deletedField  = 'deleted_at';

    // Validasi bisa ditambah jika mau validasi langsung di model
    
}
