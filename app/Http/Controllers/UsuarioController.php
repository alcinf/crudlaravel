<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    private $item = 'usuario';
    private $items = 'usuarios';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::all();
        $breadcrums = [
            ['name' => 'Home', 'url' => route('admin.index')]
        ];
        $breadcrum = ucfirst($this->items);
        $data = [
            'title' => 'Listado de ' . $this->items
            ,'item' => $this->item
            ,'items' => $this->items
            ,'breadcrums' => $breadcrums
            ,'breadcrum' => $breadcrum
            ,'data' => $query
        ];
        return view('admin.usuarios.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrums = [
            ['name' => 'Home', 'url' => route('admin.index')],
            ['name' => 'Usuarios', 'url' => route('usuarios.index')]
        ];
        $breadcrum = 'Nuevo '.$this->item;
        $data = [
            'title' => 'Nuevo ' . $this->item
            ,'item' => $this->item
            ,'items' => $this->items
            ,'breadcrums' => $breadcrums
            ,'breadcrum' => $breadcrum
        ];
        return view('admin.usuarios.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->all();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
