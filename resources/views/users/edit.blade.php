@extends('layout')

@section('content')
<link rel="stylesheet" href="/css/profile.css">
    
        <form class="row g-3" action="{{ route('user.update', Auth::user()) }}" method="post" enctype="multipart/form-data">

            <h3> {{ __('general.editacc') }} </h3>

            <div class="col-md-6">
                <label for="name" class="form-label"> {{ __('general.nombre') }} </label>
                <input type="email" class="form-control" id="name">
            </div>
            <div class="col-md-6">
                <label for="username" class="form-label"> {{ __('general.usuario') }} </label> <input type="email"
                    class="form-control" id="username">
            </div>
            <div class="col-12">
                <label for="email" class="form-label">{{ __('general.email') }}</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="col-sm-6">
                <label for="password" class="form-label">{{ __('general.pass') }}</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-sm-6">
                <label for="password_confirmation" class="form-label">{{ __('general.pass_val') }}</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="col-12">
               
                <label for="pfp" class="form-label">{{ __('general.pfp') }}</label>
                <input type="file" class="form-control" id="pfp" aria-describedby="inputGroupFileAddon04"
                    aria-label="Upload" name="pfp">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">{{ __('general.cont') }}</button>
            </div>
        </form>

        <hr>

        <form class="row g-3" action="{{ route('user.update', Auth::user()) }}" method="post" enctype="multipart/form-data">

            <h3> {{ __('general.editacc') }} </h3>

            <div class="col-md-6">
                <label for="name" class="form-label"> {{ __('general.nombre') }} </label>
                <input type="email" class="form-control" id="name">
            </div>
            <div class="col-md-6">
                <label for="username" class="form-label"> {{ __('general.usuario') }} </label> <input type="email"
                    class="form-control" id="username">
            </div>
            <div class="col-12">
                <label for="email" class="form-label">{{ __('general.email') }}</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="col-sm-6">
                <label for="password" class="form-label">{{ __('general.pass') }}</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-sm-6">
                <label for="password_confirmation" class="form-label">{{ __('general.pass_val') }}</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="col-12">
               
                <label for="pfp" class="form-label">{{ __('general.pfp') }}</label>
                <input type="file" class="form-control" id="pfp" aria-describedby="inputGroupFileAddon04"
                    aria-label="Upload" name="pfp">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">{{ __('general.cont') }}</button>
            </div>
        </form>

        <hr>dx

@endsection
