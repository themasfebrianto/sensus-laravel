<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResource;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class KecamatanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::paginate(10);
        return new ApiResource(true, 'list data kecamatan', $kecamatan);
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

        $validator = Validator::make($request->all(), [
            'nama_kecamatan' => 'required|unique:m_kecamatan'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $kecamatan = Kecamatan::create([
            'id_kecamatan' => Uuid::uuid4(),
            'nama_kecamatan' => $request->nama_kecamatan,
            'id_kabupaten' => $request->id_kabupaten,
        ]);

        return new ApiResource(true, 'Data kecamatan Berhasil Ditambahkan!', $kecamatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kecamatan $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        return new ApiResource(true, 'Data kecamatan Berhasil Ditemukan!', $kecamatan);
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
     * @param  \App\Models\kecamatan $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $validator = Validator::make($request->all(), [
            'nama_kecamatan' => 'required|unique:m_kecamatan'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();

        return new ApiResource(true, 'Data kecamatan Berhasil Di Update!', $kecamatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kecamatan $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return new ApiResource(true, 'Data kecamatan Berhasil Di Hapus!', null);
    }
}
