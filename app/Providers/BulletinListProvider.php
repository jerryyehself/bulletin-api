<?php

namespace App\Providers;

use App\Models\Bulletins;
use Illuminate\Support\ServiceProvider;

class BulletinListProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('bulletinList', function ($app) {
            $bulletinList = $this->getBulletinList();

            return $bulletinList;
        });
    }

    protected function getBulletinList()
    {
        $closedList = $this->getClosedList();

        $list['closed_list'] = $closedList;

        foreach (Bulletins::$bulletSys as $sys) {

            $sysBasename = class_basename($sys['sys']);
            $resourceClass = "App\\Http\\Resources\\{$sysBasename}Resource";
            $list['bulletin_collection'][$sysBasename] = $resourceClass::collection($sys['sys']::ownedBy()->get());

            $numList = $list['bulletin_collection'][$sysBasename]
                ->pluck('num')
                ->reject(function ($num) use ($closedList) {
                    return $closedList->containsStrict($num);
                });

            $list['bulletin_list'] = isset($list['bulletin_list'])
                ? $list['bulletin_list']->merge($numList)
                : $numList;
        }

        return collect($list);
    }

    protected function getClosedList()
    {
        return Bulletins::select('num')
            ->where('closed_by', auth()->user()->user_id)
            ->get()
            ->pluck('num');
    }
}
