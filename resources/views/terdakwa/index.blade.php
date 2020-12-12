@extends('layouts.global')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Data Terdakwa <small> </small></h1>
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
                    Daftar Terdakwa 
                </h5>
                <div class="card-tools">
                  @role('kajari')
                  @else
                  <a href="{{route('terdakwa.create')}}">
                    <button class="btn btn-success">
                      <i class="fas fa-user-plus"></i> Tambah Terdakwa
                    </button>
                  </a>
                  @endrole
                  <!-- <a href="{{route('export_masuk')}}" target="_blank">
                    <button class="btn btn-primary">
                      <i class="fas fa-print"></i> EXPORT EXCEL
                    </button>
                  </a> -->
                </div>
              </div>
              <div class="card-body">
              <div class="row">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    @role('kajari')
                  @else
                    <th>Opsi</th>
                  @endrole
                  </tr>
                </thead> 
                <tbody>
                @foreach($data as $key => $data)
                  <tr>
                    <td>{{ $key + 1 }}</td> 
                    <td>{{ $data->nama }}</td> 
                    <td>{{ $data->nik }}</td> 
                    <td>{{ $data->alamat }}</td> 
                    <td>{{ $data->jenis_kelamin }}</td> 
                    <td>{{ $data->agama }}</td> 
                    </td>
                    @role('kajari')
                  @else
                    <td class="td-actions text-right">
                          <form onsubmit="return confirm('Apakah Akan Menghapus Data Secara Permanen?')"  action="{{route('terdakwa.destroy', [$data->id])}}"  method="POST">
                              @csrf
                              <!-- <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                  <i class="material-icons">zoom_in</i>
                              <div class="ripple-container"></div></button> -->
                              <a href="{{route('terdakwa.edit',$data->id)}}">
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
                  @endrole
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


