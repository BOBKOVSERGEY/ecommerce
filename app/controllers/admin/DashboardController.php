<?php


namespace App\Controllers\Admin;


use App\Classes\Request;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function get()
    {
        Request::refresh();
        $data = Request::old('post', 'product');
        var_dump($data);
        if (Request::has('post')) {
            $request = Request::get('post');
            //var_dump($request->post);
            var_dump( $request->product);
        } else {
            var_dump('post doesnt exist');
        }




    }
}
