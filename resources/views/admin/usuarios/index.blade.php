@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
                <a href="{{ url('admin/usuarios/create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-person-fill-add"></i> Nuevo {{ $item }}
                </a>
            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center">Núm.</th>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php $cont = 0; @endphp
                    @foreach($data as $user)
                    @php $cont++; @endphp
                    <tr>
                        <td style="text-align: center">{{ $cont }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="text-align: center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('usuarios.show',$user->id) }}" type="button" class="btn btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('usuarios.edit',$user->id) }}" type="button" class="btn btn-success">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="" type="button" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                    <!-- /.row -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection