@extends('layout')

@section('content')

    <div class="body">
        <div class="posts">
            @forelse ($posts as $post)
                @if (Auth::check())
                    <a href="{{ route('showpost', [$post->user, $post]) }}">
                @endif
                <div class="post">
                    <div class="pfp">
                        @if (File::exists(public_path('/storage/pfp/' . $post->user->username . '.png')))
                            <img src="/storage/pfp/{{ $post->user->username }}.png" alt="img">
                        @else
                            <img src="/imgs/or.png" alt="img">
                        @endif
                        <div class="p-titles">
                            <span>
                                @switch($post->type)
                                    @case('question')
                                        <i class="fa-solid fa-question"></i>{{ __('general.question') }}
                                    @break

                                    @case('post')
                                        <i class="fa-regular fa-calendar-plus"></i>{{ __('general.post') }}
                                    @break

                                    @case('daily')
                                        <i class="fa-regular fa-clock"></i>{{ __('general.daily') }}
                                    @break
                                @endswitch
                                <span class="name">by &#64;{{ $post->user->username }}</span></span><span
                                class="p-title">{{ $post->title }}</span>

                        </div>
                    </div>
                    <div class="p-txt">
                        {{ $post->text }}
                    </div>
                    <div class="p-img"> <img src="/storage/postfiles/{{ $post->user->username . '/' . $post->slug }}/0.png"
                            alt="post image"></div>
                </div>
                @if (Auth::check())
                    </a>
                @endif

                <hr>
                @empty
                    <h3>{{ __('general.noposts') }}</h3>
                @endforelse
            </div>
            @include('partials/chat')
        </div>
    @endsection
