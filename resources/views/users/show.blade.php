@extends('layout')

@section('content')
    <link rel="stylesheet" href="/css/profile.css">
    <div class="content">
        <div class="scroller">
            <div class="profile">
                <div class="top">
                    <div class="pfp">
                        @if (File::exists(public_path('/storage/pfp/' . $user->username . '.png')))
                            <img src="/storage/pfp/{{ $user->username }}.png" alt="img">
                        @else
                            <img src="/imgs/or.png" alt="img">
                        @endif
                        <div class="names">
                            @if ($user->type == 'admin')
                                <span class="admin">ADMIN<i class="fa-solid fa-shield-heart"></i> </span>
                            @endif
                            <span>{{ __('general.nombre') }}</span>
                            {{ $user->name }}
                            <span>{{ __('general.usuario') }}</span>
                            &#64;{{ $user->username }}

                        </div>
                    </div>
                    <div class="stats">
                        <span>{{ count($user->followers) }}
                            {{ trans_choice('general.followers', count($user->followers)) }}</span>
                        <span>{{ count($user->followings) }}
                            {{ trans_choice('general.following', count($user->followings)) }}</span>
                        @if ($user->type == 'group')
                            <span>{{ count($user->recommenders) }}
                                {{ trans_choice('general.recoms', count($user->followings)) }}</span>
                        @endif
                    </div>

                </div>


                <div class="bottom">
                    <div class="bio">
                        @if ($user->bio != null)
                            {{ $user->bio }}
                        @else
                            {{ __('general.nobio') }}
                        @endif
                    </div>
                    @if ($user->id == Auth::user()->id)
                        <div class="buttons"><a href="{{ route('user.edit', $user) }}"><i
                                    class="fa-solid fa-gear"></i>{{ __('general.settings') }}</a>
                        @else
                            <div class="buttons"><a href="{{route('follow', $user)}}">
                            @if (Auth::user()->followings->contains($user->id))
                            {{ __('general.unfollow') }}
                            @else
                            {{ __('general.follow') }}
                            @endif</a>
                                @if ($user->type == 'group')
                                    <a href="{{route('recommend')}}">
                                        @if (Auth::user()->recomendations->contains($user->id))
                                        {{ __('general.norecomendar') }}
                            @else
                            {{ __('general.recomendar') }}
                            @endif
                                        </a>
                                @endif
                    @endif
                </div>
            </div>

        </div>

        @if ($user->type == 'group')
            <div class="links">b</div>
        @endif
        <div class="posts">
            @forelse ($user->posts as $post)
                <a href="{{ route('showpost', [$user, $post]) }}">
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
                                    <span class="name">by &#64;{{ $user->username }}</span></span><span
                                    class="p-title">{{ $post->title }}</span>

                            </div>
                        </div>
                        <div class="p-txt">
                            {{ $post->text }}
                        </div>
                        <div class="p-img"> <img src="/storage/postfiles/{{ $user->username . '/' . $post->slug }}/0.png"
                                alt="post image"></div>
                    </div>
                </a>
                <hr>
                @empty
                    <h3>{{ __('general.noposts') }}</h3>
                @endforelse


            </div>
        </div>

        <div class="sidebar">
            <div class="recoms">
                <h3>{{ __('general.recomendaciones') }}
                </h3>
                @if (count($user->recomendations) == 0)
                    {{ __('general.norecoms') }}
                @else
                    <ul>
                        @foreach ($user->recomendations as $recom)
                            <li><a href="{{ route('user.show', $recom) }}">&#64;{{ $recom->username }}</a></li>
                        @endforeach

                    </ul>
                @endif
            </div>
            <div class="pets">
                <h3>{{ __('general.pets') }}</h3>
                @if (count($user->pets) == 0)
                    {{ __('general.nopets') }}
                @else
                    <ul>
                        <?php $visibles = 0; ?>
                        @foreach ($user->pets as $pet)
                            @if ($pet->visibility)
                                <?php $visibles++; ?>

                                @if ($pet->deathdate != null)
                                    <li><i class="fa-solid fa-ribbon"></i> {{ $pet->name }} - @switch($pet->type)
                                            @case('dog')
                                                {{ __('general.dog') }}
                                            @break

                                            @case('cat')
                                                {{ __('general.cat') }}
                                            @break

                                            @case('bird')
                                                {{ __('general.bird') }}
                                            @break

                                            @case('ferret')
                                                {{ __('general.ferret') }}
                                            @break

                                            @case('rodent')
                                                {{ __('general.rodent') }}
                                            @break

                                            @case('bugs')
                                                {{ __('general.bugs') }}
                                            @break

                                            @case('reptiles')
                                                {{ __('general.reptiles') }}
                                            @break

                                            @case('fish')
                                                {{ __('general.fish') }}
                                            @break

                                            @case('farm')
                                                {{ __('general.farm') }}
                                            @break

                                            @case('other')
                                                {{ __('general.other') }}
                                            @break
                                        @endswitch <br> <span class="memorial"> (
                                            @if ($pet->birthdate == null)
                                                ??
                                            @else
                                                {{ date('d/m/Y', strtotime($pet->birthdate)) }}
                                                @endif - @if ($pet->deathdate == null)
                                                    ??
                                                @else
                                                    {{ date('d/m/Y', strtotime($pet->deathdate)) }}
                                                @endif )
                                        </span></li>
                                @else
                                    <li>{{ $pet->name }} - @switch($pet->type)
                                            @case('dog')
                                                {{ __('general.dog') }}
                                            @break

                                            @case('cat')
                                                {{ __('general.cat') }}
                                            @break

                                            @case('bird')
                                                {{ __('general.bird') }}
                                            @break

                                            @case('ferret')
                                                {{ __('general.ferret') }}
                                            @break

                                            @case('rodent')
                                                {{ __('general.rodent') }}
                                            @break

                                            @case('bugs')
                                                {{ __('general.bugs') }}
                                            @break

                                            @case('reptiles')
                                                {{ __('general.reptiles') }}
                                            @break

                                            @case('fish')
                                                {{ __('general.fish') }}
                                            @break

                                            @case('farm')
                                                {{ __('general.farm') }}
                                            @break

                                            @case('other')
                                                {{ __('general.other') }}
                                            @break
                                        @endswitch
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                @endif
                @if ($visibles == 0)
                    {{ __('general.nopets') }}
                @endif
            </div>

        </div>
        </div>
    @endsection
