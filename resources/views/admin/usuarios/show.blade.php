@extends('layouts.admin')

@section('content')

<div class="col-md-6">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Datos registrados</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/usuarios') }}" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <p>{{ $row->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <p>{{ $row->email }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection