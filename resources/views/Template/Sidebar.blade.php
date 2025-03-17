<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li @if(isset($active_home1)){{ $active_home1 }} @endif>
                <a class="dropdown-toggle" href="{{ url('/dashboard') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Pengaturan</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown @if(isset($active_sidemdata)){{ $active_sidemdata }} @endif">
                        <a href="javascript:void(0);">
                            <span>Master Data</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@if(isset($active_opd)){{ $active_opd }} @endif">
                                <a href="/tampilopd">Data OPD</a>
                            </li>
                            <li class="@if(isset($active_krek)){{ $active_krek }} @endif">
                                <a href="/tampilrekening">Data Rekening</a>
                            </li>
                            <li class="@if(isset($active_bank)){{ $active_bank }} @endif">
                                <a href="/tampilbank">Data Bank</a>
                            </li>
                            <li class="@if(isset($active_anggaran)){{ $active_anggaran }} @endif">
                                <a href="/tampilanggaran">Anggaran</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown @if(isset($active_side)){{ $active_side }} @endif">
                        <a href="javascript:void(0);">
                            <span>Kelola User</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@if(isset($active_kuser)){{ $active_kuser }} @endif">
                                <a href="{{ url('/tampiluser') }}">List User</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-build"></i>
                    </span>
                    <span class="title">Penatausahaan</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown @if(isset($active_sidepenerimaan)){{ $active_sidepenerimaan }} @endif">
                        <a href="javascript:void(0);">
                            <span>Penerimaan</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@if(isset($active_bku)){{ $active_bku }} @endif">
                                <a href="/tampilbku">BKU</a>
                            </li>
                            <li class="@if(isset($active_realisasi)){{ $active_realisasi }} @endif">
                                <a href="/tampilrealisasi">REALISASI</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-build"></i>
                    </span>
                    <span class="title">Laporan</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Penerimaan</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-e-commerce-order-list.html">Realisasi</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
    </div>
</div>