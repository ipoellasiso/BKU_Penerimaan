<?php

namespace App\Http\Controllers;

use App\Imports\RekeningImport;
use App\Models\RekeningModel;
use Illuminate\Hashing\HashServiceProvider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class RekeningController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get data
        public function index(Request $request)
    {
        $userId = Auth::guard('web')->user()->id;
        $data = array(
            'title'             => 'Data Rekening',
            'active_side'       => 'active',
            'active_krek'       => 'active',
            'page_title'        => 'Pengaturan',
            'breadcumd1'        => 'Master Data',
            'breadcumd2'        => 'Data Rekening',
            'userx'             => UserModel::where('id',$userId)->first(['fullname','role','gambar',]),
        );

        if ($request->ajax()) {

            $datarek = DB::table('tb_rekening')
                        ->select('tb_rekening.id_rekening', 'tb_rekening.no_rekening', 'tb_rekening.rekening', 'tb_rekening.rekening2')
                        // ->join('opd', 'users.id_opd', 'opd.id',)
                        ->get();

            return Datatables::of($datarek)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '
                                    <a href="javascript:void(0)" title="Edit Data" data-id_rekening="'.$row->id_rekening.'" class="editRek btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> 
                                    </a>
                                    ';

                            $btn = $btn.'
                                    <a href="javascript:void(0)" title="Hapus Data" data-id_rekening="'.$row->id_rekening.'" class="deleteRek btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> 
                                    </a>
                                    ';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('Master_Data.Rekening.Rekening', $data);
    }


    public function store(Request $request)
    {
        request()->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg,gif,svg|max:5000',
        ]);

        $userId = $request->id;
        $user = UserModel::where('id', $userId)->first(['password']);

        $hashPassword ="";
        if($request->password == "" || $request->password == null){
            $hashPassword = $user->password;
        }else{
            $hashPassword = Hash::make($request->password);
        }

        $cek_email = UserModel::where('email', $request->email)->where('id', '!=', $request->id)->first();

        if($cek_email)
        {
            return response()->json(['error'=>'Email sudah ada']);
        }
        else
        {
            $details = [
                'id_opd'  => $request->id_opd,
                'fullname'  => $request->fullname,
                'email'  => $request->email,
                'password'  => $hashPassword,
                'role'  => $request->role,
                'is_active' => 'Nonaktif',
            ];

            if ($files = $request->file('gambar')){
                $destinationPath = 'app/assets/images/user/';
                $profileImage = date('YmdHis').".".$files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $details['gambar'] = "$profileImage";
            }
        }

            UserModel::updateOrCreate(['id' => $userId], $details);
            return response()->json(['success' =>'Data Berhasil Disimpan']);
        
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $user = UserModel::where($where)->first();

        return response()->json($user);
    }

    public function nonaktif($id)
    {
        $userdt = UserModel::findOrFail($id);
        $userdt->update([
            'is_active' => 'Nonaktif',
        ]);

        return response()->json(['success'=>'Data Berhasil Dinonaktifkan']);
    }

    public function aktif($id)
    {
        $userdt = UserModel::findOrFail($id);
        
        $userdt->update([
            'is_active' => 'Aktif',
        ]);

        return response()->json(['success'=>'Data Berhasil Diaktifkan']);
    }

    public function destroy($id_rekening)
    {

        RekeningModel::where('id_rekening', $id_rekening)->delete();

        return response()->json(['success'=>'Data Berhasil Dihapus']);
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->store('public/import');
        $import = new RekeningImport;
        $import->import($file);

        // dd($import->failures());
        if ($import->failures()->isNotEmpty())
        {
            return back()->withFailures($import->failures())->with('error', 'beberapa data sudah ada dan data belum ada akan disimpan ');
        }

        return redirect('/tampilrekening')->with('success', 'Data Berhasil di import');
    }

}
