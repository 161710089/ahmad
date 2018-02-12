<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wali;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data wali melalui model'wali'
        $wali = wali::all();
        return View('wali.index',compact('wali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('wali.create');
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
            $this->validate($request,[
                'nama' => 'required|max:255',
                'alamat' => 'required|min:6']);
            $wali = new wali;
            $wali->nama = $request->nama;
            $wali->alamat = $request->alamat;

            $wali->save();
             return redirect()->route('wali.index');
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
        $wali = wali::findOrFail($id);
        return view('wali.show',compact('wali'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wali = wali::findOrFail($id);
        return view('wali.edit',compact('wali'));
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
        $wali = wali::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->alamat = $request->alamat;
        $wali->save();
        return redirect()->route('wali.index');
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
        $wali = wali::findOrFail($id);
        $wali->delete();
        return redirect()->route('wali.index');
    }
}