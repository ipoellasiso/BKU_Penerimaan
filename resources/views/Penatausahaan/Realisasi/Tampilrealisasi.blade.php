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
                                    <span> </span>
                                </div>
                                <div class="col-2 table-bordered" align="right">
                                    <span> {{ number_format($total_pendapatandaerah, 2) }}</span>
                                </div>
                                <div class="col-2 table-bordered" align="right">
                                    <span> </span>
                                </div>
                                <div class="col-1 table-bordered" align="right">
                                    <span> %</span>
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
                                            <span> </span>
                                        </div>
                                        <div class="col-2 table-bordered" align="right">
                                            <span> {{ number_format($total_pad, 2) }}</span>
                                        </div>
                                        <div class="col-2 table-bordered" align="right">
                                            <span> </span>
                                        </div>
                                        <div class="col-1 table-bordered" align="right">
                                            <span> %</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapsellpad1" class="collapse" data-parent="#pad1">
                                    <div class="" id="pad11">
                                        <div class="collapsed" data-toggle="collapse" href="#collapsellpad11">
                                            <div class="row">
                                                <div class="col-5 table-bordered">
                                                    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pajak Daerah</b>
                                                </div>
                                                <div class="col-2 table-bordered" align="right">
                                                    <span> </span>
                                                </div>
                                                <div class="col-2 table-bordered" align="right">
                                                    <span> {{ number_format($total_pd, 2) }}</span>
                                                </div>
                                                <div class="col-2 table-bordered" align="right">
                                                    <span> </span>
                                                </div>
                                                <div class="col-1 table-bordered" align="right">
                                                    <span> %</span>
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
                                                            <span> </span>
                                                        </div>
                                                        <div class="col-2 table-bordered" align="right">
                                                            <span> {{ number_format($total_pdbapenda, 2) }}</span>
                                                        </div>
                                                        <div class="col-2 table-bordered" align="right">
                                                            <span> </span>
                                                        </div>
                                                        <div class="col-1 table-bordered" align="right">
                                                            <span> %</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="collapsellpad111" class="collapse" data-parent="#pad111">
                                                    <div class="row">
                                                        <div class="col-5 table-bordered">
                                                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PBJT-Hotel</span>
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
                                                            <span>{{ number_format($total_pdhotel / $tanggaran_pdhotel * 100, 2) }} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5 table-bordered">
                                                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PBJT-Restoran</span>
                                                        </div>
                                                        <div class="col-2 table-bordered" align="right">
                                                            <span> </span>
                                                        </div>
                                                        <div class="col-2 table-bordered" align="right">
                                                            <span> {{ number_format($total_pdrestoran, 2) }}</span>
                                                        </div>
                                                        <div class="col-2 table-bordered" align="right">
                                                            <span> </span>
                                                        </div>
                                                        <div class="col-1 table-bordered" align="right">
                                                            <span> %</span>
                                                        </div>
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



@endsection