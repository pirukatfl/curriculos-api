<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Addresses::paginate(10);
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
            $data = Addresses::updateOrCreate(['user_id'=> $request->all()['user_id']],$request->all());
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
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Addresses::where('user_id',$id)->firstOrFail();
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
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function edit(Addresses $addresses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addresses $addresses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Addresses  $addresses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addresses $addresses)
    {
        //
    }
}
