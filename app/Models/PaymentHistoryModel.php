<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentHistoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'payment_history';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'user_id',
                                    'first_name',
                                    'last_name',
                                    'payer_id',
                                    'payment_gross',
                                    'payment_status',
                                    'payment_date',
                                    'receiver_id',
                                    'mc_gross',
                                    'txn_id',
                                    'mc_currency',
                                    'payer_email'
                                  ];

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
}