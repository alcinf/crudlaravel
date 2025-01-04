@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
                <a href="{{ url('usuarios/create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-person-fill-add"></i> Nuevo {{ $item }}
                </a>
            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                    <!-- /.row -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection