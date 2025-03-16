@extends('Template.Layout')
@section('content')


    <div class="card">
        
        <div class="card-header">
            <h5 class="card-title">
                    <div class="row">
                        <div class="col-5" align="center">
                            <b>Uraian</b>
                        </div>
                        <div class="col-2" align="center">
                            <b>Anggaran</b>
                        </div>
                        <div class="col-2" align="center">
                            <b>Realisasi</b>
                        </div>
                        <div class="col-2" align="center">
                            <b>Sisa</b>
                        </div>
                        <div class="col-1" align="center">
                            <b>%</b>
                        </div>
                    </div>
            </h5>
        </div>
        
        <div class="" id="pad">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <div class="collapsed" data-toggle="collapse" href="#collapsellpad">
                            <div class="row">
                                <div class="col-5 table-bordered">
                                    <b>Pendapatan Daerah</b>
                                </div>
                                <div class="col-2 table-bordered" align="right">
                                    <span> {{ number_format($tanggaran_pendapatandaerah, 2) }}</span>
                                </div>
                                <div class="col-2 table-bordered" align="right">
                                    <span> {{ number_format($total_pendapatandaerah, 2) }}</span>
                                </div>
                                <div class="col-2 table-bordered" align="right">
                                    <span> {{ number_format($tanggaran_pendapatandaerah - $total_pendapatandaerah, 2) }}</span>
                                </div>
                                <div class="col-1 table-bordered" align="right">
                                    <span> {{ number_format($total_pendapatandaerah / $tanggaran_pendapatandaerah * 100, 2) }} %</span>
                                </div>
                            </div>
                        </div>
                        <div id="collapsellpad" class="collapse" data-parent="#pad">
                            <div class="" id="pad1">
                                <div class="collapsed" data-toggle="collapse" href="#collapsellpad1">
                                    <div class="row">
                                        <div class="col-5 table-bordered">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pendapatan Asli Daerah (PAD)</b>
                                        </div>
                                        <div class="col-2 table-bordered" align="right">
                                            <span> {{ number_format($tanggaran_pad, 2) }}</span>
                                        </div>
                                        <div class="col-2 table-bordered" align="right">
                                            <span> {{ number_format($total_pad, 2) }}</span>
                                        </div>
                                        <div class="col-2 table-bordered" align="right">
                                            <span> {{ number_format($tanggaran_pad - $total_pad, 2) }}</span>
                                        </div>
                                        <div class="col-1 table-bordered" align="right">
                                            <span> {{ number_format($total_pad / $tanggaran_pad * 100, 2) }} %</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Pajak Daerah --}}
                            <div id="collapsellpad1" class="collapse" data-parent="#pad1">
                                <div class="" id="pad11">
                                    <div class="collapsed" data-toggle="collapse" href="#collapsellpad11">
                                        <div class="row">
                                            <div class="col-5 table-bordered">
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pajak Daerah</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($tanggaran_pd, 2) }}</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($total_pd, 2) }}</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($tanggaran_pd - $total_pd, 2) }}</span>
                                            </div>
                                            <div class="col-1 table-bordered" align="right">
                                                <span> {{ number_format($total_pd / $tanggaran_pd * 100, 2) }} %</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapsellpad11" class="collapse" data-parent="#pad11">
                                        <div class="" id="pad111">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad111">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Badan Pendapatan Daerah</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdbapenda, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdbapenda, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdbapenda - $total_pdbapenda, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdbapenda / $tanggaran_pdbapenda * 100, 2) }} %</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad111" class="collapse" data-parent="#pad111">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pajak Kendaraan Bermotor (PKB)</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdpkb - $total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdpkb > 0 && $tanggaran_pdpkb > 0)
                                                            <span>{{ number_format($total_pdpkb / $tanggaran_pdpkb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bea Balik Nama Kendaraan Bermotor (BBNKB)</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdbbnkp, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdbbnkp, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdbbnkp - $total_pdbbnkp, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdbbnkp > 0 && $tanggaran_pdbbnkp > 0)
                                                            <span>{{ number_format($total_pdbbnkp / $tanggaran_pdbbnkp * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pajak Reklame</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdreklame, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdreklame, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdreklame - $total_pdreklame, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdreklame > 0 && $tanggaran_pdreklame > 0)
                                                            <span>{{ number_format($total_pdreklame / $tanggaran_pdreklame * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pajak Penerangan Jalan</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdppj, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdppj, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdppj - $total_pdppj, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdppj > 0 && $tanggaran_pdppj > 0)
                                                            <span>{{ number_format($total_pdppj / $tanggaran_pdppj * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pajak Air Tanah</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdpat, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdpat, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdpat - $total_pdpat, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdpat > 0 && $tanggaran_pdpat > 0)
                                                            <span>{{ number_format($total_pdpat / $tanggaran_pdpat * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pajak Sarang Burung Walet</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdwalet, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdwalet, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdwalet - $total_pdwalet, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdwalet > 0 && $tanggaran_pdwalet > 0)
                                                            <span>{{ number_format($total_pdwalet / $tanggaran_pdwalet * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pajak Mineral Bukan Logam dan Batuan</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdlogam, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdlogam, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdlogam - $total_pdlogam, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdlogam > 0 && $tanggaran_pdlogam > 0)
                                                            <span>{{ number_format($total_pdlogam / $tanggaran_pdlogam * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pajak Bumi dan Bangunan Perdesaan dan Perkotaan (PBBP2)</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdpbb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdpbb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdpbb - $total_pdpbb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdpbb > 0 && $tanggaran_pdpbb > 0)
                                                            <span>{{ number_format($total_pdpbb / $tanggaran_pdpbb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bea Perolehan Hak Atas Tanah dan Bangunan (BPHTB)</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdbphtb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdbphtb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdbphtb - $total_pdbphtb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdbphtb > 0 && $tanggaran_pdbphtb > 0)
                                                            <span>{{ number_format($total_pdbphtb / $tanggaran_pdbphtb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PBJT-Restoran</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdrestoran, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdrestoran, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdrestoran - $total_pdrestoran, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdrestoran > 0 && $tanggaran_pdrestoran > 0)
                                                            <span>{{ number_format($total_pdrestoran / $tanggaran_pdrestoran * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PBJT-Hotel</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdhotel, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdhotel, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdhotel - $total_pdhotel, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdhotel > 0 && $tanggaran_pdhotel > 0)
                                                            <span>{{ number_format($total_pdhotel / $tanggaran_pdhotel * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PBJT-Penyediaan atau Penyelenggaraan Tempat Parkir</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdparkir, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdparkir, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdparkir - $total_pdparkir, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdparkir > 0 && $tanggaran_pdparkir > 0)
                                                            <span>{{ number_format($total_pdparkir / $tanggaran_pdparkir * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PBJT-Distkotek, Karaoke, Kelab Malam, Bar, dan Mandi Uap/Spa</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdkaraoke, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdkaraoke, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdkaraoke - $total_pdkaraoke, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdkaraoke > 0 && $tanggaran_pdkaraoke > 0)
                                                            <span>{{ number_format($total_pdkaraoke / $tanggaran_pdkaraoke * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Retribusi Daerah --}}
                            <div id="collapsellpad1" class="collapse" data-parent="#pad1">
                                <div class="" id="pad21">
                                    <div class="collapsed" data-toggle="collapse" href="#collapsellpad21">
                                        <div class="row">
                                            <div class="col-5 table-bordered">
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Daerah</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($tanggaran_rd, 2) }}</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($total_rd, 2) }}</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($tanggaran_rd - $total_rd, 2) }}</span>
                                            </div>
                                            <div class="col-1 table-bordered" align="right">
                                                @if ($total_rd > 0 && $tanggaran_rd > 0)
                                                    <span> {{ number_format($total_rd / $tanggaran_rd * 100, 2) }} %</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapsellpad21" class="collapse" data-parent="#pad21">
                                        <div class="" id="pad121">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad121">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas Kesehatan</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddinkes, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddinkes, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddinkes - $total_rddinkes, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddinkes > 0 && $tanggaran_rddinkes > 0)
                                                            <span> {{ number_format($total_rddinkes / $tanggaran_rddinkes * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad121" class="collapse" data-parent="#pad121">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pelayanan Kesehatan di Puskesmas</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddinkespkm, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddinkespkm, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rddinkespkm - $total_rddinkespkm, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddinkespkm > 0 && $tanggaran_rddinkespkm > 0)
                                                            <span>{{ number_format($total_rddinkespkm / $tanggaran_rddinkespkm * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="pad122">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad122">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas Lingkungan Hidup</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddlh, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddlh, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddlh - $total_rddlh, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddlh > 0 && $tanggaran_rddlh > 0)
                                                            <span> {{ number_format($total_rddlh / $tanggaran_rddlh * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad122" class="collapse" data-parent="#pad122">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pelayanan Persampahan/ Kebersihan</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddlhsampah, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddlhsampah, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rddlhsampah - $total_rddlhsampah, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddlhsampah > 0 && $tanggaran_rddlhsampah > 0)
                                                            <span>{{ number_format($total_rddlhsampah / $tanggaran_rddlhsampah * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pelayanan Tempat Rekreasi dan Olahraga</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddlholahraga, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddlholahraga, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rddlholahraga - $total_rddlholahraga, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddlholahraga > 0 && $tanggaran_rddlholahraga > 0)
                                                            <span>{{ number_format($total_rddlholahraga / $tanggaran_rddlholahraga * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="pad123">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad123">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas Penataan Ruang dan Pertanahan</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdtr, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdtr, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdtr - $total_rdtr, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdtr > 0 && $tanggaran_rdtr > 0)
                                                            <span> {{ number_format($total_rdtr / $tanggaran_rdtr * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad123" class="collapse" data-parent="#pad123">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Persetujuan Bangunan Gedung</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdtrimb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdtrimb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdtrimb - $total_rdtrimb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdtrimb > 0 && $tanggaran_rdtrimb > 0)
                                                            <span>{{ number_format($total_rdtrimb / $tanggaran_rdtrimb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="pad124">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad124">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas Pemuda dan Olahraga</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddispora, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddispora, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddispora - $total_rddispora, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddispora > 0 && $tanggaran_rddispora > 0)
                                                            <span> {{ number_format($total_rddispora / $tanggaran_rddispora * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad124" class="collapse" data-parent="#pad124">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pelayanan Tempat Rekreasi dan Olahraga</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddisporaolahraga, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddisporaolahraga, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rddisporaolahraga - $total_rddisporaolahraga, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddisporaolahraga > 0 && $tanggaran_rddisporaolahraga > 0)
                                                            <span>{{ number_format($total_rddisporaolahraga / $tanggaran_rddisporaolahraga * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="pad125">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad125">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas Perhubungan</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddishub, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddishub, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddishub - $total_rddishub, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddishub > 0 && $tanggaran_rddishub > 0)
                                                            <span> {{ number_format($total_rddishub / $tanggaran_rddishub * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad125" class="collapse" data-parent="#pad125">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Penyediaan Pelayanan Parkir di Tepi Jalan Umum</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddishubparkir, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddishubparkir, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rddishubparkir - $total_rddishubparkir, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddishubparkir > 0 && $tanggaran_rddishubparkir > 0)
                                                            <span>{{ number_format($total_rddishubparkir / $tanggaran_rddishubparkir * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pemakaian Kendaraan Bermotor</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddishubpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddishubpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rddishubpkb - $total_rddishubpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddishubpkb > 0 && $tanggaran_rddishubpkb > 0)
                                                            <span>{{ number_format($total_rddishubpkb / $tanggaran_rddishubpkb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pelayanan Penyediaan Fasilitas Lainnya di Lingkungan Terminal</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rddishubterminal, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rddishubterminal, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rddishubterminal - $total_rddishubterminal, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rddishubterminal > 0 && $tanggaran_rddishubterminal > 0)
                                                            <span>{{ number_format($total_rddishubterminal / $tanggaran_rddishubterminal * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="pad126">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad126">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas Pertanian dan Ketahanan Pangan</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpertanian, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdpertanian, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpertanian - $total_rdpertanian, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdpertanian > 0 && $tanggaran_rdpertanian > 0)
                                                            <span> {{ number_format($total_rdpertanian / $tanggaran_rdpertanian * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad126" class="collapse" data-parent="#pad126">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Penyediaan Tempat Pelelangan</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpertanianpelelangan, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdpertanianpelelangan, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdpertanianpelelangan - $total_rdpertanianpelelangan, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdpertanianpelelangan > 0 && $tanggaran_rdpertanianpelelangan > 0)
                                                            <span>{{ number_format($total_rdpertanianpelelangan / $tanggaran_rdpertanianpelelangan * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pelayanan Rumah Potong Hewan</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpertanianrph, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdpertanianrph, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdpertanianrph - $total_rdpertanianrph, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdpertanianrph > 0 && $tanggaran_rdpertanianrph > 0)
                                                            <span>{{ number_format($total_rdpertanianrph / $tanggaran_rdpertanianrph * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Penjualan Produksi Hasil Usaha Daerah berupa Bibit atau Benih Tanaman</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpertanianbt, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdpertanianbt, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdpertanianbt - $total_rdpertanianbt, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdpertanianbt > 0 && $tanggaran_rdpertanianbt > 0)
                                                            <span>{{ number_format($total_rdpertanianbt / $tanggaran_rdpertanianbt * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Penjualan Produksi hasil Usaha Daerah berupa Bibit atau Benih Ikan</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpertanianbi, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdpertanianbi, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdpertanianbi - $total_rdpertanianbi, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdpertanianbi > 0 && $tanggaran_rdpertanianbi > 0)
                                                            <span>{{ number_format($total_rdpertanianbi / $tanggaran_rdpertanianbi * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="pad127">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad127">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas Koperasi, UMKM dan Tenaga Kerja</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdkoperasi, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdkoperasi, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdkoperasi - $total_rdkoperasi, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdkoperasi > 0 && $tanggaran_rdkoperasi > 0)
                                                            <span> {{ number_format($total_rdkoperasi / $tanggaran_rdkoperasi * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad127" class="collapse" data-parent="#pad127">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pemakaian Alat</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdkoperasialat, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdkoperasialat, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdkoperasialat - $total_rdkoperasialat, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdkoperasialat > 0 && $tanggaran_rdkoperasialat > 0)
                                                            <span>{{ number_format($total_rdkoperasialat / $tanggaran_rdkoperasialat * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Penyediaan Tempat Kegiatan Usaha berupa Pasar, Grosir,</i><br>
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pertokoan, dan Tempat Kegiatan Usaha Lainnya</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdkoperasipasar, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdkoperasipasar, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdkoperasipasar - $total_rdkoperasipasar, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdkoperasipasar > 0 && $tanggaran_rdkoperasipasar > 0)
                                                            <span>{{ number_format($total_rdkoperasipasar / $tanggaran_rdkoperasipasar * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Penggunaan Tenaga Kerja Asing (TKA)</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdkoperasiimta, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdkoperasiimta, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdkoperasiimta - $total_rdkoperasiimta, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdkoperasiimta > 0 && $tanggaran_rdkoperasiimta > 0)
                                                            <span>{{ number_format($total_rdkoperasiimta / $tanggaran_rdkoperasiimta * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="pad128">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad128">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas Perdagangan dan Perindustrian</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdperindag, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdperindag, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdperindag - $total_rdperindag, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdperindag > 0 && $tanggaran_rdperindag > 0)
                                                            <span> {{ number_format($total_rdperindag / $tanggaran_rdperindag * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad128" class="collapse" data-parent="#pad128">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Penyediaan Fasilitas Pasar Grosir</i><br>
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Berbagai Jenis Barang yang Dikontrakkan</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdperindagpasar, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdperindagpasar, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdperindagpasar - $total_rdperindagpasar, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdperindagpasar > 0 && $tanggaran_rdperindagpasar > 0)
                                                            <span>{{ number_format($total_rdperindagpasar / $tanggaran_rdperindagpasar * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="pad129">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad129">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas Pekerjaan Umum</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpu, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdpu, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpu - $total_rdpu, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdpu > 0 && $tanggaran_rdpu > 0)
                                                            <span> {{ number_format($total_rdpu / $tanggaran_rdpu * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad129" class="collapse" data-parent="#pad129">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Penyediaan dan/atau Penyedotan Kakus</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpukakus, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdpukakus, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdpukakus - $total_rdpukakus, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdpukakus > 0 && $tanggaran_rdpukakus > 0)
                                                            <span>{{ number_format($total_rdpukakus / $tanggaran_rdpukakus * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pemakaian Laboratorium</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpulab, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdpulab, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdpulab - $total_rdpulab, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdpulab > 0 && $tanggaran_rdpulab > 0)
                                                            <span>{{ number_format($total_rdpulab / $tanggaran_rdpulab * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Retribusi Pemakaian Alat</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_rdpualat, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_rdpualat, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_rdpualat - $total_rdpualat, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_rdpualat > 0 && $tanggaran_rdpualat > 0)
                                                            <span>{{ number_format($total_rdpualat / $tanggaran_rdpualat * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Hasil Pengelolaan Kekayaan Daerah  --}}
                            <div id="collapsellpad1" class="collapse" data-parent="#pad1">
                                <div class="" id="pad31">
                                    <div class="collapsed" data-toggle="collapse" href="#collapsellpad31">
                                        <div class="row">
                                            <div class="col-5 table-bordered">
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($tanggaran_pd, 2) }}</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($total_pd, 2) }}</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($tanggaran_pd - $total_pd, 2) }}</span>
                                            </div>
                                            <div class="col-1 table-bordered" align="right">
                                                <span> {{ number_format($total_pd / $tanggaran_pd * 100, 2) }} %</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapsellpad31" class="collapse" data-parent="#pad31">
                                        <div class="" id="pad131">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad131">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Badan Pengelolaan Keuangan dan Aset Daerah</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdbapenda, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdbapenda, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdbapenda - $total_pdbapenda, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdbapenda / $tanggaran_pdbapenda * 100, 2) }} %</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad131" class="collapse" data-parent="#pad131">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bagian Laba yang Dibagikan kepada Pemerintah Daerah</i><br>
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Dividen) atas Penyertaan Modal pada BUMN</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdpkb - $total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdpkb > 0 && $tanggaran_pdpkb > 0)
                                                            <span>{{ number_format($total_pdpkb / $tanggaran_pdpkb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             {{-- LLP  --}}
                             <div id="collapsellpad1" class="collapse" data-parent="#pad1">
                                <div class="" id="pad41">
                                    <div class="collapsed" data-toggle="collapse" href="#collapsellpad41">
                                        <div class="row">
                                            <div class="col-5 table-bordered">
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lain-lain PAD yang Sah </span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($tanggaran_pd, 2) }}</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($total_pd, 2) }}</span>
                                            </div>
                                            <div class="col-2 table-bordered" align="right">
                                                <span> {{ number_format($tanggaran_pd - $total_pd, 2) }}</span>
                                            </div>
                                            <div class="col-1 table-bordered" align="right">
                                                <span> {{ number_format($total_pd / $tanggaran_pd * 100, 2) }} %</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapsellpad41" class="collapse" data-parent="#pad41">
                                        <div class="" id="pad141">
                                            <div class="collapsed" data-toggle="collapse" href="#collapsellpad141">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Badan Pengelolaan Keuangan dan Aset Daerah</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdbapenda, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdbapenda, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdbapenda - $total_pdbapenda, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdbapenda / $tanggaran_pdbapenda * 100, 2) }} %</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapsellpad141" class="collapse" data-parent="#pad141">
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hasil Penjualan Bangunan Gedung-Bangunan Gedung</i><br>
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat Kerja-Bangunan Gedung Kantor</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdpkb - $total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdpkb > 0 && $tanggaran_pdpkb > 0)
                                                            <span>{{ number_format($total_pdpkb / $tanggaran_pdpkb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hasil Penjualan Konstruksi Dalam Pengerjaan Peralatan dan</i><br>
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mesin-Alat Besar-Alat Besar Darat-Alat Besar Darat Lainnya</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdpkb - $total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdpkb > 0 && $tanggaran_pdpkb > 0)
                                                            <span>{{ number_format($total_pdpkb / $tanggaran_pdpkb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hasil Sewa BMD</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdpkb - $total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdpkb > 0 && $tanggaran_pdpkb > 0)
                                                            <span>{{ number_format($total_pdpkb / $tanggaran_pdpkb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jasa Giro pada Kas Daerah</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdpkb - $total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdpkb > 0 && $tanggaran_pdpkb > 0)
                                                            <span>{{ number_format($total_pdpkb / $tanggaran_pdpkb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 table-bordered">
                                                        <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jasa Giro pada Kas di Bendahara</i>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($tanggaran_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span> {{ number_format($total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-2 table-bordered" align="right">
                                                        <span>{{ number_format($tanggaran_pdpkb - $total_pdpkb, 2) }}</span>
                                                    </div>
                                                    <div class="col-1 table-bordered" align="right">
                                                        @if ($total_pdpkb > 0 && $tanggaran_pdpkb > 0)
                                                            <span>{{ number_format($total_pdpkb / $tanggaran_pdpkb * 100, 2) }} %</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </h5>
                </div>
            </div>
        </div>

    </div>

    @include('Penatausahaan.Realisasi.Fungsi.Fungsi')


@endsection