@extends('layouts.master')

@section('web-content')
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"></a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('',$errors->all(':message'))}}
                    </div>
                @endif
                <div>
                    <a href="roleCreate" class="btn btn-primary">Masukan Role</a>
                </div>
                <h5 class="card-title">Jenis Role</h5>
                <table id="table-role" class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->nama_role}}</td>
                            <td>
                                <a href="{{ route('role-edit', ['role' =>$role->id]) }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i></button></a>
                                <a id="deleteData" href="{{ route('role-delete', ['role' =>$role->id]) }}" title="Delete"><button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true">Delete</i></button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('spc-css')

@endsection

@section('spc-js')

@endsection