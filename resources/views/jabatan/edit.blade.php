@extends('layouts.master')

@section('content')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{ url('home') }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{ route('jabatan.index') }}">Jabatan</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Edit Data Jabatan</span>
    </li>
</ul>
<div class="portlet box purple">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-white-sunglo"></i>Form Jabatan </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="javascript:;" class="reload" onclick="myFunction()"> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        {!! Form::model($jabatan, ['method' => 'PATCH', 'route' => ['jabatan.update', $jabatan->id], 'class' => 'form-horizontal']) !!}
            <div class="form-body">
                <div class="form-group{{ $errors->has('Kode_jabatan') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Kode Jabatan</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-circle" value="{{ $jabatan->Kode_jabatan }}" name="Kode_jabatan" readonly="">
                        @if ($errors->has('Kode_jabatan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('Kode_jabatan') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('Nama_jabatan') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Jabatan</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-circle" placeholder="Enter Nama Jabatan" name="Nama_jabatan" value="{{ $jabatan->Nama_jabatan }}">
                        @if ($errors->has('Nama_jabatan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('Nama_jabatan') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('Gaji_pokok') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Besaran Uang</label>
                    <div class="col-md-4">
                        <input type="number" class="form-control input-circle" placeholder="Enter Besaran Uang" name="Gaji_pokok" value="{{ $jabatan->Gaji_pokok }}">
                        @if ($errors->has('Gaji_pokok'))
                            <span class="help-block">
                                <strong>{{ $errors->first('Gaji_pokok') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-circle green">Simpan</button>
                        <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        <!-- END FORM-->
    </div>
</div>
@endsection 	

@section('scripts')
    <script>
        function myFunction() {
            location.reload();
        }
    </script>
@endsection