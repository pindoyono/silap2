@extends('layouts.global')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Barang Bukti Musnah <small> </small></h1>
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
                <h3 class="card-title">Form Edit Barang Bukti Musnah</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('kembali.update',$data->id)}}" method="POST">
              <input type="hidden" value="PUT" name="_method">
                        @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor</label>
                    <div class="col-sm-8">
                      <input type="text"  value="{{ $data->no_terdakwa  }}"  class="form-control" name="no_terdakwa" >
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
                    <label for="inputEmail3" class="col-sm-4 col-form-label">No Barang Bukti</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $data->no_bb  }}"  class="form-control" name="no_bb" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Barang Bukti</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $data->nama_bb  }}" class="form-control" name="nama_bb" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">No Putusan Pengadilan</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $data->pp_no  }}" class="form-control" name="pp_no" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Putusan Pengadilan</label>
                    <div class="col-sm-8">
                    <input type="text" name="tgl_pp" value="{{ customTanggal($data->tgl_pp,'d-m-Y')  }}" placeholder="DD/MM/YYYY" required pattern="(?:30))|(?:(?:0[13578]|1[02])-31))/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])" title="Enter a date in this format YYYY/MM/DD"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">No P-48</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ $data->ppp_no  }}"   name="ppp_no" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Tangal P-48</label>
                    <div class="col-sm-8">
                    <input type="text" name="tgl_ppp" value="{{ customTanggal($data->tgl_ppp,'d-m-Y')  }}" placeholder="DD/MM/YYYY" required pattern="(?:30))|(?:(?:0[13578]|1[02])-31))/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])" title="Enter a date in this format YYYY/MM/DD"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Hari Serah Terima</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{ $data->hari_serah  }}"   name="hari_serah" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Serah  Terima</label>
                    <div class="col-sm-8">
                    <input type="text" name="tgl_serah" value="{{ customTanggal($data->tgl_serah,'d-m-Y')  }}" placeholder="DD/MM/YYYY" required pattern="(?:30))|(?:(?:0[13578]|1[02])-31))/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])" title="Enter a date in this format YYYY/MM/DD"/>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a  class="btn btn-default float-right" href="{{ route('rampas.index')}}">
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

