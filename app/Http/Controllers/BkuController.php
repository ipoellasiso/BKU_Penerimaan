<?php

namespace App\Http\Controllers;

use App\Imports\BkuImport;
use App\Imports\BkusImport;
use App\Models\AkunpajakModel;
use App\Models\BkuModel;
use App\Models\bkusModel;
use App\Models\Potongan2Model;
use App\Models\PotonganModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Psy\Command\WhereamiCommand;


class BkuController extends Controller
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
            'title'                => 'BKU Penerimaan',
            'active_sidepenerimaan'         => 'active',
            'active_bku'           => 'active',
            'page_title'           => 'Penatausahaan',
            'breadcumd1'           => 'Penerimaan',
            'breadcumd2'           => 'BKU',
            'userx'                => UserModel::where('id',$userId)->first(['fullname','role','gambar',]),
        );

        if ($request->ajax()) {

            $databku = DB::table('tb_transaksi')
                        ->select('tb_rekening.no_rekening', 'tb_rekening.rekening', 'tb_rekening.rekening2', 'tb_opd.nama_opd', 'tb_bank.nama_bank', 'tb_transaksi.uraian', 'tb_transaksi.ket', 'tb_transaksi.uraian', 'tb_transaksi.no_buku', 'tb_transaksi.tgl_transaksi', 'tb_transaksi.nilai_transaksi', 'tb_transaksi.id_transaksi', )
                        ->join('tb_opd', 'tb_opd.id', '=', 'tb_transaksi.id_opd')
                        ->join('tb_rekening', 'tb_rekening.id_rekening', '=', 'tb_transaksi.id_rekening')
                        ->join('tb_bank', 'tb_bank.id_bank', 'tb_transaksi.id_bank')
                        // ->where('pajakkpp.status2', ['Terima'])
                        // ->whereBetween('sp2d.tanggal_sp2d', ['2024-01-01', '2024-03-31'])
                        ->get();

            return Datatables::of($databku)
                    ->addIndexColumn()
                    // ->addColumn('action', function($row){
                    //     if($row->status2 == 'Terima')
                    //     {
                    //         $btn = '    <div class="btn-group dropright">
                    //                     <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    //                         <span>Aksi</span>
                    //                     </button>
                    //                     <div class="dropdown-menu">
                    //                         <a class="lihatbku dropdown-item" data-id="'.$row->id.'" href="javascript:void(0)">Lihat</a>
                    //                     </div>
                    //                 </div>
                    //             ';
                    //     }else{

                    //         $btn = '    <div class="btn-group dropright">
                    //                     <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    //                         <span>Aksi</span>
                    //                     </button>
                    //                     <div class="dropdown-menu">
                    //                         <a class="editbku1 dropdown-item" data-id="'.$row->id.'" href="javascript:void(0)">Ubah</a>
                    //                         <a class="deletebku dropdown-item" data-id="'.$row->id.'" href="javascript:void(0)">Hapus</a>
                    //                     </div>
                    //                 </div>
                    //             ';
                    //     }

                    //     return $btn;
                    // })
                    // ->addColumn('status1', function($row1){
                    //     $status = '';
                    //     if($row1->status1 == '1') {
                    //         $status = '<div class="badge bg-success">'.$row1->status1.'</div>';
                    //     }else {
                    //         $status = '<div class="badge bg-danger">'.$row1->status1.'</div>';
                    //     }
                    //     return $status;
                    // })
                    // ->addColumn('status2', function($row){
                    //     if($row->status2 == 'Tolak')
                    //     {
                    //         $btn1 = '
                                    
                    //               <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-ebilling="'.$row->ebilling.'" class="aktifbku btn btn-danger btn-sm">Tolak
                    //                 </a>
                    //               ';
                    //     }else {
                    //         $btn1 = '
                    //                 <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-ebilling="'.$row->ebilling.'" class="tolakbku btn btn-secondary btn-sm">Terima
                    //                 </a>
                    //               ';
                    //     }
                    //     return $btn1;
                    // })
                    ->addColumn('nilai_transaksi', function($row) {
                        return number_format($row->nilai_transaksi);
                    })
                    ->rawColumns(['nilai_transaksi'])
                    ->make(true);
        }

        return view('Penatausahaan.Bku.Tampilbku', $data);
    }

    public function store(Request $request)
    {
        request()->validate([
            'bukti_pemby' => 'image|mimes:png,jpg,jpeg,gif,svg|max:5000',
        ]);

        $nomoracak = Str::random(10);
        $bkuId = $request->id;
        $bkuId_potonganls = $request->id_potonganls;
        $bkuebilling = $request->id_potonganls;

        $cek_ebilling = bkusModel::where('ebilling', $request->ebilling)->where('id', '!=', $request->id)->first();
        $cek_ntppn = bkusModel::where('ntpn', $request->ntpn)->where('id', '!=', $request->id)->first();

        if($cek_ebilling)
        {
            return response()->json(['error'=>'Ebilling sudah ada']);
        }
        elseif($cek_ntppn)
        {
            return response()->json(['error'=>'NTPN sudah ada']);
        }
        else
        {

            // $detailspotongan = [
            //     'ebilling' => $request->ebilling,
            //     'jenis_pajak' => $request->jenis_pajak,
            //     'nilai_pajak' =>str_replace('.','', $request->nilai_pajak),
            //     // 'status1' => '1',
            //     // 'id_pajakkpp' => $nomoracak,
            // ];

            $detailspotongan2 = [
                'status1' => '1',
                'id_pajakkpp' => $request->id,
                'ebilling' => $request->ebilling,
                // 'jenis_pajak' => $request->jenis_pajak,
                // 'nilai_pajak' =>str_replace('.','', $request->nilai_pajak),
            ];

            $detailsbku = [
                'ebilling' => $request->ebilling, 
                'ntpn' => $request->ntpn, 
                'akun_pajak' => $request->akun_pajak,
                'jenis_pajak' => $request->jenis_pajak,
                'nilai_pajak' =>str_replace('.','', $request->nilai_pajak),
                'rek_belanja' => $request->rek_belanja,
                'nama_npwp' => $request->nama_npwp,
                'nomor_npwp' => $request->nomor_npwp,
                // 'bukti_pemby' => $request->bukti_pemby,
                'status2' => 'Terima',
                // 'id_potonganls' => $request->id_potonganls,
                // 'id_potonganls' => $request->id,
                'id_potonganls' => $request->id,
            ];

            if ($files = $request->file('bukti_pemby')){
                $destinationPath = 'app/assets/images/bukti_pemby_pajak/';
                $profileImage = date('YmdHis').".".$files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $detailsbku['bukti_pemby'] = "$profileImage";
            }
        }

        bkusModel::updateOrCreate(['id' => $bkuId], $detailsbku);
            // Potongan2Model::updateOrCreate(['id' => $bkuId], $detailspotongan2);
            // PotonganModel::updateOrCreate(['id' => $bkuId_potonganls], $detailspotongan);
            return response()->json(['success' =>'Data Berhasil Disimpan']);
        
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'bukti_pemby' => 'image|mimes:png,jpg,jpeg,gif,svg|max:5000',
        ]);

        $bku = bkusModel::where('id', $id)->first();

        $cek_ebilling = bkusModel::where('ebilling', $request->ebilling)->where('id', '!=', $request->id)->first();
        $cek_ntppn = bkusModel::where('ntpn', $request->ntpn)->where('id', '!=', $request->id)->first();

        if($cek_ebilling)
        {
            return response()->json(['error'=>'Ebilling sudah ada']);
        }
        elseif($cek_ntppn)
        {
            return response()->json(['error'=>'NTPN sudah ada']);
        }
        else
        {
            // BkuImport::where('ebilling',$request->get('ebilling'))
            //             ->update([
            //                 'status1' => '1',
            //                 'id_pajakkpp' => $request->id_potonganls,
            //                 'ebilling' => $request->ebilling,
            //             ]);

            $bku->update([
                'ebilling' => $request->ebilling, 
                'ntpn' => $request->ntpn, 
                'akun_pajak' => $request->akun_pajak,
                'jenis_pajak' => $request->jenis_pajak,
                'nilai_pajak' =>str_replace('.','', $request->nilai_pajak),
                'rek_belanja' => $request->rek_belanja,
                'nama_npwp' => $request->nama_npwp,
                'nomor_npwp' => $request->nomor_npwp,
                // 'bukti_pemby' => $request->bukti_pemby,
                'status2' => 'Terima',
                // 'id_potonganls' => $request->id_potonganls,
                // 'id_potonganls' => $request->id,
                'id_potonganls' => $request->id_potonganls,
            ]);

            if ($files = $request->file('bukti_pemby')){
                $destinationPath = 'app/assets/images/bukti_pemby_pajak/';
                $profileImage = date('YmdHis').".".$files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $bku['bukti_pemby'] = "$profileImage";
                
            }
        }
            $bku->save();
            // bkuModel::updateOrCreate(['id' => $bkuId], $detailsbku);
            // Potongan2Model::updateOrCreate(['id' => $bkuId], $detailspotongan2);
            // PotonganModel::updateOrCreate(['id' => $bkuId_potonganls], $detailspotongan);
            return response()->json(['success' =>'Data Berhasil Disimpan']);
        
    }

    public function edit($id)
    {

        $userId = Auth::guard('web')->user()->id;
        $data = array(
            'title'                => 'Data Pajak LS',
            'active_dtpajak'       => 'active',
            'active_bku'       => 'active',
            'page_title'           => 'Penatausahaan',
            'breadcumd1'           => 'Data Pajak',
            'breadcumd2'           => 'LS',
            'userx'                => UserModel::where('id',$userId)->first(['fullname','role','gambar',]),
            'dtbku'            => DB::table('pajakkpp')
                                    ->select('pajakkpp.ebilling', 'sp2d.tanggal_sp2d', 'pajakkpp.nilai_pajak', 'sp2d.nomor_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'tb_akun_pajak.akun_pajak', 'pajakkpp.ntpn', 'tb_jenis_pajak.jenis_pajak', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp', 'pajakkpp.id_potonganls', 'pajakkpp.id', 'potongan2.status1', 'pajakkpp.status2', 'pajakkpp.created_at', 'pajakkpp.bukti_pemby', 'sp2d.nilai_sp2d', 'pajakkpp.nilai_pajak', 'potongan2.id_pajakkpp')
                                    ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
                                    ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', '=', 'pajakkpp.jenis_pajak')
                                    ->join('potongan2',  'potongan2.id', 'pajakkpp.id_potonganls')
                                    ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
                                    // ->where('pajakkpp.status2', ['Terima'])
                                    // ->whereBetween('sp2d.tanggal_sp2d', ['2024-01-01', '2024-03-31'])
                                    ->where('pajakkpp.id', $id)
                                    ->get(),
        );
        // return response()->json($bku);
        return view('Penatausahaan.bku.Modal.Ubahdata',$data);
    }

    public function editbku($id)
    {
        $where = array('id' => $id);
        $bku = bkusModel::where($where)->first();

        return response()->json($bku);
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->store('public/import');
        $import = new BkusImport();
        $import->import($file);

        // dd($import->failures());
        if ($import->failures()->isNotEmpty())
        {
            return back()->withFailures($import->failures())->with('error', 'beberapa data sudah ada dan data belum ada akan disimpan ');
        }

        return redirect('/tampilbku')->with('success', 'Data Berhasil di import');
    }

    public function destroy($id)
    {
        $data = bkusModel::where('id',$id)->first(['bukti_pemby']);
        unlink("app/assets/images/bukti_pemby_pajak/".$data->bukti_pemby);

        bkusModel::where('id', $id)->delete();

        return response()->json(['success'=>'Data Berhasil Dihapus']);
    }
}
