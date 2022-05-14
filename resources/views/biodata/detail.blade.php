@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title?$title : "Biodata"}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title?$title : "Biodata"}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@if($data)
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('assets/admin/dist/img/user1-128x128.jpg')}}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{$data->nama?$data->nama : ''}}</h3>
  
                  <p class="text-muted text-center">{{$jabatan?$jabatan : ''}}</p>
  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Info Kontak</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body"> 
                  <strong><i class="fas fa-phone mr-1"></i> No.Telp</strong>
                  <p class="text-muted">{{$data->no_telp?$data->no_telp : ''}}</p>
                  <hr>

                  <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                  <p class="text-muted">{{$data->email?$data->email : ''}}</p>
                  <hr>
                  
                  <strong><i class="fas fa-ambulance mr-1"></i> Kontak Darurat</strong>
                  <p class="text-muted">
                    {{$data->emergency_contact?$data->emergency_contact : ''}}
                  </p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->
               <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Info Gaji</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body"> 
                    <strong><i class="fas fa-money-check mr-1"></i>Expected Salary</strong>
                    <p class="text-muted">{{$data->request_salary?"Rp. " . number_format($data->request_salary,2,',','.') : 0}} /bulan</p>
                    </div>
                    <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#biodatas" data-toggle="tab">Data Pribadi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#edu" data-toggle="tab">Pendidikan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pelatihan" data-toggle="tab">Riwayat Pelatihan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#RK" data-toggle="tab">Riwayat Pekerjaan</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">

                    <div class="active tab-pane" id="biodatas">
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" value="{{$data->nama?$data->nama : ''}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">No.KTP</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" value="{{$data->no_ktp?$data->no_ktp : ''}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">TTL</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" value="{{$data->tob && $data->dob?$data->tob.', '.date('d-F-Y', strtotime($data->dob)) : ''}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName2" value="{{$data->gender?($data->gender == 'L' ? 'Laki-laki' :'Perempuan') : ''}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName2" value="{{$data->agama?$data->agama : ''}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Gol.Darah</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName2" value="{{$data->gol_darah?$data->gol_darah : ''}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName2" value="{{$data->status?$data->status : ''}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Alamat KTP</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" id="inputExperience" readonly>{{$data->alamat_ktp?$data->alamat_ktp : ''}}</textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Alamat Domisili</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" readonly>{{$data->alamat_domisili?$data->alamat_domisili : ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Keahlian</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" readonly>{{$data->keahlian?$data->keahlian : ''}}</textarea>
                            </div>
                        </div>                        
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" {{$data->confirm_available_anywhere?'checked' : ''}}> <a >Bersedia ditempatkan di seluruh kantor Perusahaan</a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                        @if(auth()->user()->role == 'user')
                          <div class="col-sm-12">
                              <a href="{{route('biodata.form_edit',['id'=>$data->id])}}">
                                <button type="button" class="btn btn-outline-info">Edit</button>
                              </a>
                          </div>
                        @else
                        <div class="col-sm-12">
                            <a href="{{ url()->previous() }}">
                              <button type="button" class="btn btn-outline-info">Kembali</button>
                            </a>
                        </div>
                        @endif
                        </div>
                      </form>
                    </div>

                    <div class="tab-pane" id="edu">
                        <!-- Post -->
                        <div class="post">
                          <div class="col-sm-12 mb-2">
                            @if(auth()->user()->role == 'user')
                              <button type="button" id="btnedu" class="btn btn-outline-info">Tambah Pendidikan</button>
                            @endif
                          </div>
                          <div class="user-block col-sm-12">
                              <div class="form-group mb-2" id="formedu">
                                  <form action="{{route('store_pendidikan')}}" method="POST">
                                      {{csrf_field()}}
                                      <input type="hidden" name="id_pelamar" class="form-control" value="{{$data->id}}">
                                      <div class="row">
                                          <div class="col-md-3 mb-2">
                                              <input type="text" class="form-control" name="jenjang" placeholder="Jenjang" required>
                                          </div>
                                          <div class="col-md-9 mb-2">
                                              <input type="text" class="form-control" name="institusi" placeholder="Institusi" required>
                                          </div>
                                          <div class="col-md-7 mb-2">
                                              <input type="text" class="form-control" name="jurusan" placeholder="jurusan" required>
                                          </div>
                                          <div class="col-md-3 mb-2">
                                              <input type="text" class="form-control" name="tahun" placeholder="Tahun Lulus" required>
                                          </div>
                                          <div class="col-md-2 mb-2">
                                              <input type="text" class="form-control" name="ipk" placeholder="IPK/NEM" required>
                                          </div>
                                          <div class="col-md-12 mb-2">
                                              <button type="submit" class="btn btn-info">Simpan</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                          <div class="user-block">
                              <table class="table table-bordered table-responsive">
                                  <thead>
                                    <tr>
                                      <th scope="col" width="15%">Jenjang</th>
                                      <th scope="col" width="30%">Institusi</th>
                                      <th scope="col" width="30%">Jurusan</th>
                                      <th scope="col" width="10%">Tahun Lulus</th>
                                      <th scope="col" width="10%">IPK/NEM</th>
                                      <th scope="col" width="5%">#</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @if($pendidikan)
                                  @foreach($pendidikan as $v)
                                    <tr>
                                      <td>{{$v->jenjang}}</td>
                                      <td>{{$v->institusi}}</td>
                                      <td>{{$v->jurusan}}</td>
                                      <td>{{$v->tahun}}</td>
                                      <td>{{$v->ipk}}</td>
                                      <td><a href="/delete-pendidikan/{{$v->id}}">Hapus</a></td>
                                    </tr>
                                  @endforeach
                                  @endif
                                  </tbody>
                                </table>
                          </div>
                          <div class="form-group row">
                            @if(auth()->user()->role == 'admin')
                            <div class="col-sm-12">
                                <a href="{{ url()->previous() }}">
                                  <button type="button" class="btn btn-outline-info">Kembali</button>
                                </a>
                            </div>
                            @endif
                            </div>
                        </div>
                        <!-- /.post -->
                      </div>
  
                      <div class="tab-pane" id="pelatihan">
                        <!-- Post -->
                        <div class="post">
                          <div class="col-sm-12 mb-2">
                            @if(auth()->user()->role == 'user')
                              <button type="button" id="btnpelatihan" class="btn btn-outline-info">Tambah Pelatihan</button>
                            @endif
                          </div>
                          <div class="user-block col-sm-12">
                              <div class="form-group mb-2" id="formpelatihan">
                                  <form action="{{route('store_pelatihan')}}" method="POST">
                                      {{csrf_field()}}
                                      <input type="hidden" name="id_pelamar" class="form-control" value="{{$data->id}}">
                                      <div class="row">
                                          <div class="col-md-12 mb-2">
                                              <input type="text" class="form-control" name="pelatihan" placeholder="Nama Kursus/Seminar" required>
                                          </div>
                                          <div class="col-md-6 mb-2">
                                              <input type="text" class="form-control" name="sertifikat" placeholder="Status Sertifikat (ada/tidak)" required>
                                          </div>
                                          <div class="col-md-3 mb-2">
                                              <input type="text" class="form-control" name="tahun" placeholder="Tahun" required>
                                          </div>
                                          <div class="col-md-12 mb-2">
                                              <button type="submit" class="btn btn-info">Simpan</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                          <div class="user-block">
                              <table class="table table-bordered table-responsive">
                                  <thead>
                                    <tr>
                                      <th scope="col" width="55%">Nama Kursus/Seminar</th>
                                      <th scope="col" width="30%">Status Sertifikat</th>
                                      <th scope="col" width="10%">Tahun</th>
                                      <th scope="col" width="5%">#</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @if($pelatihan)
                                  @foreach($pelatihan as $v)
                                    <tr>
                                      <td>{{$v->pelatihan}}</td>
                                      <td>{{$v->sertifikat? 'Ada' : 'Tidak Ada'}}</td>
                                      <td>{{$v->tahun}}</td>
                                      <td><a href="/delete-pelatihan/{{$v->id}}">Hapus</a></td>
                                    </tr>
                                  @endforeach
                                  @endif
                                  </tbody>
                                </table>
                          </div>
                          <div class="form-group row">
                            @if(auth()->user()->role == 'admin')
                            <div class="col-sm-12">
                                <a href="{{ url()->previous() }}">
                                  <button type="button" class="btn btn-outline-info">Kembali</button>
                                </a>
                            </div>
                            @endif
                            </div>                          
                        </div>
                        <!-- /.post -->
                      </div>

                      
                      <div class="tab-pane" id="RK">
                        <!-- Post -->
                        <div class="post">
                          <div class="col-sm-12 mb-2">
                            @if(auth()->user()->role == 'user')
                              <button type="button" id="btnRK" class="btn btn-outline-info">Tambah Riwayat Pekerjaan</button>
                            @endif
                          </div>
                          <div class="user-block col-sm-12">
                              <div class="form-group mb-2" id="formRK">
                                  <form action="{{route('store_rk')}}" method="POST">
                                      {{csrf_field()}}
                                      <input type="hidden" name="id_pelamar" class="form-control" value="{{$data->id}}">
                                      <div class="row">
                                          <div class="col-md-9 mb-2">
                                              <input type="text" class="form-control" name="perusahaan" placeholder="Nama Perusahaan/Instansi" required>
                                          </div>
                                          <div class="col-md-3 mb-2">
                                            <input type="number" class="form-control" name="tahun" placeholder="Tahun" required>
                                          </div>
                                          <div class="col-md-6 mb-2">
                                              <input type="text" class="form-control" name="posisi" placeholder="Posisi Terakhir" required>
                                          </div>
                                          <div class="col-md-6 mb-2">
                                            <input type="number" class="form-control" name="gaji" placeholder="Pendapatan Terakhir" required>
                                          </div>
                                          <div class="col-md-12 mb-2">
                                              <button type="submit" class="btn btn-info">Simpan</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                          <div class="user-block">
                              <table class="table table-bordered table-responsive">
                                  <thead>
                                    <tr>
                                      <th scope="col" width="35%">Nama Perusahaan/Instansi</th>
                                      <th scope="col" width="25%">Posisi Terakhir</th>
                                      <th scope="col" width="25%">Pendapatan Terakhir</th>
                                      <th scope="col" width="10%">Tahun</th>
                                      <th scope="col" width="5%">#</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @if($rk)
                                  @foreach($rk as $v)
                                    <tr>
                                      <td>{{$v->perusahaan}}</td>
                                      <td>{{$v->posisi}}</td>
                                      <td>{{"Rp. " . number_format($v->gaji,0,',','.')}}</td>
                                      <td>{{$v->tahun}}</td>
                                      <td><a href="/delete-rk/{{$v->id}}">Hapus</a></td>
                                    </tr>
                                  @endforeach
                                  @endif
                                  </tbody>
                                </table>
                          </div>
                          <div class="form-group row">
                            @if(auth()->user()->role == 'admin')
                            <div class="col-sm-12">
                                <a href="{{ url()->previous() }}">
                                  <button type="button" class="btn btn-outline-info">Kembali</button>
                                </a>
                            </div>
                            @endif
                            </div>                          
                        </div>
                        <!-- /.post -->
                      </div>                      
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@else
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12"> 
                <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col">
                              <h3 class="card-title">Formulir {{$title?$title : "Biodata"}}</h3>
                          </div>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body text-center" >
                      <h2 class="text-center">Belum mengisi Biodata <br>
                        <a href="{{route('biodata.form')}}">
                        <button class="btn btn-primary text-center">Isi Formulir Biodata Pelamar</button>
                        </a>
                      </h2>
                  </div>
                <div class="card-footer" >
                </div>    
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->                      
@endif
  </div>


@push('custom-scripts')
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <script>
         jQuery(document).ready(function(){
            jQuery('#formedu').hide();
            jQuery('#btnedu').on('click', function(event) {        
                jQuery('#formedu').toggle('show');
            });

            jQuery('#formpelatihan').hide();
            jQuery('#btnpelatihan').on('click', function(event) {        
                jQuery('#formpelatihan').toggle('show');
            });

            jQuery('#formRK').hide();
            jQuery('#btnRK').on('click', function(event) {        
                jQuery('#formRK').toggle('show');
            });
        });
  </script>
  @endpush
@endsection

