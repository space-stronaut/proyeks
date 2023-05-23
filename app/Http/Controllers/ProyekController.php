<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use App\Models\ProyekDetail;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proyek = Proyek::create([
            'nama_proyek' => $request->nama_proyek,
            'pengembang_proyek' => $request->pengembang_proyek,
            'tanggal_pengembangan' => $request->tanggal_pengembangan,
            'wilayah_pengembangan' => $request->wilayah_pengembangan
        ]);

        // $proyek->details()->delete();

        for ($i=0; $i < count($request->step); $i++) { 

                ProyekDetail::create([
                    'proyek_id' => $proyek->id,
                    'step' => $request->step[$i],
                    'estimasi_tanggal_selesai' => $request->estimasi_tanggal_selesai[$i],
                ]);
            // }
            }

            return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyek = Proyek::find($id);
        $details = ProyekDetail::where('proyek_id', $id)->get();

        return view('proyek.edit', compact('proyek', 'details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pro = Proyek::find($id);
        $proyek = Proyek::find($id)->update([
            'nama_proyek' => $request->nama_proyek,
            'pengembang_proyek' => $request->pengembang_proyek,
            'tanggal_pengembangan' => $request->tanggal_pengembangan,
            'wilayah_pengembangan' => $request->wilayah_pengembangan
        ]);

        Proyek::find($id)->details()->delete();

        for ($i=0; $i < count($request->step); $i++) { 

                ProyekDetail::create([
                    'proyek_id' => $pro->id,
                    'step' => $request->step[$i],
                    'estimasi_tanggal_selesai' => $request->estimasi_tanggal_selesai[$i],
                ]);
            // }
            }

            return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Proyek::find($id)->delete();

        return redirect()->back();
    }
}
