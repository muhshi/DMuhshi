<?php

namespace App\Models;

use CodeIgniter\Model;

class IzinModel extends Model
{
    protected $table            = 'izin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'keperluan', 'hari', 'jam_pergi', 'jam_balik', 'atas_izin'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'keperluan' => 'required',
        'jam_pergi' => 'required',
        'jam_balik' => 'required',
        'atas_izin' => 'required'

    ];

    protected $validationMessages   = [
        'keperluan' => [
            'required' => 'Keperluan harus diisi'
        ],
        'jam_pergi' => [
            'required' => 'Jam Pergi harus diisi'
        ],
        'jam_balik' => [
            'required' => 'Jam Kembali harus diisi'
        ],
        'atas_izin' => [
            'required' => 'Atas izin siapa harus diisi'
        ],
    ];
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
}
