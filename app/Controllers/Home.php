<?php

namespace App\Controllers;

use App\Models\ProductModel; 

class Home extends BaseController
{
    function  __construct(){
        $this->product = new ProductModel();
        helper('form');
        helper('number');
    }


    public function index(): string
    {   
        $product = $this->product->findAll();
        $data['product'] = $product;        

        return view('v_home', $data);
    }

    public function faq()
    {
        return view('v_faq');
    }

    public function profile()
    {
        return view('v_profile');
    }

    public function contact()
    {
        return view('v_contact');
    }
}
