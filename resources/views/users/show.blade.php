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
                            <span>{{ __('general.nombre') }}</span>
                            {{ $user->name }}
                            <span>{{ __('general.usuario') }}</span>
                            &#64;{{ $user->username }}
                            @if ($user->type == 'admin')
                                <i class="fa-solid fa-shield-heart"></i> ADMIN
                            @endif
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
                            <div class="buttons"><a href="">{{ __('general.follow') }}</a>
                                @if ($user->type == 'group')
                                    <a href="">{{ __('general.recomendar') }}</a>
                                @endif
                    @endif
                </div>
            </div>

        </div>

        @if ($user->type == 'group')
            <div class="links">b</div>
        @endif
        <div class="posts">
            <div class="post">
                <div class="pfp"><img src="/imgs/pfpdefault.png" alt="">
                    <div class="p-titles"><span class="p-title">post titulo</span><br>
                        <span>user uwu</span>
                    </div>

                </div>
                <div class="p-txt">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ea consectetur iusto modi explicabo
                    alias
                    quidem
                    cum autem pariatur dolorum quod cumque ullam dicta cupiditate recusandae voluptatibus adipisci,
                    repellendus
                    neque?
                </div>
                <div class="p-img"> <img src="/imgs/img1.png" alt=""></div>
            </div>
            <hr>
            <div class="post">
                <div class="pfp"><img src="/imgs/pfpdefault.png" alt="">
                    <div class="p-titles"><span class="p-title">post titulo</span><br>
                        <span>user uwu</span>
                    </div>

                </div>
                <div class="p-txt">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ea consectetur iusto modi explicabo
                    alias
                    quidem
                    cum autem pariatur dolorum quod cumque ullam dicta cupiditate recusandae voluptatibus adipisci,
                    repellendus
                    neque?
                </div>
                <div class="p-img"> <img src="/imgs/img1.png" alt=""></div>
            </div>
            <hr>
            <div class="post">
                <div class="pfp"><img src="/imgs/pfpdefault.png" alt="">
                    <div class="p-titles"><span class="p-title">post titulo</span><br>
                        <span>user uwu</span>
                    </div>

                </div>
                <div class="p-txt">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ea consectetur iusto modi explicabo
                    alias
                    quidem
                    cum autem pariatur dolorum quod cumque ullam dicta cupiditate recusandae voluptatibus adipisci,
                    repellendus
                    neque?
                </div>
                <div class="p-img"> <img src="/imgs/img1.png" alt=""></div>
            </div>
            <hr>
            <div class="post">
                <div class="pfp"><img src="/imgs/pfpdefault.png" alt="">
                    <div class="p-titles"><span class="p-title">post titulo</span><br>
                        <span>user uwu</span>
                    </div>

                </div>
                <div class="p-txt">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ea consectetur iusto modi explicabo
                    alias
                    quidem
                    cum autem pariatur dolorum quod cumque ullam dicta cupiditate recusandae voluptatibus adipisci,
                    repellendus
                    neque?
                </div>
                <div class="p-img"> <img src="/imgs/img1.png" alt=""></div>
            </div>
            <hr>
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
                    @foreach ($user->pets as $pet)
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
                    @endforeach
                </ul>
            @endif

        </div>

    </div>
    </div>
@endsection
