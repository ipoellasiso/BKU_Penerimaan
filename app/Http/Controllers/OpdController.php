<?php

namespace App\Http\Controllers;

use App\Models\OpdModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OpdController extends Controller
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
            'title'             => 'Data OPD',
            'active_sidemdata'       => 'active',
            'active_opd'       => 'active',
            'page_title'        => 'Pengaturan',
            'breadcumd1'        => 'Master Data',
            'breadcumd2'        => 'Data OPD',
            'userx'             => UserModel::where('id',$userId)->first(['fullname','role','gambar',]),
        );

        if ($request->ajax()) {

            // $datauser = UserModel::select('id', 'id_opd', 'fullname', 'email', 'role', 'gambar')
            //             ->leftjoin('opd', 'users.id_opd', 'opd.id',)
            //             ->get();

            $dataopd = DB::table('tb_opd')
                        ->select('id', 'nama_opd', 'nama_bendahara', 'alamat')
                        ->get();

            return Datatables::of($dataopd)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '
                                    <a href="javascript:void(0)" title="Edit Data" data-id="'.$row->id.'" class="editOpd btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> 
                                    </a>
                                    ';

                            $btn = $btn.'
                                    <a href="javascript:void(0)" title="Hapus Data" data-id="'.$row->id.'" class="deleteOpd btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> 
                                    </a>
                                    ';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('Master_Data.Dataopd.Opd', $data);
    }


    public function store(Request $request)
    {

        $opdId = $request->id;

        $cekopd = OpdModel::where('nama_opd', $request->nama_opd)->count();
        if($cekopd > 0)
        {
            return redirect()->back()->with('error', 'OPD Sudah Ada');
        }
            $details = [
                'nama_opd'  => $request->nama_opd,
                'nama_bendahara'  => $request->nama_bendahara,
                'alamat'  => $request->alamat,
            ];
        

            OpdModel::updateOrCreate(['id' => $opdId], $details);
            return response()->json(['success' =>'Data Berhasil Disimpan']);
        
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $opd = OpdModel::where($where)->first();

        return response()->json($opd);
    }

    public function destroy($id)
    {

        OpdModel::where('id', $id)->delete();

        return response()->json(['success'=>'Data Berhasil Dihapus']);
    }
}
