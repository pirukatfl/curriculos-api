<?php

namespace App\Http\Controllers;

use App\Models\FavoriteCompanies;
use Illuminate\Http\Request;

class FavoriteCompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = FavoriteCompanies::all();
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
            $data = FavoriteCompanies::updateOrCreate($request->all());
            return response()->json([
                'msg'=> 'salvos com sucesso!'
            ], 200);

        } catch (\Error $th) {
            return $th;
            return response()->json([
                'msg'=> $th
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FavoriteCompanies  $favoriteCompanies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = FavoriteCompanies::where('user_id',$id)->get();
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FavoriteCompanies  $favoriteCompanies
     * @return \Illuminate\Http\Response
     */
    public function edit(FavoriteCompanies $favoriteCompanies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FavoriteCompanies  $favoriteCompanies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FavoriteCompanies $favoriteCompanies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FavoriteCompanies  $favoriteCompanies
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        try {
            $data = FavoriteCompanies::find($id);
            $data->delete();
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
}
