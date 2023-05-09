@extends('layout')

@section('content')
<form class="row" action="@if (isset($pet))
    {{route('pets.update', $pet)}}
@else
    {{route('pets.store')}}
@endif" method="POST">
    @if (isset($pet))
    <h3>edit</h3>
    @method('PUT')
    @else
    <h3>{{__('general.addpet')}}</h3>
    @endif
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
        <input type="text" class="form-control" id="name" name="name" @if (isset($pet))
        value="{{$pet->name}}"
        @endif> 
    </div>
    <div class="col-sm-6">
        <label for="type" class="form-label"><span class="asteriskField">
                *
            </span>{{ __('general.type') }}</label>
            <select class="form-select" id="type" name="type">
                <option selected disabled>-</option>
                <option value="dog"@if (isset($pet) &&$pet->type == 'dog')
                    selected
                @endif>{{ __('general.dog') }}</option>
                <option value="cat" @if (isset($pet) && $pet->type == 'cat')
                    selected
                @endif>{{ __('general.cat') }}</option>
                <option value="bird" @if (isset($pet) &&$pet->type == 'bird')
                    selected
                @endif>{{ __('general.bird') }}</option>
                <option value="ferret" @if (isset($pet) &&$pet->type == 'ferret')
                    selected
                @endif>{{ __('general.ferret') }}</option>
                <option value="rodent"@if (isset($pet) &&$pet->type == 'rodent')
                    selected
                @endif>{{ __('general.rodent') }}</option>
                <option value="bugs" @if (isset($pet) &&$pet->type == 'insect/bugs')
                    selected
                @endif>{{ __('general.bugs') }}</option>
                <option value="reptiles" @if (isset($pet) &&$pet->type == 'reptiles')
                    selected
                @endif>{{ __('general.reptiles') }}</option>
                <option value="fish"@if (isset($pet) &&$pet->type == 'fish')
                    selected
                @endif>{{ __('general.fish') }}</option>
                <option value="farm" @if (isset($pet) &&$pet->type == 'farm')
                    selected
                @endif>{{ __('general.farm') }}</option>
                <option value="others" @if (isset($pet) &&$pet->type == 'others')
                    selected
                @endif>{{ __('general.others') }}</option>
            </select>
    </div>
    <div class="col-sm-12">
        <label for="birthdate" class="form-label"><span class="asteriskField">
            *
        </span>{{ __('general.birthdate') }}</label>
        <input type="date" name="birthdate" id="birthdate" @if (isset($pet))
        value="{{$pet->birthdate}}"
        @endif> 
    </div>
    @if (!isset($pet))
    <div class="col-sm-6">
        <input type="submit" value="{{ __('general.add') }}" name="add">
    </div>
    @else
    <label for="deathdate" class="form-label">
        {{ __('general.deathdate') }}</label>
    <input type="date" name="deathdate" id="deathdate" @if (isset($pet))
    value="{{$pet->deathdate}}"
    @endif> >
    @endif
    
    <div class="col-sm-6">
        <input type="submit" value="{{ __('general.ok') }}" name="ok">
    </div>

</form>
@endsection
