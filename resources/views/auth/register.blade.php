@extends('login-layout')

@section('content')

    <div class="form">
        <div>
            <h2>{{ __('general.register') }}</h2>
            <h5 class="red">{{ __('general.fields', ['char' => '*']) }}</h5>
        </div>
        <form class="row" action="{{ route('register') }}" method="POST">
            @csrf
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="col-sm-6">
                <label for="name" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.nombre') }} </label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"> 
            </div>
            <div class="col-sm-6">
                <label for="user" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.usuario') }}</label>
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
            </div>
            <div class="col-8">
                <label for="email" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.email') }}</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
            </div>
            <div class="col-4">
                <label for="type" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.type') }}</label>
                <select class="form-select" id="type" name="type">
                    <option selected disabled>-</option>
                    <option value="user">{{ __('general.type-user') }}</option>
                    <option value="group">{{ __('general.type-group') }}</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="password" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.pass') }}</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-sm-6">
                <label for="password_confirmation" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.pass_val') }}</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="col-12">
                <label for="pfp" class="form-label">{{ __('general.pfp') }}</label>
                <input type="file" class="form-control" id="pfp" aria-describedby="inputGroupFileAddon04"
                    aria-label="Upload" name="pfp">
            </div>
            <div class="col-8">
                <p>{{ __('general.group-alert') }}</p>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">{{ __('general.cont') }}</button>
            </div>
        </form>
    </div>

@endsection