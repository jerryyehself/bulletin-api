<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use App\Http\Requests\StoreCustomRequest;
use App\Http\Requests\UpdateCustomRequest;
use App\Http\Resources\CustomResource;

class CustomController extends Controller
{

    public function __construct()
    {
        // parent::__construct();
        // dd(auth());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomResource::collection(Custom::all());
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
     * @param  \App\Http\Requests\StoreCustomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function show(Custom $custom)
    {
        return new CustomResource($custom);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function edit(Custom $custom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomRequest  $request
     * @param  \App\Models\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomRequest $request, Custom $custom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Custom $custom)
    {
        //
    }
}
