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
        $request = Request::get('file');
        //var_dump($request->post);
        var_dump( $request->image->name);
    }
}
