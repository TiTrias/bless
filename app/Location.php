<?php

namespace App;

use App\Scopes\LocationsScope;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use SpatialTrait;

    //
    protected $fillable = ['location', 'meals', 'comment'];
    protected $appends = ['latitude','longitude'];
    protected $spatialFields = [
        'location'
    ];
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LocationsScope);
    }

    public function getLatitudeAttribute(){
        return $this->location->getLat();
    }
    public function getLongitudeAttribute(){
        return $this->location->getLng();
    }
}
