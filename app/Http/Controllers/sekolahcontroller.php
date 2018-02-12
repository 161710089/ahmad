<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;

class sekolahcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolah = sekolah::all();
        return view('sekolah.index',compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $this->validate($request,['nama' => 'required|max:255','alamat' => 'required|min:6']);
            $sekolah = new sekolah;
            $sekolah->nama = $request->nama;
            $sekolah->alamat = $request->alamat;

            $sekolah->save();
            return redirect()->route('sekolah.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sekolah= sekolah::findOrFail($id);
        return view('sekolah.show',compact('sekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah= sekolah::findOrFail($id);
        return view('sekolah.edit',compact('sekolah'));
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
        // unique dihapus karena ketika update data title tidak diubah juga tidak apa-apa
        $this->validate($request,[
            'nama' => 'required|max:255',
            'alamat' => 'required|min:6'
        ]);

        // update data berdasarkan id
        $sekolah = sekolah::findOrFail($id);
        $sekolah->nama = $request->nama;
        $sekolah->alamat = $request->alamat;
        $sekolah->save();
        return redirect()->route('sekolah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete data beradasarkan id
        $sekolah = sekolah::findOrFail($id);
        $sekolah->delete();
        return redirect()->route('sekolah.index');
    }
}
