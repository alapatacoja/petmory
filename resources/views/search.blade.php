@extends('layout')

@section('content')
    <div class="twosides">
        <div class="users">
            <h3>{{__('general.users')}}</h3>
            @forelse ($users as $user)
                @if (Auth::check())
                    <a href="{{ route('user.show', $user) }}">
                @endif
                <div class="user">
                    <div class="pfp">
                        @if (File::exists(public_path('/storage/pfp/' . $user->id . '.png')))
                            <img src="/storage/pfp/{{ $user->id }}.png" alt="img">
                        @else
                            <img src="/imgs/or.png" alt="img">
                        @endif
                    </div>
                    <div class="p-titles">
                        <span>@if ($user->type == 'admin')
                            <span class="admin"><i class="fa-solid fa-shield-heart"></i></span>
                        @endif{{$user->name}}</span><br>
                        <span><b>&#64;{{ $user->username }}</b></span>
                        
                    </div>
                </div>
                @if (Auth::check())
                    </a>
                @endif

                <hr>
            @empty
                <h3>{{ __('general.nousers') }}</h3>
            @endforelse
        </div>
        <div class="posts">
            <h3>{{__('general.posts')}}</h3>
            @forelse ($posts as $post)
                @if (Auth::check())
                    <a href="{{ route('showpost', [$post->user, $post]) }}">
                @endif
                <div class="post">
                    <div class="pfp">
                        @if (File::exists(public_path('/storage/pfp/' . $post->user->id . '.png')))
                            <img src="/storage/pfp/{{ $post->user->id }}.png" alt="img">
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
                        {!! nl2br(e($post->text)) !!}
                    </div>
                    <div class="p-img"> <img
                            src="/storage/postfiles/{{ $post->user->id . '/' . $post->slug }}/0.png"
                            alt="post image">
                    </div>
                </div>
                @if (Auth::check())
                    </a>
                @endif

                <hr>
                @empty
                    <h3>{{ __('general.noposts') }}</h3>
                @endforelse
            </div>


        </div>
    @endsection
