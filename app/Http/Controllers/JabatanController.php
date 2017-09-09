<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
use DB;
use Validator;
use Alert;

class JabatanController extends Controller
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
        //
        $jabatan = Jabatan::all();
        return view('jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $untukid = DB::table('jabatans')->first('id');
        $newkode = $untukid + 1;
        $digit = strlen($newkode);
        if ($digit == '1') {
            $kode = "J00".$newkode;
        }
        elseif ($digit == '2') {
            $kode = "J0".$newkode;
        }
        elseif ($digit == '3') {
            $kode = "J".$newkode;
        }

        

        return view('jabatan.create', compact('kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'Kode_jabatan' => 'required|max:255',
            'Nama_jabatan' => 'required',
            'Gaji_pokok' => 'required|numeric',
        ];

        $message = [
            'Kode_jabatan.required' => 'The Kode Jabatan is required',
            // 'Nama_jabatan.unique' => 'Nama Jabatan is already used find another Nama Jabatan',
            'Nama_jabatan.required' => 'The Nama Jabatan is required',
            'Gaji_pokok.numeric' => 'Besaran uang is number',
            'Gaji_pokok.required' => 'The Besaran Uang Jabatan is required',
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
        $jabatan->Gaji_pokok = $request->Gaji_pokok;
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
        $jabatan = Jabatan::find($id);
        return view('jabatan.show', compact('jabatan'));
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
        $jabatan = Jabatan::find($id);
        return view('jabatan.edit', compact('jabatan', 'kode'));
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
        $jabatan = Jabatan::find($id);

        $rules = [
            'Kode_jabatan' => 'required|max:255',
            'Nama_jabatan' => 'required',
            'Gaji_pokok' => 'required|numeric',
        ];

        $message = [
            'Kode_jabatan.required' => 'The Kode Jabatan is required',
            // 'Nama_jabatan.unique' => 'Nama Jabatan is already used find another Nama Jabatan',
            'Nama_jabatan.required' => 'The Nama Jabatan is required',
            'Gaji_pokok.numeric' => 'Besaran uang is number',
            'Gaji_pokok.required' => 'The Besaran Uang Jabatan is required',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails())
        {
            Alert::error('Sorry your data is invalid, Please try again!', 'Oops!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $jabatan->Kode_jabatan = $request['Kode_jabatan'];
        $jabatan->Nama_jabatan = $request['Nama_jabatan'];
        $jabatan->Gaji_pokok = $request['Gaji_pokok'];
        $jabatan->save();

        Alert::success('Data successfully saved','Good Job')->autoclose(1000);
        return redirect()->route('jabatan.index');
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
        Jabatan::find($id)->delete();
        return redirect()->route('jabatan.index')->with('Success!','Data Deleted Successfully');;
    }
}
