<?php

namespace App\Http\Controllers;

use App\Models\Adresses;
use Illuminate\Http\Request;

class AdressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Adresses::paginate(10);
            return response()->json([
                'data'=> $data
            ], 200);
        } catch (\Throwable $th) {
            return $th;
            return response()->json([
                'msg'=> $th
            ], 500);
        }
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
        try {
            $data = Adresses::updateOrCreate($request->all());
            return response()->json([
                'data'=> $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'msg'=> $th
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adresses  $adresses
     * @return \Illuminate\Http\Response
     */
    public function show(Adresses $adresses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adresses  $adresses
     * @return \Illuminate\Http\Response
     */
    public function edit(Adresses $adresses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adresses  $adresses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adresses $adresses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adresses  $adresses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adresses $adresses)
    {
        //
    }
}
