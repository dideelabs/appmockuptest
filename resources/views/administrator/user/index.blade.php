@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Setting - User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Administrator</a></li>
              <li class="breadcrumb-item active">User</li>
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
                            <h3 class="card-title">User Management</h3>
                        </div>
                        <div class="col-2 text-right">
                            <button type="button" class="btn btn-block btn-outline-primary btn-sm mb-2" id="btnusr">
                                <i class="fa fa-plus"></i> 
                                Tambah User
                            </button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <form action="{{ route('user.store') }}" method="POST" style="border: ridge;" id="formusr">
                            {{ csrf_field() }}
                              <div class="card-body">
                                <strong>Form User</strong>
                                  <div class="form-group">
                                    <label for="username">
                                    </label>
                                    <input type="text" class="form-control form-control-border" name="name" id="username" placeholder="Username" autocomplete="off" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="role">
                                    </label>
                                    <select name="role" id="role" class="form-control form-control-border">
                                      <option value="" disabled selected>-Pilih Role-</option>
                                      <option value="user">User</option>
                                      <option value="admin">Admin</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="email">
                                    </label>
                                    <input type="email" class="form-control form-control-border" name="email" id="email" placeholder="Email" autocomplete="off" value="" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="password">
                                    </label>
                                    <input type="password" class="form-control form-control-border" name="password" id="password" placeholder="Password" autocomplete="off" value="" required>
                                  </div>
                              </div>
                            <div class="card-footer justify-content-between">
                              <button type="button" class="btn btn-default" id="btnusrbatal">Batal</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>                      
                      </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" >
                  <table  class="table table-bordered table-responsive table-striped user-table" width="100%">
                    <thead>
                    <tr>
                      <th width="5%">No.</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Join At</th>
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
    var urldatatable = "{{ route('user.datatable') }}";
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
                          { data: 'name', name: 'name'  },
                          { data: 'email', name: 'email' },
                          { data: 'role', name: 'role' },
                          { data: 'created_at', name: 'created_at' },
                          { data: 'action', name:'action' ,sClass:'text-center', orderable:false},
                       ],
              order: [[0, 'desc']]
          });
  
        });	

        jQuery(document).ready(function(){
            jQuery('#formusr').hide();
            jQuery('#btnusr,#btnusrbatal').on('click', function(event) {        
                jQuery('#formusr').toggle('show');
            });
        });
  </script>
  @endpush
@endsection

