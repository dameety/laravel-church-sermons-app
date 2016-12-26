<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Sermonrequest extends Model
{
    use Sluggable;

    protected $fillable = [
    	'sermontitle', 'preacher', 'moreinfo',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'sermontitle'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getUpdatedAtAttribute($value) {
    	return Carbon::parse($value)->format('d-m-Y');
	}
	public function getCreatedAtAttribute($value) {
	    return Carbon::parse($value)->format('d-m-Y');
	}
}
