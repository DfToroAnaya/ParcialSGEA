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
        ->select('works.*','artists.id')
        ->get();
        return view ('obra.index', ['obras' => $obras]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = DB::table('artists')
        ->orderBy('id')
        ->get();
        return view('obra.new', ['artists' => $artists]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obras = new work();
        $obras->artista_id = $request->artista_id;
        $obras->título=$request->título;
        $obras->año=$request->año;
        $obras->dimensiones=$request->dimensiones;
        $obras->descripcion=$request->descripcion;
        $obras->save();

        $obras = DB::table('works')
        ->join('artists', 'works.id', '=', 'artists.id')
        ->select('works.*', "artists.id")
        ->get();
        return view('obra.index', ['obras' => $obras]);
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
        $artists = DB::table('artists')
        ->orderBy('id')
        ->get();
        return view('obra.edit', ['obra' =>$obra, 'artists' => $artists]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obra = work::find($id);

        $obra->título = $request->name;
        $obra->id = $request->code;
        $obra->save();

        $obras = DB::table('works')
        ->join('artists', 'works.id', '=', 'artists.id')
        ->select('works.*', "artists.id")
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
