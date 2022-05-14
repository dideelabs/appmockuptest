<?php

namespace App\Http\Controllers\Biodata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Jabatan;
use App\Models\Pelamar;
use App\Models\Pendidikan;
use App\Models\Pelatihan;
use App\Models\RiwayatKerja;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Collection;

class BiodataController extends Controller
{
      public function index()
      {

        $title = 'Biodata Pelamar';
        $jabatan = Jabatan::get();
        return view('biodata.index',[
          'title'=>$title,
          'jabatan'=>$jabatan
        ]);
      }

      public function form()
      {
        $title = 'Data Pribadi Pelamar';
        $jabatan = Jabatan::get();
        $email_user = auth()->user()->email?auth()->user()->email : '';
        return view('biodata.form',[
          'title'=>$title,
          'jabatan'=>$jabatan,
          'email'=>$email_user
        ]);
      }      

      public function form_edit($id)
      {
        $title = 'Edit Data Pribadi Pelamar';
        $jabatan = Jabatan::get();
        $data = Pelamar::find($id);
        $email_user = auth()->user()->email?auth()->user()->email : '';
        return view('biodata.form-edit',[
          'title'=>$title,
          'jabatan'=>$jabatan,
          'email'=>$email_user,
          'data'=>$data?$data : []
        ]);
      }   

      public function store_biodata(Request $request)
      {
        try{
            $param = $request->all();
            $params = $request->except('_token');
            $params['confirm_available_anywhere'] = $request->confirm_available_anywhere == 'Ya'? true : false;
            Pelamar::create($params);

            return redirect()->route('home');
          }catch(Exception $e){

        }
      }

      public function update_biodata(Request $request)
      {
        try{
            $param = $request->all();
            $params = $request->except('_token');
            $params['confirm_available_anywhere'] = $request->confirm_available_anywhere == 'Ya'? true : false;
            $data = Pelamar::find((int)$request->id);
            if($data){
              $data->update($params);
            }

            return redirect()->route('home');
          }catch(Exception $e){

        }
      }

      public function datatable(Request $request)
      {
          try{
              $data = Pelamar::orderby('nama','asc');

              return datatables()->of($data->get())
              ->editColumn('nama', function ($row){
                $nama = '-';
                if($row->nama){
                    $nama = ucfirst($row->nama);
                }
                  return $nama;
              })
              ->editColumn('tob', function ($row){
                   $born = '-';
                   if($row->tob && $row->dob){
                       $born = $row->tob .', '.date('d-F-Y', strtotime($row->dob));
                   }
                   return $born;
              })
              ->editColumn('jabatan_id', function ($row){
                $jabatan = '-';
                if($row->jabatan_id){
                    $jabatan = Jabatan::where('id',(int)$row->jabatan_id)->pluck('jabatan')->first();
                }
                return $jabatan;
             })
              ->addColumn('action', function ($row){
                  $btn = '
                  <a href="/biodata/detail/'.$row->id.'"><button type="button" class="btn btn-icon btn-outline-success btn-sm cls-button-show" ><i class="fa fa-eye "></i></button>
                  ';
                  return $btn;         
   
              })
              ->rawColumns(['action'])
              ->toJson();
          }catch(Exception $e){
              return response([
                  'draw'            => 0,
                  'recordsTotal'    => 0,
                  'recordsFiltered' => 0,
                  'data'            => []
              ]);
          }
      }

      public function detail($id)
      {
        $title = 'Data Pribadi Pelamar';

        $data = Pelamar::where('id',$id)->first();
        $jabatan = '';
        if($data){
            $jabatan = Jabatan::where('id',(int)$data->jabatan_id)->pluck('jabatan')->first();
        }

        $pendidikan = [];
        if($data){
            $pendidikan = Pendidikan::where('id_pelamar',(int)$data->id)->orderby('tahun','desc')->get();
        }

        $pelatihan = [];
        if($data){
            $pelatihan = Pelatihan::where('id_pelamar',(int)$data->id)->orderby('tahun','desc')->get();
        }

        $rk = [];
        if($data){
            $rk = RiwayatKerja::where('id_pelamar',(int)$data->id)->orderby('id','desc')->get();
        }

        $email_user = auth()->user()->email?auth()->user()->email : '';
        return view('biodata.detail',[
          'title'=>$title,
          'jabatan'=>$jabatan,
          'email'=>$email_user,
          'data'=>$data,
          'pendidikan'=>$pendidikan,
          'pelatihan'=>$pelatihan,
          'rk'=>$rk
        ]);
      }      
}
