<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('tbl_bukus')->get();

        return view('buku.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $id = DB::table('tbl_bukus')->max('id');
        $noUrut = (int) substr($id, 3);
        $noUrut++;
        $char = 'B';
        $newId = $char.sprintf("%04s",$noUrut);
        return view('buku.create', compact('newId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('tbl_bukus')->max('id');
        $noUrut = (int) substr($id, 3);
        $noUrut++;
        $char = 'B';
        $newId = $char.sprintf("%04s",$noUrut);
        DB::table('tbl_bukus')->insert([
            'id'=>$newId,
            'judul'=>$request->judul,
            'isbn'=>$request->isbn,
            'pengarang'=>$request->pengarang
        ]);
        return redirect('buku');
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
        $data = DB::table('tbl_bukus')->where('id', $id)->first();
        return view('buku.edit', compact('data'));
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
        DB::table('tbl_bukus')->where('id', $id)->update([
            'judul'=>$request->judul,
            'isbn'=>$request->isbn,
            'pengarang'=>$request->pengarang
        ]);
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_bukus')->where('id', $id)->delete();
        return redirect('buku');
    }

    public function tampil()
    {
        $data = DB::table('tbl_bukus')->select('tbl_bukus.id','tbl_bukus.judul', 'tbl_pinjams.status')
            ->join('tbl_pinjams', 'tbl_pinjams.id_buku', 'tbl_bukus.id')
            ->get();
        return view('buku.history', compact('data'));
    }

}
