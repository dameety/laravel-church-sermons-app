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
    	'name', 'email', 'subject', 'request', 'title', 'preacher', 'service', 'datepreached', 'month', 'year',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'email'
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
