@extends('Template.Layout')
@section('content')


{{-- <div class="card"> --}}

    <div class="tab-content m-t-15" id="myTabContentJustified">
        <div class="tab-pane fade show active" id="pajakls" role="tabpanel" aria-labelledby="home-tab-justified">
            
            <div class="card">
                <div class="card-body">

                    @if (session()->has('failures'))
                        <table class="table table-warning">
                            <tr>
                                <th>Baris</th>
                                <th>Nomor Buku Sudah Ada</th>
                                <th>Error</th>
                                <th>Value</th>
                            </tr>
                            @foreach (session()->get('failures') as $validasi)
                                <tr>
                                    <td>{{ $validasi->row() }}</td>
                                    <td>{{ $validasi->attribute() }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($validasi->errors() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $validasi->values()[$validasi->attribute()] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif

                    

                    <div class="d-flex flex-row">
                        {{-- <h4 class="card-title">{{ $title }}</h4> --}}
                        <!-- <a class="btn btn-secondary btn-tone m-r-5 btn-xs ml-auto" href="javascript:void(0)" id="createPajakls" data-toggle="tooltip" data-placement="top" title="Tambah Data"> -->
                            <!-- <i class="fas fa-pencil-alt"></i> -->
                        
                        
                            <button class="btn btn-secondary btn-tone m-r-5 btn-xs ml-auto">
                                <a href="javascript:void(0)" id="createimportbku" data-toggle="tooltip" data-placement="top" title="Upload"> Upload </a>
                            </button>
                            {{-- <div class="dropdown-menu"> --}}
                                {{-- <a class="dropdown-item" href="javascript:void(0)" id="createPajakls" data-toggle="tooltip" data-placement="top" title="klik"> Tambah </a> --}}
                                {{-- <a class="dropdown-item" href="javascript:void(0)" id="uploadPajakls" data-toggle="tooltip" data-placement="top" title="klik"> Upload </a> --}}
                            {{-- </div> --}}
                        <!-- </a> -->
                    </div>
                    {{-- class="m-t-25" --}}
                    <div class="m-t-25 table-responsive">
                        <table id="data-table" class="tabelbku table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nomor Rekening</th>
                                    <th>Rekening</th>
                                    <th>Nomor Bukti</th>
                                    <th>Tanggal</th>
                                    <th>Uraian</th>
                                    <th>Opd</th>
                                    <th>Bank</th>
                                    <th>Jumlah</th>
                                    <th>Ket</th>
                                    {{-- <th class="text-center" width="100px">Action</th> --}}
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Januari</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_jan) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"> Rp. {{ number_format($total_jan_mandiri) }} </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_jan_bpd) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_jan_btn) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Februari</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_feb) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"> Rp. {{ number_format($total_feb_mandiri) }} </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_feb_bpd) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_feb_btn) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Maret</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_mar) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_mar_mandiri) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_mar_bpd) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_mar_btn) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">April</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_apr) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_apr_mandiri) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_apr_bpd) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_apr_btn) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mei</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_mei) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_mei_mandiri) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_mei_bpd) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0">Rp. {{ number_format($total_mei_btn) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Juni</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Juli</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Agustus</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">September</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Oktober</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">November</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Desember</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">Mandiri</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BPD</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="m-b-0">BTN</p>
                                            <div id="total_pajak"></div>
                                    </div>
                                    <div>
                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}


{{-- @include('Penatausahaan.Bku.Modal.Tolak') --}}
{{-- @include('Penatausahaan.Bku.Modal.Terima') --}}
@include('Penatausahaan.Bku.Modal.import')
@include('Penatausahaan.Bku.Fungsi.Fungsi2')
{{-- @include('Penatausahaan.Bku.Modal.Tambah') --}}
@include('Penatausahaan.Bku.Fungsi.Fungsi')


@endsection