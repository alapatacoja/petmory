@extends('layout')

@section('content')
    <link rel="stylesheet" href="/css/login.css">
    <div class="createpost">

        <form method="post" enctype="multipart/form-data" action="
            @if (isset($post)) {{ route('posts.update', $post) }}"> @method('PUT')
        @else
            {{ route('posts.store') }}"> @endif
            @csrf <h3 id="p-title">{{ __('general.makepost') }}
            </h3>
            <div class="izq">
                <div class="input p-title">
                    <label for="title">{{ __('general.title') }}</label>
                    <br>
                    <input type="text" name="title" id="title"
                        @if (isset($post)) value="{{ $post->title }}" @endif>
                </div>
                @if ($errors->has('title'))
                    <span class="red small">{{ $errors->first('title') }}</span>
                @endif
                <div class="input text">
                    <textarea name="text" id="text" cols="30" rows="10" placeholder="{{ __('general.text') }}">
@if (isset($post))
{!! nl2br(e($post->text)) !!}
@endif
</textarea>
                </div>
                @if ($errors->has('text'))
                    <span class="red small">{{ $errors->first('text') }}</span>
                @endif


            </div>
            <div class="der">
                <div class="input full pics">
                    <label for="photo">{{ __('general.addpics') }}</label>
                    <input type="file" name="photo[]" id="photo" multiple accept="image/*">
                </div>
                @if ($errors->has('photo'))
                    <span class="red small">{{ $errors->first('photo') }}</span>
                @endif
                <fieldset class="types">
                    <h3>{{ __('general.type') }}</h3>
                    <input type="radio" name="type" id="post" value="post"
                        @if (isset($post) && $post->type == 'post') checked @endif>
                    <label for="post"><i class="fa-regular fa-calendar-plus"></i><b>{{ __('general.post') }}</b>
                        <p>{{ __('general.postdesc') }}</p>
                    </label>
                    @if (Auth::user()->type != 'group')
                        <input type="radio" name="type" id="daily" value="daily"
                            @if (isset($post) && $post->type == 'daily') checked @endif>
                        <label for="daily"><i class="fa-regular fa-clock"></i><b>{{ __('general.daily') }}</b>
                            <p>{{ __('general.dailydesc') }}</p>
                        </label>
                        <input type="radio" name="type" id="question" value="question"
                            @if (isset($post) && $post->type == 'question') checked @endif>
                        <label for="question"><i class="fa-solid fa-question"></i><b>{{ __('general.question') }}</b>
                            <p>{{ __('general.questiondesc') }}</p>
                        </label>
                    @endif

                </fieldset>
                @if ($errors->has('type'))
                    <span class="red small">{{ $errors->first('type') }}</span>
                @endif

            </div>
            <div class="button-subm ">
                <button type="submit" name="ok">{{ __('general.ok') }}</button>
            </div>
        </form>
    </div>
@endsection
