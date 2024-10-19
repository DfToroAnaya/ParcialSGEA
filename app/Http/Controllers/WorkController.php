<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\work;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obras = DB::table('works')
        ->join('artists', 'works.id', '=', 'artists.id')
        ->select('works.*','artists.artista_id')
        ->get();
        return view ('obra.index', ['obras' => $obras]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obras = DB::table('artist')
        ->orderBy('nombre')
        ->get();
        return view('obra.new', ['obras' => $obras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obra = new work();
        $obra->nombre = $request->name;
        $obra->id = $request->code;
        $obra->save();

        $obra = DB::table('works')
        ->join('artists', 'works.id', '=', 'artists.id')
        ->select('works.*', "artists.nombre")
        ->get();
        return view('obra.index', ['obras' => $obra]);
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
        $obra = work::find($id);
        $artistas = DB::table('artists')
        ->orderBy('nombre')
        ->get();
        return view('obra.edit', ['obra' =>$obra, 'artistas' => $artistas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obra = work::find($id);

        $obra->titulo = $request->name;
        $obra->id = $request->code;
        $obra->save();

        $obras = DB::table('works')
        ->join('srtists', 'works.id', '=', 'artists.id')
        ->select('works.*', "artists.nombre")
        ->get();

        return view('obra.index', ['obras' => $obras]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obra = work::find($id);
        $obra->delete();

        $obra = DB::table('works')
        ->join('artists', 'works.id', '=', 'artists.id')
        ->select('works.*', "artists.nombre")
        ->get();

        return view('obra.index', ['obras' => $obra]);
    }
}
