<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use App\Http\Requests\StoreCustomRequest;
use App\Http\Requests\UpdateCustomRequest;
use App\Http\Resources\CustomResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CustomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomResource::collection(Custom::ownedBy(Auth::user())->get());
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
        if (Gate::denies('get-data', $custom)) abort(403);
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
