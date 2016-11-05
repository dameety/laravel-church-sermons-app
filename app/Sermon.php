<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Sermon extends Model
{
    use Sluggable;
    
    public function category () {
        return $this->belongsTo('App\Category');
    }

    public function service () {
        return $this->belongsTo('App\Service');
    }

    protected $fillable = [
    	'title', 'preacher', 'service_id', 'category_id', 'datepreached', 'month', 'year', 'status', 'sermonFileName', 'size', 'type',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
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
