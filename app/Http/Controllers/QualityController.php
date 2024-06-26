<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use App\Http\Requests\StoreQualityRequest;
use App\Http\Requests\UpdateQualityRequest;
use App\Http\Resources\QualityResource;
use Illuminate\Support\Facades\Auth;

class QualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QualityResource::collection(Quality::ownedBy(Auth::user())->get());
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
     * @param  \App\Http\Requests\StoreQualityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQualityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function show(Quality $quality)
    {
        // dd($quality->applierId);
        return new QualityResource($quality);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function edit(Quality $quality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQualityRequest  $request
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQualityRequest $request, Quality $quality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quality $quality)
    {
        //
    }
}
