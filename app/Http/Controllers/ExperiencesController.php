<?php

namespace App\Http\Controllers;

use App\Models\Experiences;
use Illuminate\Http\Request;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Experiences::all();
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
            foreach($request->all()['experiences'] as $item){
                Experiences::updateOrCreate(
                    [
                        'id'=> $item['id'],
                        'user_id'=> $item['user_id'],
                        'company_name'=> $item['company_name'],
                    ],$item
                );
            }
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
     * @param  \App\Models\Experiences  $experiences
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Experiences::where('user_id',$id)->get();
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
     * @param  \App\Models\Experiences  $experiences
     * @return \Illuminate\Http\Response
     */
    public function edit(Experiences $experiences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experiences  $experiences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experiences $experiences)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experiences  $experiences
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Experiences::find($id);
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
