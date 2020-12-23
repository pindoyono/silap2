@extends('layouts.global')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Barang Bukti Masuk <small> </small></h1>
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
                <h3 class="card-title">Form Edit Barang Bukti Masuk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('pidum.update',$data->id)}}" method="POST">
              <input type="hidden" value="PUT" name="_method">
                        @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $data->no_terdakwa  }}" class="form-control" name="no_terdakwa" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Terdakwa</label>
                    <div class="col-sm-8">
                      <select name="terdakwa"  class="form-control select2" style="width: 100%;">
                        @foreach($terdakwa as $key => $data1)
                          <option value="{{$data1->id}}">{{$data1->nama.'('.$data1->nik.')'}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3"  class="col-sm-4 col-form-label">JPU</label>
                    <div class="col-sm-8">
                      <select name="jpu"  class="form-control select2" style="width: 100%;">
                          @foreach($jpu as $key => $data1)
                            <option value="{{$data1->id}}">{{$data1->nama.'('.$data1->nip.')'}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Perkara</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $data->jenis_perkara  }}" class="form-control" name="jenis_perkara" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Barang Bukti</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $data->nama_bb  }}" class="form-control" name="nama_bb" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Tangal Masuk</label>
                    <div class="col-sm-8">
                    <div class="form-group">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" name="tgl_masuk" value="{{ customTanggal($data->tgl_masuk,'d/m/Y') }}"  data-toggle="datetimepicker" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                              <div class="input-group-append" data->
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a  class="btn btn-default float-right" href="{{ route('pidum.index')}}">
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

@section('js_tambahan')

@endsection

