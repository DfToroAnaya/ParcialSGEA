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
        ->orderBy('obra_id')
        ->get();
        return view('exhibition.index', ['works'=>$works]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
