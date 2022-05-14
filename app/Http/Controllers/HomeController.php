<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Users;
use App\Models\Jabatan;
use App\Models\Pelamar;
use App\Models\Pendidikan;
use App\Models\Pelatihan;
use App\Models\RiwayatKerja;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $title = 'Biodata Pelamar';
            $jabatan = Jabatan::get();
            return view('biodata.index',[
              'title'=>$title,
              'jabatan'=>$jabatan
            ]);
        }else{
            $log_email = auth()->user()->email;
            $title = 'Data Pribadi Pelamar';

            $data = Pelamar::where('email',$log_email)->first();
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

    public function store_pendidikan(Request $request)
    {
        try{
            $param = $request->all();
            $params = $request->except('_token');
            $params['id_pelamar'] = (int)$request->id_pelamar;
            Pendidikan::create($params);

            return redirect()->back();
          }catch(Exception $e){
        }
    }

    public function store_rk(Request $request)
    {
        try{
            $param = $request->all();
            $params = $request->except('_token');
            $params['id_pelamar'] = (int)$request->id_pelamar;
            RiwayatKerja::create($params);

            return redirect()->back();
          }catch(Exception $e){
        }
    }

    public function delete_pendidikan($id)
    {
        try{
            $data=Pendidikan::find($id);
            if($data){
                $data->delete();
            }
            return redirect()->back();
          }catch(Exception $e){
        }
    }    

    public function store_pelatihan(Request $request)
    {
        try{
            $param = $request->all();
            $params = $request->except('_token');
            $params['id_pelamar'] = (int)$request->id_pelamar;
            Pelatihan::create($params);

            return redirect()->back();
          }catch(Exception $e){
        }
    }

    public function delete_pelatihan($id)
    {
        try{
            $data=Pelatihan::find($id);
            if($data){
                $data->delete();
            }
            return redirect()->back();
          }catch(Exception $e){
        }
    }       

    public function delete_rk($id)
    {
        try{
            $data=RiwayatKerja::find($id);
            if($data){
                $data->delete();
            }
            return redirect()->back();
          }catch(Exception $e){
        }
    }           
}
