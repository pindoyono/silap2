@extends('layouts.global')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Barang Bukti Rampas <small> </small></h1>
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
                    Daftar Barang Bukti Rampas
                </h5>
                <div class="card-tools">
                @role('kajari')
                  @else
                  @role('kaurk')
                    @else
                  <a href="{{route('rampas.create')}}">
                    <button class="btn btn-success">
                      <i class="fas fa-user-plus"></i> Tambah BB Rampas
                    </button>
                  </a>
                  @endrole
                  @endrole
                  <a href="{{route('export_rampas')}}" target="_blank">
                    <button class="btn btn-primary">
                      <i class="fas fa-print"></i> EXPORT EXCEL
                    </button>
                  </a>
                  
                </div>
              </div>
              <div class="card-body">
              <div class="row">
              <table class="table table-bordered">
                <thead class="align-middle">
                  <tr >
                    <th rowspan=2>Nomor</th>
                    <th rowspan=2>Terdakwa</th>
                    <th rowspan=2>Barang Bukti</th>
                    <th colspan=2>Putusan Pengadilan</th>
                    <th colspan=2>P-48</th>
                    @role('kajari'|'kaurk')
                    @else
                    @role('kaurk')
                    @else
                    <th rowspan=2>Opsi</th>
                    @endrole
                  @endrole
                  </tr>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No</th>
                    <th>Tanggal</th>
                  </tr>
                </thead> 
                <tbody>
                @foreach($data as $key => $data)
                  <tr>
                    <td>{{ $data->no_terdakwa }}</td> 
                    <td>{{ $data->nama_terdakwa }}</td> 
                    <td>{{ $data->nama_bb }}</td> 
                    <td>{{ $data->pp_no }}</td> 
                    <td>{{ customTanggal($data->tgl_pp,'d-m-Y')  }}</td> 
                    <td>{{ $data->ppp_no }}</td> 
                    <td>{{ customTanggal($data->tgl_ppp,'d-m-Y')  }}</td> 
                    @role('kajari'|'kaurk')
                    @else
                    @role('kaurk')
                    @else
                    <td class="td-actions text-right">
                          <form onsubmit="return confirm('Apakah Akan Menghapus Data Secara Permanen?')"  action="{{route('rampas.destroy', [$data->id])}}"  method="POST">
                              @csrf
                              <!-- <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                  <i class="material-icons">zoom_in</i>
                              <div class="ripple-container"></div></button> -->
                              <a href="{{route('export_pdf',$data->id)}}" target="_blank">
                                  <button type="button" rel="tooltip" class="btn btn-primary" data-original-title="" title="">
                                    <i class="fas fa-print"></i>
                                  </button>
                              </a>
                              <a href="{{route('rampas.edit',$data->id)}}">
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


