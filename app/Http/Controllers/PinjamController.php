<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('tbl_pinjams')->select('tbl_pinjams.id', 'tbl_pinjams.tgl_pinjam', 'tbl_pinjams.tgl_batas', 'tbl_pinjams.tgl_kembali', 'tbl_pinjams.status', 'tbl_siswas.nama', 'tbl_bukus.judul')
            ->join('tbl_siswas', 'tbl_siswas.nis', 'tbl_pinjams.nis')
            ->join('tbl_bukus', 'tbl_bukus.id', '=', 'tbl_pinjams.id_buku')
            ->get();
        
            return view('pinjam.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('tbl_pinjams')->get();
        $dataBuku = DB::table('tbl_bukus')->get();
        $dataSiswa = DB::table('tbl_siswas')->get();
        $id = DB::table('tbl_pinjams')->max('id');
        $noUrut = (int) substr($id, 3);
        $noUrut++;
        $char = 'P';
        $newId = $char.sprintf("%04s",$noUrut);
        return view('pinjam.create', compact('newId', 'dataBuku', 'dataSiswa', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('tbl_pinjams')->max('id');
        $noUrut = (int) substr($id, 3);
        $noUrut++;
        $char = 'P';
        $newId = $char.sprintf("%04s",$noUrut);
        DB::table('tbl_pinjams')->insert([
            'id'=>$newId,
            'tgl_pinjam'=>$request->tgl_pinjam,
            'tgl_batas'=>$request->tgl_batas,
            'tgl_kembali'=>$request->tgl_kembali,
            'status'=>$request->status,
            'nis'=>$request->nis,
            'id_buku'=>$request->id_buku
        ]);
        return redirect('pinjam');
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
        $data = DB::table('tbl_pinjams')->where('id', $id)->first();
        $dataBuku = DB::table('tbl_bukus')->get();
        $dataSiswa = DB::table('tbl_siswas')->get();
        return view('pinjam.edit', compact('data', 'dataBuku', 'dataSiswa'));
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
        DB::table('tbl_pinjams')->where('id', $id)->update([
            'tgl_pinjam'=>$request->tgl_pinjam,
            'tgl_batas'=>$request->tgl_batas,
            'tgl_kembali'=>$request->tgl_kembali,
            'status'=>$request->status,
            'nis'=>$request->nis,
            'id_buku'=>$request->id_buku
        ]);
        return redirect('pinjam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_pinjams')->where('id', $id)->delete();
        return redirect('pinjam');
    }

    public function tampil()
    {
        $data = DB::table('tbl_pinjams')->select('tbl_pinjams.id', 'tbl_pinjams.tgl_pinjam', 'tbl_pinjams.tgl_batas', 'tbl_pinjams.tgl_kembali', 'tbl_pinjams.status', 'tbl_siswas.nama', 'tbl_bukus.judul')
            ->join('tbl_siswas', 'tbl_siswas.nis', 'tbl_pinjams.nis')
            ->join('tbl_bukus', 'tbl_bukus.id', '=', 'tbl_pinjams.id_buku')
            ->get();
        return view('pinjam.laporan', compact('data'));
    }
}
