<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\kecamatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kecamatan = DB::table('m_kecamatan')
            ->leftJoin('m_kabupaten', 'm_kecamatan.id_kabupaten', '=', 'm_kabupaten.id_kabupaten')
            ->paginate(10);

        return view('kecamatan/index')->with('kecamatan', $kecamatan);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak_pdf()
    {
        $kecamatan = DB::table('m_kecamatan')
            ->leftJoin('m_kabupaten', 'm_kecamatan.id_kabupaten', '=', 'm_kabupaten.id_kabupaten')
            ->get();

        $pdf = Pdf::loadview('kecamatan/kecamatan_pdf', ['kecamatan' => $kecamatan]);
        return $pdf->download('laporan-Data-kecamatan-pdf');
    }


    // /**
    //  * Show the form for creating a new resource.
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function search(Request $request)
    {
        $search = $request->nama_kecamatan;
        $kecamatan = DB::table('m_kecamatan')
            ->leftJoin('m_kabupaten', 'm_kecamatan.id_kabupaten', '=', 'm_kabupaten.id_kabupaten')
            ->where('nama_kecamatan', 'ilike', "%" . $search . "%")
            ->paginate(10);
        return view('kecamatan/index', compact('kecamatan'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabupaten = Kabupaten::all()->pluck('nama_kabupaten', 'id_kabupaten');
        return view('kecamatan/create', compact('kabupaten'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $kecamatan = new kecamatan();
        $kecamatan->id_kecamatan = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kabupaten = $request->id_kabupaten;
        $kecamatan->save();
        return redirect('kecamatan')->with('flash_message', 'Sukses Menambahkan Kecamatan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kabupaten = Kabupaten::all()->pluck('nama_kabupaten', 'id_kabupaten'); //query untuk dropdown
        $kecamatan = kecamatan::find($id); //query untuk ambil data kecamatan 
        $id_kabupaten = $kecamatan->id_kabupaten; //kode untuk ambil data id kabupaten dalam row kecamatan
        $nama_kabupaten = Kabupaten::find($id_kabupaten); // query untuk ambil nama kabupaten berdasarkan id_kabupaten dalam table kecamatan
        return view('kecamatan/edit', compact('kecamatan', 'kabupaten', 'nama_kabupaten'));
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
            'nama_kecamatan' => 'required|unique:m_kecamatan'
        ]);

        $kecamatan = kecamatan::find($id);
        $input = $request->all();
        $kecamatan->update($input);
        return redirect('kecamatan')->with('flash_message', 'Sukses Mengedit Kecamatan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kecamatan::destroy($id);
        return redirect('kecamatan');
    }
}
