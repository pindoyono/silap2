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
                <h3 class="card-title">Form Edit Data Terdakwa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('terdakwa.update',$data->id)}}" method="POST">
              <input type="hidden" value="PUT" name="_method">
                        @csrf
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{$data->nama}}" class="form-control" name="nama" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">NIK</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{$data->nik}}" class="form-control" name="nik" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                      <textarea name="alamat" id="" cols="85" rows="5"> {{ $data->jenis_kelamin }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                      <select name="jenis_kelamin" class="form-control">
                        <option {{$data->jenis_kelamin == 'Laki-laki' ? 'selected':''}} value="Laki-laki"> Laki-laki</option>
                        <option {{$data->jenis_kelamin == 'Perempuan' ? 'selected':''}} value="Laki-laki"> Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Agama</label>
                    <div class="col-sm-8">
                      <select name="agama" class="form-control">
                        <option {{$data->agama == 'Islam' ? 'selected':''}} value="Islam">Islam</option>
                        <option {{$data->agama == 'Kristen' ? 'selected':''}} value="Kristen">Kristen</option>
                        <option {{$data->agama == 'Katolik' ? 'selected':''}} value="Katolik">Katolik</option>
                        <option {{$data->agama == 'Hindu' ? 'selected':''}} value="Hindu">Hindu</option>
                        <option {{$data->agama == 'Budha' ? 'selected':''}} value="Budha">Budha</option>
                        <option {{$data->agama == 'Konghucu' ? 'selected':''}} value="Konghucu">Konghucu</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a class="btn btn-default float-right" href="{{ route('terdakwa.index')}}">
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

@endsection

