@extends('layouts.global')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Pengguna <small> </small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <div class="content">
      <div class="container">
        <div class="row">
          
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
          @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Form Edit Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('users.update',$user->id)}}" method="POST">
              <input type="hidden" value="PUT" name="_method">
                        @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Nama">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" value="{{$user->email}}" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="password_confirmation" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Tipe Pengguna</label>
                    <div class="col-sm-8">
                    @if(!empty($roles))
                                @foreach ($roles as $role)
                                    <div class="col-sm-12 checkbox-radios">
                                        <div class="checkbox">
                                            <label>
                                                @if(!empty($user->getRoleNames()))
                                                    <input type="checkbox" {{in_array($role['name'], json_decode($user->getRoleNames())) ? "checked" : ""}} name="role[]"  id="roles" value="{{ $role['name'] }}">{{ "  ".$role['name'] }}    
                                                @else
                                                  Role Belum Dibuat
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            @endif 
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a class="btn btn-default float-right" href="{{ route('users.index')}}">
                    Kembali
                  </a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


