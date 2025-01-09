<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $request->validate([
             'name' => 'required|max:100'
            ,'email' => 'required|unique:users,email'
            ,'password' => 'required|confirmed'
        ]);
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password =  Hash::make($request->password);
        $usuario->save();

        return redirect()->route('usuarios.index')->
            with('message','Se realizó el registro correctamente')->
            with('icon','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = User::findOrFail($id);
        $breadcrums = [
            ['name' => 'Home', 'url' => route('admin.index')],
            ['name' => 'Usuarios', 'url' => route('usuarios.index')],
        ];
        $breadcrum = 'Detalle de '.$this->item;
        $data = [
            'title' => 'Detalle de '. $this->item
           ,'item' => $this->item
           ,'items' => $this->items
           ,'breadcrums' => $breadcrums
           ,'breadcrum' => $breadcrum
           ,'row' => $row
        ];
        return view('admin.usuarios.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = User::findOrFail($id);
        $breadcrums = [
            ['name' => 'Home', 'url' => route('admin.index')],
            ['name' => 'Usuarios', 'url' => route('usuarios.index')],
        ];
        $breadcrum = 'Editar '.$this->item;
        $data = [
            'title' => 'Editar '. $this->item
           ,'item' => $this->item
           ,'items' => $this->items
           ,'breadcrums' => $breadcrums
           ,'breadcrum' => $breadcrum
           ,'row' => $row
        ];
        return view('admin.usuarios.edit', $data);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //echo $id;
        $request->validate([
             'name' => 'required|max:100'
            ,'email' => 'required|unique:users,email'
            ,'password' => 'confirmed'
        ]);
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password =  Hash::make($request->password);
        $usuario->save();
        
        return redirect()->route('usuarios.index')->
            with('message','Se actualizó el registro correctamente')->
            with('icon','info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('usuarios.index')->
            with('message','Se eliminó el registro correctamente')->
            with('icon','error');

    }
}
