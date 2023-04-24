<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = DB::table('courses_view');
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

    public function AllCourses()
    {
        try {
            $data = Courses::all();
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
            foreach($request->all()['courses'] as $item){
                // return $request->all();
                Courses::updateOrCreate(
                    [
                        'id'=> $item['id'],
                        'user_id'=> $item['user_id'],
                        'institution_name'=> $item['institution_name'],
                        'course_name'=> $item['course_name'],
                    ],$item
                );
            }

            return response()->json([
                'msg'=> 'salvos com sucesso!'
            ], 200);

        } catch (\Throwable $th) {
            return $th;
            return response()->json([
                'msg'=> $th
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Courses::where('user_id',$id)->get();
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
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Courses::find($id);
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
