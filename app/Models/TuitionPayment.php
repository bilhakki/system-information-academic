<?php

namespace App\Models;

use CodeIgniter\Model;

class TuitionPayment extends Model
{
    use \Tatter\Relations\Traits\ModelTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'tuition_payments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['student_id', 'payment_date', 'amount', 'receipt_number', 'status', 'season_id'];


    // Dates
    protected $useTimestamps = true;
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

    
    public function getStudent()
    {
        $studentModel = new \App\Models\Student();
        return $studentModel->find($this->student_id);
    }

    public function getSeason()
    {
        $seasonModel = new \App\Models\Season();
        return $seasonModel->find($this->season_id);
    }
}
