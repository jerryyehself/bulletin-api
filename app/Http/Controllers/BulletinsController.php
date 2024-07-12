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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBulletinsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBulletinsRequest $request)
    {
        $this->authorize('create', [Bulletins::class, $request->validated()]);

        $nums = collect($request->safe()->only('nums')['nums']);

        $nums->each(
            function ($num) {
                Bulletins::updateOrCreate(
                    [
                        'closed_by' => auth()->user()->user_id,
                        'num' => $num
                    ],
                    [
                        'closed_date' => Carbon::now('Asia/Taipei')
                    ],
                );
            }
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bulletins $bulletin)
    {
        $bulletin->delete();

        return response("{$bulletin->num} alert reboot again", 200);
    }
}
