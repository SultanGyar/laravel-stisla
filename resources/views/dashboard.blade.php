@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/flag-icon-css/css/flag-icon.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data User</h4>
                            </div>
                            <div class="card-body">
                                {{ $userCount }}
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Peralatan</h4>
                            </div>
                            <div class="card-body">
                                {{ $peralatanCount }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Transaksi Perbaikan</h4>
                            </div>
                            <div class="card-body">
                                {{ $perbaikanCount }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Transaksi Perawatan</h4>
                            </div>
                            <div class="card-body">
                                {{ $penjadwalanCount }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Rangkuman</h4>
                                <div class="card-header-action">
                                    <a href="#summary-chart"
                                        data-tab="summary-tab"
                                        class="btn active">Chart</a>
                                    {{-- <a href="#summary-text"
                                        data-tab="summary-tab"
                                        class="btn">Text</a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="summary">
                                    <div class="summary-info"
                                        data-tab-group="summary-tab"
                                        id="summary-text">
                                        <h4>$1,858</h4>
                                        <div class="text-muted">Sold 4 items on 2 customers</div>
                                        <div class="d-block mt-2">
                                            <a href="#">View All</a>
                                        </div>
                                    </div>
                                    <div class="summary-chart active"
                                        data-tab-group="summary-tab"
                                        id="summary-chart">
                                        <canvas id="myChart"
                                            height="180"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Statistik</h4>
                                <div class="card-header-action">
                                    {{-- <a href="#"
                                        class="btn active">Week</a> --}}
                                    <a href="#"
                                        class="btn">April</a>
                                    {{-- <a href="#"
                                        class="btn">Year</a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart2"
                                    height="180"></canvas>
                                {{-- <div class="statistic-details mt-1">
                                    <div class="statistic-details-item">
                                        <div class="text-small text-muted"><span class="text-primary"><i
                                                    class="fas fa-caret-up"></i></span> 7%</div>
                                        <div class="detail-value">$243</div>
                                        <div class="detail-name">Today</div>
                                    </div>
                                    <div class="statistic-details-item">
                                        <div class="text-small text-muted"><span class="text-danger"><i
                                                    class="fas fa-caret-down"></i></span> 23%</div>
                                        <div class="detail-value">$2,902</div>
                                        <div class="detail-name">This Week</div>
                                    </div>
                                    <div class="statistic-details-item">
                                        <div class="text-small text-muted"><span class="text-primary"><i
                                                    class="fas fa-caret-up"></i></span>9%</div>
                                        <div class="detail-value">$12,821</div>
                                        <div class="detail-name">This Month</div>
                                    </div>
                                    <div class="statistic-details-item">
                                        <div class="text-small text-muted"><span class="text-primary"><i
                                                    class="fas fa-caret-up"></i></span> 19%</div>
                                        <div class="detail-value">$92,142</div>
                                        <div class="detail-name">This Year</div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        
                    </div>
                </div>
            </section>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
