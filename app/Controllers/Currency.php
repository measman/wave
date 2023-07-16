<?php

namespace App\Controllers;

use \App\Libraries\Hash;
use \App\Models\CurrencyModel;
use monken\TablesIgniter;
class Currency extends BaseController
{
    public $session;
    public $currencymodel;
    public function __construct()
    {
        $this->session = session();
        $this->currencymodel = new CurrencyModel();
    }
    public function manage()
    {
        return view('admin/currency');
    }
    function fetch_all()
    {
        $table = new TablesIgniter();
        $table->setTable($this->currencymodel->noticeTable())
            ->setDefaultOrder("id", "DESC")
            ->setSearch(["name"])
            ->setOrder(["name", "country", "code", null])
            ->setOutput(["name", "country", "code",  $this->currencymodel->actionButtons()]);
        return $table->getDatatable();
    }
    
}