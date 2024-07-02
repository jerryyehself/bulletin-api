<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletins extends Model
{
    use HasFactory;

    protected $fillable = [
        'num',
        'closed_by',
        'closed_date'
    ];

    public $timestamps = false;

    public static $bulletSys = [
        [
            'sys' => Quality::class,
            'fields' => [
                'title' => 'component_id as title',
                'abstract' => 'result as abstract',
                'limit_date' => 'apply_date as limit_date'
            ]
        ],
        [
            'sys' => Custom::class,
            'fields' => [
                'title' => 'cust_id as title',
                'abstract' => 'custom_content as abstract',
                'limit_date' => 'apply_date as limit_date'
            ]
        ]
    ];
}
