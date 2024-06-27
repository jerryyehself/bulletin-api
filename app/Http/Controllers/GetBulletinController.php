<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use App\Models\Quality;
use Illuminate\Http\Request;

class GetBulletinController extends Controller
{
    const LIST = [
        'custom' => Custom::class,
        'qulaity' => Quality::class
    ];
}
