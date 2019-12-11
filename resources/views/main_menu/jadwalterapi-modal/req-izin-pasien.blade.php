<div role="tabpanel" class="tab-pane" id="profiles">
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- jQuery Knob -->
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Tabel Request Jadwal Pasien</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="pegawais" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Hari</th>
                  <th>Waktu</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($rpasien as $isi)
                  <tr>
                    <td>{{$isi->nama}}</td>
                    <td>{{$isi->hari}}</td>
                    <td>{{$isi->waktu}}</td>
                    <td>{{$isi->ket_izin}}</td>
                    <td>
                      @if($isi->deskripsi=="Request")
                        <a href="{{url('/jadwal-terapi')}}/{{$isi->id_jadwal}}/{{$isi->id_requestjadwal}}/Diterima/req-izin-pasien" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-social-icon btn-dropbox">
                          <i class="fa fa-check"></i></a>
                        <a href="{{url('/jadwal-terapi')}}/{{$isi->id_jadwal}}/{{$isi->id_requestjadwal}}/Ditolak/req-izin-pasien" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-social-icon btn-danger">
                          <i class="fa fa-close"></i></a>
                      @elseif($isi->deskripsi=="Diterima")
                        <span class="badge bg-green">Diterima</span>
                      @else
                        <span class="badge bg-red">Ditolak</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Hari</th>
                  <th>Waktu</th>
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
</div>