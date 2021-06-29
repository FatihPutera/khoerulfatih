<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('tbl_siswas')->get();

        return view('siswa.index', compact('data'));
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
        $cek = DB::table('tbl_siswas')->get();
        $nis = $request->nis;
        foreach ($cek as $siswa):
            if ($siswa->nis == $nis) {
                return view('siswa.create');
            }
        endforeach;
        DB::table('tbl_siswas')->insert([
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'tgl_lahir'=>$request->tgl_lahir,
            'kelamin'=>$request->kelamin
        ]);
        return redirect('siswa');
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
        $data = DB::table('tbl_siswas')->where('nis', $id)->first();
        return view('siswa.edit', compact('data'));
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
        $cek = DB::table('tbl_siswas')->get();
        $nis = $request->nis;
        foreach ($cek as $siswa):
            if ($siswa->nis == $nis) {
                return redirect('siswa');
            }
        endforeach;
        DB::table('tbl_siswas')->where('nis', $id)->update([
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'tgl_lahir'=>$request->tgl_lahir,
            'kelamin'=>$request->kelamin
        ]);
        return redirect('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_siswas')->where('nis', $id)->delete();
        return redirect('siswa');
    }

    public function tampil()
    {
        $data = DB::table('tbl_siswas')
            ->leftjoin('tbl_pinjams', 'tbl_pinjams.nis', 'tbl_siswas.nis')
            ->select('tbl_siswas.nis', 'tbl_siswas.nama', DB::raw('COUNT(DISTINCT tbl_pinjams.id_buku) as total'))
            ->groupBy('tbl_siswas.nama')
            ->orderBy('total', 'desc')
            ->get();
        return view('siswa.catatan', compact('data'));
    }
}
