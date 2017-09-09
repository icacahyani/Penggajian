<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
use App\Karyawan;
use DB;
use Validator;
use Alert;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $karyawan = Karyawan::all();
        $jabatan = Jabatan::all();
        return view('karyawan.index', compact('karyawan', 'jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $untukid = DB::table('karyawan')->first('id');
        $newkode = $untukid + 1;
        $digit = strlen($newkode);
        if ($digit == '1') {
            $kode = "KR00".$newkode;
        }
        elseif ($digit == '2') {
            $kode = "KR0".$newkode;
        }
        elseif ($digit == '3') {
            $kode = "KR".$newkode;
        }
        return view('karyawan.create', compact('kode', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'Kode_karyawan' => 'required|max:255',
            'Nama_karyawan' => 'required',
            'Alamat' => 'required',
            'JK' => 'required',
            'No_hp' => 'required|numeric',
            'Tgl_lahir' => 'required',
            'Tpt_lahir' => 'required',
        ];

        $message = [
            'Kode_jabatan.required' => 'The Kode Jabatan is required',
            'Nama_jabatan.required' => 'The Nama Jabatan is required',
            'Alamat.required' => 'The Alamat is required',
            'Tpt_lahir.required' => 'The Tempat Lahir is required',
            'Tgl_lahir.required' => 'The Tanggal Lahir is required',
            'JK.required' => 'The Nama Jabatan is required',
            'No_hp.numeric' => 'Nomor Telepon is number',
            'No_hp.required' => 'The Nomor Telepon Jabatan is required',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails())
        {
            Alert::error('Sorry your data is invalid, Please try again!', 'Oops!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $jabatan = new Jabatan;
        $jabatan->Kode_jabatan = $request->Kode_jabatan;
        $jabatan->Nama_jabatan = $request->Nama_jabatan;
        $jabatan->jabatan_id = $request->jabatan_id;
        $jabatan->Alamat = $request->Alamat;
        $jabatan->JK = $request->JK;
        $jabatan->Tpt_lahir = $request->Tpt_lahir;
        $jabatan->Tgl_lahir = $request->Tgl_lahir;
        $jabatan->save();

        Alert::success('Data successfully saved','Good Job')->autoclose(1000);
        return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
