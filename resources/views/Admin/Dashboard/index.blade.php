@extends('layouts.appAdmin')

@section('title', 'KELMAS - Dashboard')

@section('css')
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
@endsection
    
@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Petugas</h4>
                        </div>
                        <div class="card-body">
                            {{ $petugas }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Masyarakat</h4>
                        </div>
                        <div class="card-body">
                            {{ $masyarakat }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pengaduan Proses</h4>
                        </div>
                        <div class="card-body">
                            {{ $proses }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pengaduan Selesai</h4>
                        </div>
                        <div class="card-body">
                            {{ $selesai }}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        {{-- <div class="card">
            <div class="card-header">
                <h4>Statistics</h4>
                <div class="card-header-action">
                    <a href="#" class="btn active">Week</a>
                    <a href="#" class="btn">Month</a>
                    <a href="#" class="btn">Year</a>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor"
                    style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                </div>
                <canvas id="myChart2" height="382" width="637" style="display: block; width: 637px; height: 382px;"
                    class="chartjs-render-monitor"></canvas>
                <div class="statistic-details mt-1">
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
                </div>
            </div>
        </div> --}}

    </div>
    
@endsection