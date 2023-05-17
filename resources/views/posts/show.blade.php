@extends('layout')
@section('content')
    <div class="showpost">
        <div class="postview">
            <h3>{{ $post->title }}</h3>
            {{ $post->text }}
            @if (Auth::user() == $post->user || Auth::user()->type == 'admin')
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"><i class="fa-solid fa-trash"></i></button>

                </form>
            @endif
        </div>
        <div class="comments">
            <form action="{{ route('comments.store', $post) }}" method="post">
                @csrf
                <h3>{{ __('general.comments') }}</h3>
                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="{{ __('general.leavecomment') }}"></textarea>

                <input type="submit" value="{{ __('general.comment') }}">
            </form>

            @foreach ($comments as $com)
                <div class="comment">
                    {{$com->user->username}}
                    {{ $com->text }}
                </div>
            @endforeach
        </div>
    </div>
@endsection
