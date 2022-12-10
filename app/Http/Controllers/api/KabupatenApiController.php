<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResource;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;


class KabupatenApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabupaten = Kabupaten::paginate(10);
        return new ApiResource(true, 'list data kabupaten', $kabupaten);
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
            'nama_kabupaten' => 'required|unique:m_kabupaten'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $kabupaten = Kabupaten::create([
            'id_kabupaten' => Uuid::uuid4(),
            'nama_kabupaten' => $request->nama_kabupaten,
        ]);

        return new ApiResource(true, 'Data Kabupaten Berhasil Ditambahkan!', $kabupaten);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabupaten $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(Kabupaten $kabupaten)
    {
        return new ApiResource(true, 'Data Kabupaten Berhasil Ditemukan!', $kabupaten);
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
     * @param  \App\Models\Kabupaten $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        $validator = Validator::make($request->all(), [
            'nama_kabupaten' => 'required|unique:m_kabupaten'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kabupaten->nama_kabupaten = $request->nama_kabupaten;
        $kabupaten->save();

        return new ApiResource(true, 'Data Kabupaten Berhasil Di Update!', $kabupaten);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabupaten $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return new ApiResource(true, 'Data Kabupaten Berhasil Di Hapus!', null);
    }
}
