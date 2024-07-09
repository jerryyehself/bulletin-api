<?php

namespace App\Http\Controllers;

use App\Models\Bulletins;
use App\Http\Requests\StoreBulletinsRequest;
use App\Http\Requests\UpdateBulletinsRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BulletinsController extends Controller
{
    private $bulletin;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->bulletin = app('bulletinList');

            return $next($request);
        });

        // $this->authorizeResource(Bulletins::class, 'bulletin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->bulletin->get('bulletin_collection');
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
        $this->authorize('create', [Bulletins::class, $request->validated()]);

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
