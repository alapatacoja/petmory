@extends('layout')

@section('content')
    <link rel="stylesheet" href="/css/login.css">

    <div class="createpet">
        <div class="form">
            <form class="row"
                action="@if (isset($pet)) {{ route('pets.update', $pet) }}
    @else
        {{ route('pets.store') }} @endif"
                method="POST" enctype="multipart/form-data">
                @if (isset($pet))
                    <h2>{{ __('general.editpet') }}</h2>
                    @method('PUT')
                @else
                    <h2>{{ __('general.addpet') }}</h2>
                @endif
                @csrf
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="input">
                    <label for="name"><span class="red">
                            *
                        </span>{{ __('general.nombre') }} </label>
                    <input type="text" class="form-control" id="name" name="name"
                        @if (isset($pet)) value="{{ $pet->name }}" @endif>
                </div>
                <div class="input">
                    <label for="type"><span class="red">
                            *
                        </span>{{ __('general.type') }}</label>
                    <select id="type" name="type">
                        <option selected disabled>-</option>
                        <option value="dog"@if (isset($pet) && $pet->type == 'dog') selected @endif>{{ __('general.dog') }}
                        </option>
                        <option value="cat" @if (isset($pet) && $pet->type == 'cat') selected @endif>{{ __('general.cat') }}
                        </option>
                        <option value="bird" @if (isset($pet) && $pet->type == 'bird') selected @endif>{{ __('general.bird') }}
                        </option>
                        <option value="ferret" @if (isset($pet) && $pet->type == 'ferret') selected @endif>{{ __('general.ferret') }}
                        </option>
                        <option value="rodent"@if (isset($pet) && $pet->type == 'rodent') selected @endif>{{ __('general.rodent') }}
                        </option>
                        <option value="insects/bugs" @if (isset($pet) && $pet->type == 'insects/bugs') selected @endif>{{ __('general.bugs') }}
                        </option>
                        <option value="reptiles" @if (isset($pet) && $pet->type == 'reptiles') selected @endif>
                            {{ __('general.reptiles') }}</option>
                        <option value="fish"@if (isset($pet) && $pet->type == 'fish') selected @endif>{{ __('general.fish') }}
                        </option>
                        <option value="farm" @if (isset($pet) && $pet->type == 'farm') selected @endif>{{ __('general.farm') }}
                        </option>
                        <option value="others" @if (isset($pet) && $pet->type == 'others') selected @endif>
                            {{ __('general.others') }}</option>
                    </select>
                </div>
                <div class="input">
                    <label for="birthdate">{{ __('general.birthdate') }}</label>
                    <input type="date" name="birthdate" id="birthdate"
                        @if (isset($pet)) value="{{ $pet->birthdate }}" @endif>
                </div>

                <div class="input">
                    <label for="petpic">{{ __('general.petpic') }}</label>
                    <input type="file" name="petpic" id="petpic" accept="image/*">
                </div>

                @if (isset($pet))
                    <div class="input"><label for="deathdate">
                            {{ __('general.deathdate') }}</label>
                        <input type="date" name="deathdate" id="deathdate"
                            @if (isset($pet)) value="{{ $pet->deathdate }}" @endif>
                    </div>
                @else
                    <div class="buttons">
                        <div class="button-subm">
                            <button type="submit" value="{{ __('general.add') }}" name="add" id="add">{{ __('general.add') }}</button>
                        </div>
                @endif

                <div class="button-subm ">
                    <button type="submit" value="{{ __('general.ok') }}" name="ok">{{ __('general.ok') }}</button>
                </div>
        </div>
        </form>
    </div>
    </div>



@endsection
