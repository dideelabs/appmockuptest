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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12"> 
              <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title">Tabel {{$title?$title : "Biodata"}}</h3>
                        </div>
                        <div class="col-2 text-right">
                          <a href="{{route('biodata.form')}}">
                            <button type="button" class="btn btn-block btn-outline-primary btn-sm">
                                <i class="fa fa-plus"></i> 
                                Tambah
                            </button>
                          </a>
                        </div>
                      </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                  <table  class="table table-bordered table-responsive table-striped user-table" width="100%">
                    <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>Nama</th>
                      <th>Tempat,Tgl Lahir</th>
                      <th>Posisi Dilamar</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody >
                    </tbody>
                  </table>
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
    var urldatatable = "{{ route('biodata.datatable') }}";
       $(function(){
          $.ajaxSetup({
                headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                });
  
          $('.user-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                      url: urldatatable,
                      type: 'GET',
                      // data: function (d) {
                      //     // d.perusahaan_id =  $("#perusahaan_id").val();
                      //     // d.periode_id =  $("#periode_id").val();
                      //     // d.status_id =  $("#status_id").val();
                      //     // d.tahun =  $("#tahun").val();
                      // }
              },
              columns: [
                        {data: "id",
                          render: function (data, type, row, meta) {
                                  return meta.row + meta.settings._iDisplayStart + 1;
                              }
                              ,sClass:'text-center',
                              orderable:false
                          },
                          { data: 'nama', name: 'nama'  },
                          { data: 'tob', name: 'tob' },
                          { data: 'jabatan_id', name: 'jabatan_id' },
                          { data: 'action', name:'action' ,sClass:'text-center', orderable:false},
                       ],
              order: [[0, 'desc']]
          });
  
        });	
  </script>
  @endpush
@endsection

