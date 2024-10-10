@extends('layouts.master')

@section('web-content')
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
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
                <form method="post" action="{{route('role-update',['role' => $roles->id])}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="role-id">ID</label>
                            <input type="text" class="form-control" id="role-id" placeholder="Id Role" name="id"
                                   value="{{ value($roles->id) }}"
                                   readonly autofocus maxlength="10">
                        </div>
                            <div class="form-group">
                                <label for="nama-role">Nama Role</label>
                                <input type="text" maxlength="40" class="form-control" id="nama-role" placeholder="Nama Role"
                                       value="{{ value($roles->nama_role) }}"
                                      required name="nama_role">
                            </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('spc-css')

@endsection

@section('spc-js')

@endsection