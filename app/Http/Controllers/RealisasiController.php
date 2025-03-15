<?php

namespace App\Http\Controllers;

use App\Models\bkusModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RealisasiController extends Controller
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
            'title'                => 'Realisasi',
            'active_sidepenerimaan'         => 'active',
            'active_realisasi'           => 'active',
            'page_title'           => 'Penatausahaan',
            'breadcumd1'           => 'Penerimaan',
            'breadcumd2'           => 'Realisasi',
            'userx'                => UserModel::where('id',$userId)->first(['fullname','role','gambar',]),
            'total_pendapatandaerah'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.ket4', '4')->sum('nilai_transaksi'),
            'total_pad'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.ket1', '4.1')->sum('nilai_transaksi'),
            'total_pd'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.ket2', '4.1.01')->sum('nilai_transaksi'),
            'total_pdhotel'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.19.03.0001')->sum('nilai_transaksi'),
            'total_pdrestoran'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.19.01.0001')->sum('nilai_transaksi'),
            'total_pdkaraoke'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.08.05.0001')->sum('nilai_transaksi'),
            'total_rd'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02')->sum('nilai_transaksi'),
            'total_rddlh'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Lingkungan Hidup')->sum('nilai_transaksi'),
            'total_rddlhsampah'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.02.0001')->sum('nilai_transaksi'),
            'total_llp'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.03')->sum('nilai_transaksi'),
            'total_llpjsdaerah'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.05.01.0001')->sum('nilai_transaksi'),
            'total_llpjsbendahara'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.05.02.0001')->sum('nilai_transaksi'),


        );

        if ($request->ajax()) {

            $datarealisasi = DB::table('tb_transaksi')
                        ->select('tb_rekening.no_rekening', 'tb_rekening.rekening', 'tb_rekening.rekening2', 'tb_opd.nama_opd', 'tb_bank.nama_bank', 'tb_transaksi.uraian', 'tb_transaksi.ket', 'tb_transaksi.uraian', 'tb_transaksi.no_buku', 'tb_transaksi.tgl_transaksi', 'tb_transaksi.nilai_transaksi', 'tb_transaksi.id_transaksi', )
                        ->join('tb_opd', 'tb_opd.id', '=', 'tb_transaksi.id_opd')
                        ->join('tb_rekening', 'tb_rekening.id_rekening', '=', 'tb_transaksi.id_rekening')
                        ->join('tb_bank', 'tb_bank.id_bank', 'tb_transaksi.id_bank')
                        ->get();

            return Datatables::of($datarealisasi)
                    ->addIndexColumn()
                    ->addColumn('nilai_transaksi', function($row) {
                        return number_format($row->nilai_transaksi);
                    })
                    ->rawColumns(['nilai_transaksi'])
                    ->make(true);
        }

        return view('Penatausahaan.Realisasi.Tampilrealisasi', $data);
    }
}
