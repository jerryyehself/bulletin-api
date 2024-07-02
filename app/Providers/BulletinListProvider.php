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
            foreach (Bulletins::$bulletSys as $sys) {
                $sysBasename = class_basename($sys['sys']);
                $resourceClass = "App\\Http\\Resources\\{$sysBasename}Resource";
                $list[$sysBasename] = $resourceClass::collection($sys['sys']::ownedBy()->get());

                $list[$sysBasename]->map(function ($rowData) use (&$list) {
                    $list['bulletin_list'][] = $rowData->num;
                });
            }
            return $list;
        });
    }
}
