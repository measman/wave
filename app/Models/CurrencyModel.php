<?php

namespace App\Models;

use \CodeIgniter\Model;

class CurrencyModel extends Model
{

    protected $table = 'currencies';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'code','country'];

    public function noticeTable()
    {
        $builder = $this->db->table("currencies");
        return $builder;
    }
    public function actionButtons()
    {
        $action_button = function ($row) {            
                return '<button type="button" title="Edit" data-id="' . $row['id'] . '"
                class="btn btn-warning event-edit"><i class="icon fas fa-edit"></i></button> <button data-toggle="tooltip" data-placement="top" title="Delete"
                data-id="' . $row['id'] . '" class="btn btn-danger event-delete"><i class="icon fas fa-trash"></i></button>';
            
        };
        return $action_button;
    }
}