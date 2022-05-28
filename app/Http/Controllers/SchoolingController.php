<?php

namespace App\Http\Controllers;

use App\Models\Schooling;
use Illuminate\Http\Request;

class SchoolingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Schooling::paginate(10);
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
            foreach($request->all()['schoolings'] as $item){
                Schooling::updateOrCreate(
                    [
                        'id'=> $item['id'],
                        'user_id'=> $item['user_id'],
                        'institution_name'=> $item['institution_name'],
                        'course_name'=> $item['course_name'],
                        'date_in'=> $item['date_in'],
                        'date_out'=> $item['date_out'],
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
     * @param  \App\Models\Schooling  $schooling
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Schooling::where('user_id',$id)->get();
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
     * @param  \App\Models\Schooling  $schooling
     * @return \Illuminate\Http\Response
     */
    public function edit(Schooling $schooling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schooling  $schooling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schooling $schooling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schooling  $schooling
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $data = Schooling::find($request->all()['schoolings']['id']);
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
