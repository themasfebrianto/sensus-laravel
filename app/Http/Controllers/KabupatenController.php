<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kabupaten = Kabupaten::paginate(10);
        return view('kabupaten/index', compact('kabupaten'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kabupaten/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kabupaten' => 'required|unique:m_kabupaten'
        ]);

        $kabupaten = new Kabupaten();
        $kabupaten->id_kabupaten = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $kabupaten->nama_kabupaten = $request->nama_kabupaten;
        $kabupaten->save();
        return redirect('kabupaten')->with('flash_message', 'Sukses Menambahkan Kabupaten!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kabupaten = Kabupaten::find($id);
        return view('kabupaten/edit', compact('kabupaten'));
        // return response()->json($kecamatan, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $request->validate([
            'nama_kabupaten' => 'required|unique:m_kabupaten'
        ]);

        $kabupaten = Kabupaten::find($id);
        $input = $request->all();
        $kabupaten->update($input);
        return redirect('kabupaten')->with('flash_message', 'Sukses Mengedit Kabupaten!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kabupaten::destroy($id);
        return redirect('kabupaten');
    }
}
