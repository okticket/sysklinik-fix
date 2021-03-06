@extends('template.style')
@section('isi')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Rekam Medis
    <small>Detail Rekam Medis</small>
    </h1>
    <!--
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-files-o"></i> Main Menu</a></li>
      <li class="active">Assesment</li>
    </ol>
    -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- row -->
    <div class="row">
      <div class="col-xs-12">
        <!-- jQuery Knob -->
        <div class="box box-solid">
          <!-- begin data alat-->
          <form class="form-horizontal" action="{{ url('detail_rekam_medis') }}" method="post">
            @csrf
            <div class="box-body">
              <div class="row">
                <div class="col-xs-7 col-md-12 text-left">
                  <div class="form-group">
                    <label class="col-sm-12"><h3>Data Rekam Medis</h3><hr></label>
                  </div>
                </div>
              </div>
                <div class="col-md-12">
                  <div class="col-md-6">                  
                    <div class="row">
                      <div class="col-xs-12 col-md-12 text-center">
                        <div class="form-group">
                          <label class="col-sm-5 control-label" style="text-align: left; padding-left: 20pt">No. Rekam Medis</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="id_rm" value="{{ $id_rm }}" readonly="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-md-12 text-center">
                        <div class="form-group">
                          <label class="col-sm-5 control-label" style="text-align: left; padding-left: 20pt">Area Stimulasi</label>
                          <div class="col-sm-7">
                            <textarea class="form-control" name="area_stimulasi" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-xs-12 col-md-12 text-center">
                        <div class="form-group">
                          <label class="col-sm-5 control-label" style="text-align: left; padding-left: 20pt">Jadwal</label>
                          <div class="col-sm-7">
                            <select class="form-control" name="id_jadwal" required>
                              @foreach($jadwal as $jadwal)
                                <option value="{{ $jadwal->id_jadwal }}">{{ $jadwal->tgl }}: {{ $jadwal->id_terapi }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-md-12 text-center">
                        <div class="form-group">
                          <label class="col-sm-5 control-label" style="text-align: left; padding-left: 20pt">Keterangan</label>
                          <div class="col-sm-7">
                            <textarea class="form-control" name="keterangan" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <br>
              <div class="button">
                <ul>
                  <button class="btn btn-success" href="#">Simpan</button>
                  <a class="btn btn-danger" onclick="goBack()">Batal</a>
                </ul>
              </div>
              <br>
              <br>
            </div>
          </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- row -->
    <div class="row">
      <div class="col-xs-12">
        <!-- jQuery Knob -->
        <div class="box box-solid">
          <div class="box-header">
            <i class="fa fa-bar-chart-o"></i>
            <h3 class="box-title">Tabel Detail Rekam Medis</h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <table id="pegawais" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID Sesi</th>
                  <th>Jadwal</th>
                  <th>Jenis Terapi</th>
                  <th>Area Stimulasi</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($detail as $detail)
                  <tr>
                    <td>{{ $detail->id_sesirm }}</td>
                    <td>{{ $detail->tgl }}</td>
                    <td>{{ $detail->id_terapi }}</td>
                    <td>{{ $detail->area_stimulasi }}</td>
                    <td>{{ $detail->keterangan }}</td>
                    <td>
                      <form action="{{ url('detail_rekam_medis/'.$detail->id_sesirm) }}" id="rekam_medis" method="POST" style="padding:0px; margin:0px" class="col-md-3">
                          @method('DELETE')
                          @csrf
                          <input type="hidden" name="id_rm" value="{{ $detail->id_rm }}">
                          <input type="submit" value="Hapus" class="btn btn-danger btn-delete">
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>ID Sesi</th>
                <th>Jadwal</th>
                <th>Jenis Terapi</th>
                <th>Area Stimulasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Main content -->
</div>

<script>
  
  $('.btn-delete').click(function(e) {
        return confirm("Are you sure?");
});

  
function goBack() {
  window.history.back();
}
</script>
@endsection