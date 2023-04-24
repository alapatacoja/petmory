@extends('layout')

@section('content')
    <form class="row" action="{{ route('pets.store') }}" method="POST">
        <h3>Add a pet</h3>
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
            <input type="text" class="form-control" id="name" name="name"> 
        </div>
        <div class="col-sm-6">
            <label for="type" class="form-label"><span class="asteriskField">
                    *
                </span>{{ __('general.type') }}</label>
                <select class="form-select" id="type" name="type">
                    <option selected disabled>-</option>
                    <option value="dog">{{ __('general.dog') }}</option>
                    <option value="cat">{{ __('general.cat') }}</option>
                    <option value="bird">{{ __('general.bird') }}</option>
                    <option value="ferret">{{ __('general.ferret') }}</option>
                    <option value="rodent">{{ __('general.rodent') }}</option>
                    <option value="bugs">{{ __('general.bugs') }}</option>
                    <option value="reptiles">{{ __('general.reptiles') }}</option>
                    <option value="fish">{{ __('general.fish') }}</option>
                    <option value="farm">{{ __('general.farm') }}</option>
                    <option value="others">{{ __('general.others') }}</option>
                </select>
        </div>
        <div class="col-sm-12">
            <label for="birthdate" class="form-label"><span class="asteriskField">
                *
            </span>{{ __('general.birthdate') }}</label>
            <input type="date" name="birthdate" id="birthdate">
        </div>
        <div class="col-sm-6">
            <input type="submit" value="{{ __('general.add') }}" name="add">
        </div>
        <div class="col-sm-6">
            <input type="submit" value="{{ __('general.ok') }}" name="ok">
        </div>

    </form>
@endsection
