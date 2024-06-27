<?php

namespace App\Http\Controllers;

use App\Models\Bulletins;
use App\Http\Requests\StoreBulletinsRequest;
use App\Http\Requests\UpdateBulletinsRequest;
use App\Models\Custom;
use App\Models\Quality;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class BulletinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach (Bulletins::$bulletSys as $sys) {
            dd(class_basename($sys['sys']));
            // $col[] = 
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
     * @param  \App\Http\Requests\StoreBulletinsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBulletinsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Http\Response
     */
    public function show(Bulletins $bulletins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Http\Response
     */
    public function edit(Bulletins $bulletins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBulletinsRequest  $request
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBulletinsRequest $request, Bulletins $bulletins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bulletins $bulletins)
    {
        //
    }

    // protected function getBulletData(){
    //     $a = new CustomController;
    //     $d= $a->index()
    // }
}
