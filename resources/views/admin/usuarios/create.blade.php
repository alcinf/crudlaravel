@extends('layouts.admin')

@section('content')

<div class="col-md-6">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/usuarios') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Ingrese su nombre" required>
                            @error('name') 
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email"  value="{{ old('email') }}" class="form-control" placeholder="Ingrese su correo electrónico" required>
                            @error('email') 
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
                            @error('password') 
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirme su contraseña" required>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-floppy"></i> Guardar registro
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection