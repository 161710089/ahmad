<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kepsek;
class kepsekcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepsek = kepsek::all();
        return view('kepsek.index',compact('kepsek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kepsek.create');
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
            $this->validate($request,['nama' => 'required|max:255','nama_sekolah' => 'required|min:6']);
            $kepsek = new kepsek;
            $kepsek->nama = $request->nama;
            $kepsek->nama_sekolah = $request->nama_sekolah;

            $kepsek->save();
            return redirect()->route('kepsek.index');
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
        $kepsek= kepsek::findOrFail($id);
        return view('kepsek.show',compact('kepsek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kepsek= kepsek::findOrFail($id);
        return view('kepsek.edit',compact('kepsek'));
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
            'nama_sekolah' => 'required|min:6'
        ]);

        // update data berdasarkan id
        $kepsek = kepsek::findOrFail($id);
        $kepsek->nama = $request->nama;
        $kepsek->nama_sekolah = $request->nama_sekolah;
        $kepsek->save();
        return redirect()->route('kepsek.index');
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
        $kepsek = kepsek::findOrFail($id);
        $kepsek->delete();
        return redirect()->route('kepsek.index');
    }
}
