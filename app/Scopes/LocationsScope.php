<?php

namespace App\Scopes;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class LocationsScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('group_id', Auth::user()->group->id);
    }
}
