<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
   public function index(){
      
     return view('administrator.user.index');
   }

   public function datatable(Request $request)
   {
       try{
           $data = Users::orderby('name','asc');
           return datatables()->of($data->get())
           ->editColumn('created_at', function ($row){
                $date = '';
                if($row->created_at){
                    $date = date('d-F-Y', strtotime($row->created_at));
                }
                return $date;
           })
           ->addColumn('action', function ($row){
               if($row->role == 'user'){
                $btn = '
                <a href="/user/delete-user/'.$row->id.'"><button type="button" class="btn btn-icon btn-outline-danger btn-sm cls-button-delete "><i class="fa fa-trash "></i></button>
                </a>';
                return $btn;         
               }

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


   public function store(Request $request)
   {
       $cek = Users::where('email',$request->email)->first();
    if(!$cek){
        $store = new Users;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->role = $request->role;
        $store->password = Hash::make($request->password);
        $store->save();
    }

    return redirect()->back();
  }   

  public function delete_user($id)
  {
    $data = Users::find((int)$id);
    if($data){
        $data->delete();
    }
    return redirect()->back();
  }  
}
