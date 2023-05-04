@extends('login-layout')
@section('content')

    <div class="form">
        <div>
            <h2>{{ __('general.login') }}</h2>
            <h5 class="red">{{ __('general.fields', ['char' => '*']) }}</h5>
        </div>
        <form class="row" action="{{ route('login') }}" method="POST">
            @csrf
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="col-sm-12">
                <label for="username" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.usuario') }} </label>
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}"> 
            </div>
            <div class="col-sm-12">
                <label for="password" class="form-label"><span class="asteriskField">
                        *
                    </span>{{ __('general.pass') }}</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
           
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">{{ __('general.cont') }}</button>
            </div>
        </form>
    </div>

@endsection