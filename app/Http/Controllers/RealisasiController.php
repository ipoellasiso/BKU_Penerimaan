<?php

namespace App\Http\Controllers;

use App\Models\AnggaranModel;
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

            // == ANGGARAN ==
            // == PAD ==
            // PAJAK
            'tanggaran_pendapatandaerah'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.ket4', '4')->sum('nilai'),
            'tanggaran_pad'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.ket1', '4.1')->sum('nilai') ,
            'tanggaran_pd'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.ket2', '4.1.01')->sum('nilai'),
            'tanggaran_pdbapenda'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Badan Pendapatan Daerah')->sum('nilai'),
            'tanggaran_pdhotel'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.19.03.0001')->sum('nilai'),
            'tanggaran_pdrestoran'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.19.01.0001')->sum('nilai'),
            'tanggaran_pdkaraoke'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.08.05.0001')->sum('nilai'),
            'tanggaran_pdpkb'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.01')->sum('nilai'),
            'tanggaran_pdbbnkp'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.02')->sum('nilai'),
            'tanggaran_pdreklame'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.09.01.0001')->sum('nilai'),
            'tanggaran_pdppj'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.10.02.0001')->sum('nilai'),
            'tanggaran_pdpat'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.12.01.0001')->sum('nilai'),
            'tanggaran_pdwalet'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.13.01.0001')->sum('nilai'),
            'tanggaran_pdlogam'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.14.37.0001')->sum('nilai'),
            'tanggaran_pdpbb'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.15.01.0001')->sum('nilai'),
            'tanggaran_pdbphtb'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.16.02.0001')->sum('nilai'),
            'tanggaran_pdparkir'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.19.04.0001')->sum('nilai'),

            // RETRIBUSI
            'tanggaran_rd'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.ket2', '4.1.02')->sum('nilai'),
            ('nilai'),
            'tanggaran_rddinkes'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Dinas Kesehatan')->sum('nilai'),
            'tanggaran_rddinkespkm'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.01.0001')->sum('nilai'),
            'tanggaran_rddlh'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Dinas Lingkungan Hidup')->sum('nilai'),
            'tanggaran_rddlhsampah'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.02.0001')->sum('nilai'),
            'tanggaran_rddlholahraga'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.02.0001')->sum('nilai'),
            'tanggaran_rdtr'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Dinas Penataan Ruang dan Pertahanan')->sum('nilai'),
            'tanggaran_rdtrimb'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.03.07.0001')->sum('nilai'),
            'tanggaran_rddispora'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Dinas Penataan Ruang dan Pertanahan')->sum('nilai'),
            'tanggaran_rddisporaolahraga'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.03.07.0002')->sum('nilai'),
            'tanggaran_rddishub'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Dinas Perhubungan')->sum('nilai'),
            'tanggaran_rddishubparkir'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.04.0001')->sum('nilai'),
            'tanggaran_rddishubpkb'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.01.0006')->sum('nilai'),
            'tanggaran_rddishubterminal'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.04.0003')->sum('nilai'),
            'tanggaran_rdpertanian'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Dinas Pertanian dan Ketahanan Pangan')->sum('nilai'),
            'tanggaran_rdpertanianpelelangan'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.03.0001')->sum('nilai'),
            'tanggaran_rdpertanianrph'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.07.0001')->sum('nilai'),
            'tanggaran_rdpertanianbt'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.11.0001')->sum('nilai'),
            'tanggaran_rdpertanianbi'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.11.0003')->sum('nilai'),
            'tanggaran_rdkoperasi'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Dinas Koperasi, UMKM dan Tenaga Kerja')->sum('nilai'),
            'tanggaran_rdkoperasialat'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.01.00072')->sum('nilai'),
            'tanggaran_rdkoperasipasar'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.12.0001')->sum('nilai'),
            'tanggaran_rdkoperasiimta'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.03.08.0001')->sum('nilai'),
            'tanggaran_rdperindag'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Dinas Perdagangan dan Perindustrian')->sum('nilai'),
            'tanggaran_rdperindagpasar'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.02.0001')->sum('nilai'),
            'tanggaran_rdpu'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_anggaran.id_opd')->where('tb_opd.nama_opd', 'Dinas Pekerjaan Umum')->sum('nilai'),
            'tanggaran_rdpukakus'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.09.0001')->sum('nilai'),
            'tanggaran_rdpulab'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.01.0004')->sum('nilai'),
            'tanggaran_rdpualat'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.01.0007')->sum('nilai'),

            // PENGELOLAAN KEKAYAAN DAERAH
            'tanggaran_hpkddividen'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.ket2', '4.1.03')->sum('nilai'),
            'tanggaran_hpkddividenbumn'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.03.01.01.0001')->sum('nilai'),

            // LLP
            'tanggaran_llp'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.ket2', '4.1.04')->sum('nilai'),
            'tanggaran_llpjskd'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.05.01.0001')->sum('nilai'),
            'tanggaran_llpjgkb'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.05.02.0001')->sum('nilai'),
            'tanggaran_llpgk'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.01.03.0005')->sum('nilai'),
            'tanggaran_llpabd'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.01.05.0118')->sum('nilai'),
            'tanggaran_llpbmd'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.03.01.0001')->sum('nilai'),
            'tanggaran_llppbpd'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.07.01.0001')->sum('nilai'),
            'tanggaran_llpdendaket'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.11.01.0001')->sum('nilai'),
            'tanggaran_llpdphotel'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.06.0001')->sum('nilai'),
            'tanggaran_llpdpres'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.07.0001')->sum('nilai'),
            'tanggaran_llpdpkaraoke'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.08.0005')->sum('nilai'),
            'tanggaran_llpdprek'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.09.0001')->sum('nilai'),
            'tanggaran_llpdpparkir'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.11.0001')->sum('nilai'),
            'tanggaran_llpdpabt'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.12.0001')->sum('nilai'),
            'tanggaran_llpdplogam'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.14.0037')->sum('nilai'),
            'tanggaran_llpdpbb'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.15.0001')->sum('nilai'),
            'tanggaran_llpdbphtb'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.16.0002')->sum('nilai'),
            'tanggaran_llpperjadin'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.15.04.0001')->sum('nilai'),
            'tanggaran_llpgaji'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.15.08.0013')->sum('nilai'),
            'tanggaran_llpbph'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.15.15.0012')->sum('nilai'),
            'tanggaran_llppihakke3'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.15.15.0040')->sum('nilai'),
            'tanggaran_llpblud'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.16.02.0001')->sum('nilai'),
            'tanggaran_llpbludhks'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.16.04.0001')->sum('nilai'),
            'tanggaran_llpbludjg'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.16.06.0001')->sum('nilai'),
            'tanggaran_llpdperwali'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.21.01.0001')->sum('nilai'),
            'tanggaran_llpllp'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.2.02.02.02.1111')->sum('nilai'),
            'tanggaran_llppengembalianp3'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.2.02.02.02.1112')->sum('nilai'),
            'tanggaran_llppengembalianhtp'    => AnggaranModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_anggaran.id_rekening')->where('tb_rekening.no_rekening', '4.2.02.02.02.1113')->sum('nilai'),


            // == REALISASI ==
            // == PAD ==
            // PAJAK
            'total_pendapatandaerah'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.ket4', '4')->sum('nilai_transaksi'),
            'total_pad'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.ket1', '4.1')->sum('nilai_transaksi'),
            'total_pd'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.ket2', '4.1.01')->sum('nilai_transaksi'),
            'total_pdbapenda'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Badan Pendapatan Daerah')->sum('nilai_transaksi'),
            'total_pdhotel'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.19.03.0001')->sum('nilai_transaksi'),
            'total_pdrestoran'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.19.01.0001')->sum('nilai_transaksi'),
            'total_pdkaraoke'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.08.05.0001')->sum('nilai_transaksi'),
            'total_pdpkb'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.01')->sum('nilai_transaksi'),
            'total_pdbbnkp'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.02')->sum('nilai_transaksi'),
            'total_pdreklame'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.09.01.0001')->sum('nilai_transaksi'),
            'total_pdppj'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.10.02.0001')->sum('nilai_transaksi'),
            'total_pdpat'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.12.01.0001')->sum('nilai_transaksi'),
            'total_pdwalet'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.13.01.0001')->sum('nilai_transaksi'),
            'total_pdlogam'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.14.37.0001')->sum('nilai_transaksi'),
            'total_pdpbb'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.15.01.0001')->sum('nilai_transaksi'),
            'total_pdbphtb'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.16.02.0001')->sum('nilai_transaksi'),
            'total_pdparkir'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.01.19.04.0001')->sum('nilai_transaksi'),

            // RETRIBUSI
            'total_rd'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02')->sum('nilai_transaksi'),
            'total_rddinkes'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Kesehatan')->sum('nilai_transaksi'),
            'total_rddinkespkm'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.01.0001')->sum('nilai_transaksi'),
            'total_rddlh'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Lingkungan Hidup')->sum('nilai_transaksi'),
            'total_rddlhsampah'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.02.0001')->sum('nilai_transaksi'),
            'total_rddlholahraga'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.02.0001')->sum('nilai_transaksi'),
            'total_rdtr'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Penataan Ruang dan Pertahanan')->sum('nilai_transaksi'),
            'total_rdtrimb'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.03.07.0001')->sum('nilai_transaksi'),
            'total_rddispora'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Penataan Ruang dan Pertanahan')->sum('nilai_transaksi'),
            'total_rddisporaolahraga'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.03.07.0002')->sum('nilai_transaksi'),
            'total_rddishub'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Perhubungan')->sum('nilai_transaksi'),
            'total_rddishubparkir'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.04.0001')->sum('nilai_transaksi'),
            'total_rddishubpkb'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.01.0006')->sum('nilai_transaksi'),
            'total_rddishubterminal'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.04.0003')->sum('nilai_transaksi'),
            'total_rdpertanian'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Pertanian dan Ketahanan Pangan')->sum('nilai_transaksi'),
            'total_rdpertanianpelelangan'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.03.0001')->sum('nilai_transaksi'),
            'total_rdpertanianrph'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.07.0001')->sum('nilai_transaksi'),
            'total_rdpertanianbt'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.11.0001')->sum('nilai_transaksi'),
            'total_rdpertanianbi'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.11.0003')->sum('nilai_transaksi'),
            'total_rdkoperasi'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Koperasi, UMKM dan Tenaga Kerja')->sum('nilai_transaksi'),
            'total_rdkoperasialat'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.01.00072')->sum('nilai_transaksi'),
            'total_rdkoperasipasar'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.12.0001')->sum('nilai_transaksi'),
            'total_rdkoperasiimta'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.03.08.0001')->sum('nilai_transaksi'),
            'total_rdperindag'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Perdagangan dan Perindustrian')->sum('nilai_transaksi'),
            'total_rdperindagpasar'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.02.0001')->sum('nilai_transaksi'),
            'total_rdpu'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->join('tb_opd', 'tb_opd.id', 'tb_transaksi.id_opd')->where('tb_opd.nama_opd', 'Dinas Pekerjaan Umum')->sum('nilai_transaksi'),
            'total_rdpukakus'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.01.09.0001')->sum('nilai_transaksi'),
            'total_rdpulab'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.01.0004')->sum('nilai_transaksi'),
            'total_rdpualat'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.02.02.01.0007')->sum('nilai_transaksi'),


            // PENGELOLAAN KEKAYAAN DAERAH
            'total_hpkddividen'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.03')->sum('nilai_transaksi'),
            'total_hpkddividenbumn'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.03.01.01.0001')->sum('nilai_transaksi'),

            // LLP
            'total_llp'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04')->sum('nilai_transaksi'),
            'total_llpjskd'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.05.01.0001')->sum('nilai_transaksi'),
            'total_llpjgkb'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.05.02.0001')->sum('nilai_transaksi'),
            'total_llpgk'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.01.03.0005')->sum('nilai_transaksi'),
            'total_llpabd'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.01.05.0118')->sum('nilai_transaksi'),
            'total_llpbmd'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.03.01.0001')->sum('nilai_transaksi'),
            'total_llppbpd'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.07.01.0001')->sum('nilai_transaksi'),
            'total_llpdendaket'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.11.01.0001')->sum('nilai_transaksi'),
            'total_llpdphotel'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.06.0001')->sum('nilai_transaksi'),
            'total_llpdpres'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.07.0001')->sum('nilai_transaksi'),
            'total_llpdpkaraoke'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.08.0005')->sum('nilai_transaksi'),
            'total_llpdprek'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.09.0001')->sum('nilai_transaksi'),
            'total_llpdpparkir'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.11.0001')->sum('nilai_transaksi'),
            'total_llpdpabt'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.12.0001')->sum('nilai_transaksi'),
            'total_llpdplogam'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.14.0037')->sum('nilai_transaksi'),
            'total_llpdpbb'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.15.0001')->sum('nilai_transaksi'),
            'total_llpdbphtb'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.12.16.0002')->sum('nilai_transaksi'),
            'total_llpperjadin'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.15.04.0001')->sum('nilai_transaksi'),
            'total_llpgaji'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.15.08.0013')->sum('nilai_transaksi'),
            'total_llpbph'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.15.15.0012')->sum('nilai_transaksi'),
            'total_llppihakke3'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.15.15.0040')->sum('nilai_transaksi'),
            'total_llpblud'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.16.02.0001')->sum('nilai_transaksi'),
            'total_llpbludhks'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.16.04.0001')->sum('nilai_transaksi'),
            'total_llpbludjg'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.16.06.0001')->sum('nilai_transaksi'),
            'total_llpdperwali'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.1.04.21.01.0001')->sum('nilai_transaksi'),
            'total_llpllp'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.2.02.02.02.1111')->sum('nilai_transaksi'),
            'total_llppengembalianp3'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.2.02.02.02.1112')->sum('nilai_transaksi'),
            'total_llppengembalianhtp'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.2.02.02.02.1113')->sum('nilai_transaksi'),

            // == Dana Transfer ==
            'total_pt'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.ket1', '4.2')->sum('nilai_transaksi'),
            'total_ptpd'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.ket2', '4.2.01')->sum('nilai_transaksi'),

            // DBH

            // DAU
            'total_ptdau'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.ket3', '4.2.01.08')->sum('nilai_transaksi'),
            'total_ptdaudau'    => bkusModel::join('tb_rekening', 'tb_rekening.id_rekening', 'tb_transaksi.id_rekening')->where('tb_rekening.no_rekening', '4.2.01.08.01.0001')->sum('nilai_transaksi'),

            // DAKFISIK

            // DAKNONFISIK


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
