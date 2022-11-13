@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('Dashboard')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @lang('Welcome! In case this is your first login and you are not assigned a type, contact your group leader to assign you a group and a type')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
