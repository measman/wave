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
    function action()
    {
        $txtname_error = '';
        $txtcountry_error = '';
        $txtcode_error = '';
        $error = 'no';
        $success = 'no';
        $message = '';
        if ($this->request->getVar('action')) {
            $rules = [
                'txtname' => 'required',
                'txtcountry' => 'required',
                'txtcode' => 'required'
            ];
            if ($this->validate($rules)) {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $insert_data = array(
                        'name' => $this->request->getVar('txtname'),
                        'country' => $this->request->getVar('txtcountry'),
                        'code' => $this->request->getVar('txtcode')
                    );


                    if ($this->currencymodel->save($insert_data)) {
                        $message = 'Added Succesfully.';
                    } else {
                        $message = 'Sorry, Saving Data Failed.';
                    }
                }
                if ($this->request->getVar('action') == 'Edit') {
                    $id = $this->request->getVar('hidden_id');
                    $update_data =  array(
                        'name' => $this->request->getVar('txtname'),
                        'country' => $this->request->getVar('txtcountry'),
                        'code' => $this->request->getVar('txtcode')
                    );


                    if ($this->currencymodel->update($id, $update_data)) {
                        $message = 'Updated Succesfully.';
                    } else {
                        $message = 'Sorry, Saving Data Updating Failed.';
                    }
                }
            } else {
                $error = 'yes';
                $txtname_error = display_error($this->validator, 'txtname');
                $txtcountry_error = display_error($this->validator, 'txtcountry');
                $txtcode_error = display_error($this->validator, 'txtcode');
            }

            $output = array(
                'txtname_error' => $txtname_error,
                'txtcountry_error' => $txtcountry_error,
                'txtcode_error' => $txtcode_error,
                'error'             => $error,
                'success'           => $success,
                'message'           => $message
            );
            echo json_encode($output);
        }
    }
    function fetch_single_data()
    {
        if ($this->request->getVar('id')) {
            $cur_data = $this->currencymodel->where('id', $this->request->getVar('id'))->first();
            echo json_encode($cur_data);
        }
    }
    function delete()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
            $event_data = $this->currencymodel->where('id', $id)->delete($id);
            echo json_encode(['message' => 'Deleted Successfully']);
        }
    }
}