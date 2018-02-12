<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;

class siswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = siswa::all();
        return view('siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
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
            $this->validate($request,['nama' => 'required|max:255','bio' => 'required|min:6']);
            $siswa = new siswa;
            $siswa->nama = $request->nama;
            $siswa->bio = $request->bio;

            $siswa->save();
            return redirect()->route('siswa.index');
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
        $siswa= siswa::findOrFail($id);
        return view('siswa.show',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa= siswa::findOrFail($id);
        return view('siswa.edit',compact('siswa'));
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
            'bio' => 'required|min:6'
        ]);

        // update data berdasarkan id
        $siswa = siswa::findOrFail($id);
        $siswa->nama = $request->nama;
        $siswa->bio = $request->bio;
        $siswa->save();
        return redirect()->route('siswa.index');
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
        $siswa = siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
}
