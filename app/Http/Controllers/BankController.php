<?php

namespace App\Http\Controllers;

use App\Models\BankModel;
use App\Models\JenispajakModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
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
            'title'                  => 'Data Bank',
            'active_sidemdata'       => 'active',
            'active_akunpajak'       => 'active',
            'page_title'             => 'Pengaturan',
            'breadcumd1'             => 'Master Data',
            'breadcumd2'             => 'Data Bank',
            'userx'                  => UserModel::where('id',$userId)->first(['fullname','role','gambar',]),
        );

        if ($request->ajax()) {

            // $datauser = UserModel::select('id', 'id_opd', 'fullname', 'email', 'role', 'gambar')
            //             ->leftjoin('opd', 'users.id_opd', 'opd.id',)
            //             ->get();

            $datajenispajak = DB::table('tb_bank')
                        ->select('id_bank', 'nama_bank')
                        ->get();

            return Datatables::of($datajenispajak)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '
                                    <a href="javascript:void(0)" title="Edit Data" data-id_bank="'.$row->id_bank.'" class="editBank btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> 
                                    </a>
                                    ';

                            $btn = $btn.'
                                    <a href="javascript:void(0)" title="Hapus Data" data-id_bank="'.$row->id_bank.'" class="deleteBank btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> 
                                    </a>
                                    ';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('Master_Data.Bank.Bank', $data);
    }


    public function store(Request $request)
    {

        $bankId = $request->id_bank;

        $details = [
            'nama_bank'  => $request->nama_bank,
        ];

        BankModel::updateOrCreate(['id_bank' => $bankId], $details);
        return response()->json(['success' =>'Data Berhasil Disimpan']);
        
    }

    public function edit($id_bank)
    {
        $where = array('id_bank' => $id_bank);
        $bank = BankModel::where($where)->first();

        return response()->json($bank);
    }

    public function destroy($id_bank)
    {

        BankModel::where('id_bank', $id_bank)->delete();

        return response()->json(['success'=>'Data Berhasil Dihapus']);
    }
}
