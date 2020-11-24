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
                  
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">
                    Daftar Pengguna
                </h5>
                <div class="card-tools">
                  <a href="{{route('users.create')}}">
                    <button class="btn btn-success">
                      <i class="fas fa-user-plus"></i> Tambah Pengguna
                    </button>
                  </a>
                </div>
              </div>
              <div class="card-body">
              <div class="row">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tipe</th>
                    <th>Opsi</th>
                  </tr>
                </thead> 
                <tbody>
                @foreach($users as $key => $user)
                  <tr>
                    <td> {{ $key+1}}</td> 
                    <td>{{ $user->name }}</td> 
                    <td>{{ $user->email }}</td> 
                    <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <span class="tag label label-info">{{ $v }}</span>
                        @endforeach
                    @endif
                    </td>
                    <td class="td-actions text-right">
                          <form onsubmit="return confirm('Apakah Akan Menghapus Data Secara Permanen?')"  action="{{route('users.destroy', [$user->id])}}"  method="POST">
                              @csrf
                              <!-- <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                  <i class="material-icons">zoom_in</i>
                              <div class="ripple-container"></div></button> -->
                              <a href="{{route('users.edit',$user->id)}}">
                                  <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                    <i class="fas fa-edit"></i>
                                  </button>
                              </a>
                              <input  type="hidden"  name="_method" value="DELETE">
                              <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                              <!-- <input  type="submit"  value="Delete" class="btn btn-danger btn-sm"> -->
                                <i class="fas fa-trash-alt"></i>
                              </button>
                          </form>
                  </td>
                  </tr>      
                  @endforeach
                </tbody></table>
              </div>
              </div>
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


