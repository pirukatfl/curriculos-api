<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = Favorites::where(['user_id' => $request->query()["user_id"]])->get();
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
            $data = Favorites::updateOrCreate(
                [
                    'user_id'=> $request->all()['user_id'],
                    'user_in_list_id' => $request->all()['user_in_list_id']
                ],
                $request->all());
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
     * @param  \App\Models\Favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function show(Favorites $favorites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorites $favorites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorites  $favorites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorites $favorites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorites  $favorites
     * @return \Illuminate\Http\Response
     */

    public function destroy($user_id, $user_in_list_id) {
        try {
            $data = Favorites::where(
                [
                    'user_id'=> $user_id,
                    'user_in_list_id' => $user_in_list_id
                ])->first();
            $data->delete();
            return response()->json([
                'data'=> $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'msg'=> $th
            ], 500);
        }
    }
}
