 @extends('layouts.master')

@section('content')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Dashboard</span>
    </li>
</ul>
<i class="icon-layers"></i>
        <span class="title">Page Layouts</span>
                <span class="title">Closed Sidebar Layout</span>
            </a>
        </li>
    </ul>
</li>
<hr>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <a href="#">
                <div class="number">
                    <h3 class="font-green-sharp">
                        <small class="font-green-sharp">Rp. </small>
                        <span data-counter="counterup" data-value="0">0</span>
                    </h3>
                    <small>Penggajian</small>
                </div>
                <div class="icon">
                    <i class="icon-pie-chart"></i>
                </div>
                </a>
            </div>
            <div class="progress-info">
                <div class="progress">
                   
                </div>
                <div class="status">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <a href="#">
                <div class="number">
                    <h3 class="font-red-sharp">
                        <small class="font-red-sharp"></small>
                        <span data-counter="counterup" data-value="0">0</span>
                    </h3>
                    <small>Jabatan</small>
                </div>
                <div class="icon">
                    <i class="icon-diamond"></i>
                </div>
                </a>
            </div>
            <div class="progress-info">
                <div class="progress">
                   
                </div>
                <div class="status">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <a href="{{ route('karyawan.index') }}">
                <div class="number">
                    <h3 class="font-purple-soft">
                        <span data-counter="counterup" data-value="0">0</span>
                    </h3>
                    <small>Karyawan</small>
                </div>
                <div class="icon">
                    <i class="icon-user"></i>
                </div>
                </a>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span style="" class="progress-bar progress-bar-success purple-soft">
                        <span class="sr-only"></span>
                    </span>
                </div>
                <div class="status">
                    <div class="status-title"></div>
                    <div class="status-number"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection