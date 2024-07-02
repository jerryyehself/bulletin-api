<?php

namespace App\Http\Controllers;

use App\Models\Bulletins;
use App\Http\Requests\StoreBulletinsRequest;
use App\Http\Requests\UpdateBulletinsRequest;
use Carbon\Carbon;

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
            $sysBasename = class_basename($sys['sys']);
            $resourceClass = "App\\Http\\Resources\\{$sysBasename}Resource";
            $list[$sysBasename] = $resourceClass::collection($sys['sys']::ownedBy()->get());
        }
        dd(app('bulletinList'));

        return $list;
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

        Bulletins::updateOrCreate(
            [
                'closed_by' => auth()->user()->user_id,
                'num' => $request->input('num')
            ],
            [
                'closed_date' => Carbon::now()
            ],
        );

        return response(['result' => 'closed success.'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Http\Response
     */
    public function show(Bulletins $bulletins)
    {
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
    public function destroy(Bulletins $bulletin)
    {
        dd('aa');
        // if (Gate::denies('get-data', $custom)) abort(403);
        $bulletin->delete();

        return response("{$bulletin->num} alert reboot again", 200);
    }
}
