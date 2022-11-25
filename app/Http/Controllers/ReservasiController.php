<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::all();
        return $reservasi;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservasi = new Reservasi();
        $reservasi->nama_costumer = $request->input('nama_costumer');
        $reservasi->no_telp = $request->input('no_telp');
        $reservasi->jumlah_orang = $request->input('jumlah_orang');
        $reservasi->nama_kamar = $request->input('nama_kamar');
        $reservasi->tanggal_reservasi = $request->input('tanggal_reservasi');
        $reservasi->tanggal_kepulangan = $request->input('tanggal_kepulangan');
        $reservasi->jumlah_hari = $request->input('jumlah_hari');
        $reservasi->save();

        return response()->json([
            'status' => 201,
            'data' => $reservasi
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            $reservasi = Reservasi::find($id);
            if ($reservasi) {
                return response()->json([
                    'status' => 200, 
                    'data' => $reservasi
    
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'id atas ' . $id . 'tidak ditemukan'
                ], 404);
            }
        }
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
        $reservasi = Reservasi::find($id);
        if ($reservasi){
            $reservasi->nama_costumer = $request->nama_costumer ? $request->nama_costumer : $reservasi->nama_costumer;
            $reservasi->no_telp = $request->no_telp ? $request->no_telp : $reservasi->no_telp;
            $reservasi->jumlah_orang = $request->jumlah_orang ? $request->jumlah_orang : $reservasi->jumlah_orang;
            $reservasi->nama_kamar = $request->nama_kamar ? $request->nama_kamar : $reservasi->nama_kamar;
            $reservasi->tanggal_reservasi = $request->tanggal_reservasi ? $request->tanggal_reservasi : $reservasi->tanggal_reservasi;
            $reservasi->tanggal_kepulangan = $request->tanggal_kepulangan ? $request->tanggal_kepulangan : $reservasi->tanggal_kepulangan;
            $reservasi->jumlah_hari = $request->jumlah_hari ? $request->jumlah_hari : $reservasi->jumlah_hari;
            $reservasi->save();
            return response()->json([
                'status' => 200,
                'data' => $reservasi
            ], 200);

        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservasi = Reservasi::where('id',$id)->first();
        if($reservasi){
            $reservasi->delete();
            return response()->json([
                'status' => 200,
                'data' => $reservasi
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
