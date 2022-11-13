@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table">
                    <thead>

                        <tr>
                            <td>@lang('Name')</td>
                            <td>@lang('Type')</td>
                            <td>@lang('Active')</td>
                        </tr>
                    </thead>


                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->type}}</td>
                        <td>
                            @if($user->active)
                            <a class="btn btn-primary" href="{{route('groups.users.toggle', $user->id)}}">&#10003;</a>
                            @else
                            <a class="btn btn-danger" href="{{route('groups.users.toggle', $user->id)}}">&#10005;</a>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </table </div>
            </div>
        </div>
    </div>
    @endsection