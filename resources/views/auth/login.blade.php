@extends('login-layout')
@section('content')
<div class="caja login">
    <div>
        <h2 style="margin: 0">{{ __('general.login') }}</h2>
        <h5 class="red" style="margin: .3em 0 1em 0">{{ __('general.fields', ['char' => '*']) }}</h5>
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
    <div class="form login-form">
            <div class="input">
                <label for="username" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.usuario') }} </label>
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}"> 
            </div>
            <div class="input">
                <label for="password" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.pass') }}</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="alert">
                <p>{{__('general.nocuenta')}} <a href="{{'register'}}" class="green">{{__('general.registrate')}}</a></p>
            </div>
            <div class="button-subm">
                <button type="submit" class="btn btn-primary">{{ __('general.cont') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection