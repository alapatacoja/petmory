@extends('layout')

@section('content')
    <div class="createpost">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3 id="title">{{ __('general.makepost') }}</h3>
            <div class="input p-title">
                <label for="title">{{ __('general.title') }}</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="input text">
                <textarea name="text" id="text" cols="30" rows="10" placeholder="{{ __('general.text') }}"></textarea>
            </div>
            <div class="input full pics">
                <label for="photo">{{ __('general.addpics') }}</label>
                <input type="file" name="photo[]" id="photo" multiple accept="image/*">
            </div>
            <fieldset class="types">
                <h3>{{ __('general.type') }}</h3>
                <input type="radio" name="type" id="daily" value="daily">
                <label for="daily"><i class="fa-regular fa-clock"></i><b>{{ __('general.daily') }}</b>
                    <p>{{ __('general.dailydesc') }}</p>
                </label>
                <input type="radio" name="type" id="post" value="post">
                <label for="post"><i class="fa-regular fa-calendar-plus"></i><b>{{ __('general.post') }}</b>
                    <p>{{ __('general.postdesc') }}</p>
                </label>
                @if (Auth::user()->type != 'group')
                    <input type="radio" name="type" id="question" value="question">
                    <label for="question"><i class="fa-solid fa-question"></i><b>{{ __('general.question') }}</b>
                        <p>{{ __('general.questiondesc') }}</p>
                    </label>
                @endif

            </fieldset>
            <input type="submit" value="{{ __('general.ok') }}" class="button">

        </form>
    </div>

@endsection
