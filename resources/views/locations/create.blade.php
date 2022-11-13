@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('Create Location')</div>

                <div class="card-body">
                    <form method="post" action="/locations">
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @include('partials.maps._location')
                        <div class="form-group">
                            <label for="meals">{{__('Number Of Meals')}}</label>
                            <input type="number" class="form-control" id="meals" name="meals" placeholder="{{__('Number Of Meals')}}">
                        </div>

                        <div class="form-group">
                            <label for="comment">{{__('Comment')}}</label>
                            <input class="form-control" id="comment" name="comment" placeholder="{{__('Comment')}}">
                        </div>

                        <button type="submit">{{__('Submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
