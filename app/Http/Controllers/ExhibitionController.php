<?php

namespace App\Http\Controllers;
use App\Models\exhibition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $exhibitions=exhibition::all();
       $exhibitions=DB::table('exhibitions')
       ->join('works','exhibitions.id','=', 'works.id')
       ->select('exhibitions.*','works.obra_id')
       ->get();
        return view('exhibition.index', ['exhibitions'=>$exhibitions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $works=DB::table('works')
        ->orderBy('artista_id')
        ->get();
        return view('exhibition.index', ['works'=>$works]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exhibitions=new exhibition();

        $exhibitions->obra_id = $request ->obra_id;
        $exhibitions->fecha_inicio = $request->fecha_inicio;
        $exhibitions->fecha_fin = $request->fecha_fin;
        $exhibitions->ubicacion = $request->ubicacion;
        $exhibitions->nombre_evento = $request->nombre_evento;
        $exhibitions->save();

        $exhibitions=DB::table('exhibitions')
       ->join('works','exhibitions.obra_id','=', 'works.obra_id')
       ->select('exhibitions.*','works.obra_id')
       ->get();
        return view('exhibition.index', ['exhibitions'=>$exhibitions]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $exhibitions=exhibition::find($id);
        $exhibitions->obra_id = $request ->obra_id;
        $exhibitions->fecha_inicio = $request->fecha_inicio;
        $exhibitions->fecha_fin = $request->fecha_fin;
        $exhibitions->ubicacion = $request->ubicacion;
        $exhibitions->nombre_evento = $request->nombre_evento;
        $exhibitions->save();

        $exhibitions=DB::table('exhibitions')
        ->join('works','exhibitions.obra_id','=', 'works.obra_id')
        ->select('exhibitions.*','works.obra_id')
        ->get();
         return view('exhibition.index', ['exhibitions'=>$exhibitions]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exhibitions=exhibition::find($id);
        $exhibitions->delete();
        
        $exhibitions=DB::table('exhibitions')
       ->join('works','exhibitions.obra_id','=', 'works.obra_id')
       ->select('exhibitions.*','works.obra_id')
       ->get();
        return view('exhibition.index', ['exhibitions'=>$exhibitions]);
    }
}
