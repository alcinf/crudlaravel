<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrums = [];
        $breadcrum = 'Home';
        $data = [
            'title' => 'Bienvenidos al Sistema',
            'breadcrums' => $breadcrums,
            'breadcrum' => $breadcrum
        ];
        return view('admin.index', $data);
    }
}
