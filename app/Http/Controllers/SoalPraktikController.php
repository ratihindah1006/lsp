<?php

namespace App\Http\Controllers;

use App\Models\CodePraktik;
use App\Models\SchemaModel;
use App\Models\SoalPraktik;
use Illuminate\Http\Request;

class SoalPraktikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SchemaModel $schema)
    {
        $data = [
            'title' => 'Soal Praktik',
            'schemas' => $schema::all(),
        ];
        return view('admin.praktik.listPraktik', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CodePraktik $codePraktik)
    {
        $data = [
            'title' => 'Tambah/Ubah Soal Praktik',
            'soal_praktik' => $codePraktik->soal_praktik,
            'code_praktik' => $codePraktik,
            'schema' => $codePraktik->schema->schema_title,
        ];
        return view('admin.praktik.createPraktik', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'instruksi' => 'required',
        ]);
        
        $instruksi = $request->instruksi;

        $dom = new \DomDocument();
  
        libxml_use_internal_errors(true);
        
        $dom->loadHtml($instruksi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);     
        
        $images = $dom->getElementsByTagName('img');

        foreach($images as $img){
            $data = $img->getAttribute('src');
            if (strpos($data, 'data') !== false) {
                list($type, $data) = array_pad(explode(';', $data),2,null); 
                list(, $data) = array_pad(explode(',', $data),2,null); 
                $data = base64_decode($data);
                $image_name= "/upload/" . time().uniqid().'.png';
                $path = public_path('storage') . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->removeAttribute('style');
                $img->setAttribute('src', asset('/storage'.$image_name));
                // $img->setAttribute('style', 'max-width:500px;');
                $img->setAttribute('class', 'img-fluid');
            }
        }
  
        $instruksi = $dom->saveHTML();

        $data = [
            'instruksi' => $instruksi
        ];

        SoalPraktik::updateOrCreate(
            ['code_praktik_id' => $request->codeId],
            $data
        );

        return redirect('/soalpraktik')->with('toast_success', 'Soal praktik berhasil di Update!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoalPraktik  $soalPraktik
     * @return \Illuminate\Http\Response
     */
    public function show(SoalPraktik $soalPraktik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoalPraktik  $soalPraktik
     * @return \Illuminate\Http\Response
     */
    public function edit(SoalPraktik $soalPraktik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SoalPraktik  $soalPraktik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoalPraktik $soalPraktik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoalPraktik  $soalPraktik
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoalPraktik $soalPraktik)
    {
        //
    }

    public function kodeSoal(Request $request)
    {
        $validateData = $request->validate([
            'schema' => 'required',
            'kode_soal' => 'required',
        ]);

        if (CodePraktik::where('schema_id', $request->schema)->where('code_praktik_name', $request->kode_soal)->exists()) {
            return redirect('soalpraktik')->with('toast_error', 'Kode soal tidak boleh sama');
        }

        $data = new CodePraktik([
            'schema_id' => $request->schema,
            'code_praktik_name' => $request->kode_soal,
        ]);      

        $data->save();

        return redirect('soalpraktik')->with('toast_success', 'Kode soal praktik berhasil ditambah!');
    }
}
