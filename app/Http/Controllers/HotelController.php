<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::all();
        return $hotel;
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
        $hotel = new Hotel();
        $hotel->nama_kamar = $request->input('nama_kamar');
        $hotel->fasilitas_kamar = $request->input('fasilitas_kamar');
        $hotel->kuantitas_kamar = $request->input('kuantitas_kamar');
        $hotel->harga_kamar = $request->input('harga_kamar');
        $hotel->save();

        return response()->json([
            'status' => 201,
            'data' => $hotel
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
            $hotel = hotel::find($id);
            if ($hotel) {
                return response()->json([
                    'status' => 200, 
                    'data' => $hotel
    
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
        $hotel = hotel::find($id);
        if ($hotel){
            $hotel->nama_kamar = $request->nama_kamar ? $request->nama_kamar : $hotel->nama_kamar;
            $hotel->fasilitas_kamar = $request->fasilitas_kamar ? $request->fasilitas_kamar : $hotel->fasilitas_kamar;
            $hotel->kuantitas_kamar = $request->kuantitas_kamar ? $request->kuantitas_kamar : $hotel->kuantitas_kamar;
            $hotel->harga_kamar = $request->harga_kamar ? $request->harga_kamar : $hotel->harga_kamar;
            $hotel->save();
            return response()->json([
                'status' => 200,
                'data' => $hotel
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
        $hotel = hotel::where('id',$id)->first();
        if($hotel){
            $hotel->delete();
            return response()->json([
                'status' => 200,
                'data' => $hotel
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
