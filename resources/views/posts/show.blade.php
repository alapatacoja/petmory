@extends('layout')
@section('content')
    <link rel="stylesheet" href="/css/login.css">
    <div class="showpost">
        <div class="postview">
            @if (app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() == Route::current()->getName())
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i>
            @else
                    <a href="{{ route(app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName(), $post->user) }}"><i class="fa-solid fa-arrow-left"></i>

            @endif
            <h3>
                @switch($post->type)
                    @case('daily')
                        {{ __('general.daily') }}
                    @break

                    @case('post')
                        {{ __('general.post') }}
                    @break

                    @case('question')
                        {{ __('general.question') }}
                    @break

                    @default
                @endswitch
            </h3>
            </a>
            <div class="butts">
                @if (Auth::user() == $post->user || Auth::user()->type == 'admin')
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="button" type="submit"><i
                                class="fa-solid fa-trash"></i>{{ __('general.delete') }}</button>

                    </form>
                @endif
                @if (Auth::user() == $post->user)
                    <a class="button" id="green" href="{{ route('posts.edit', $post) }}"><i
                            class="fa-solid fa-pen-ruler"></i>{{ __('general.edit') }}</a>
                @endif
            </div>



            <div class="titleuser">
                @if (File::exists(public_path('/storage/pfp/' . $post->user->id . '.png')))
                    <img class="pfp" src="/storage/pfp/{{ $post->user->id }}.png" alt="img">
                @else
                    <img class="pfp" src="/imgs/or.png" alt="img">
                @endif
                <h3 id="mayus">{{ $post->title }}</h3> <a class="name"
                    href="{{ route('user.show', $post->user) }}"><b>by &#64;{{ $post->user->username }}</b></a>
            </div>
            {!! nl2br(e($post->text)) !!}
            <?php $num = 0; ?>
            @if ($files != null)
                <div class="imgs">
                    @foreach ($files as $file)
                        <div class="pic">
                            <img src="/storage/postfiles/{{ $post->user->id }}/{{ $post->slug }}/{{ $num }}.png"
                                alt="" onclick="full(this.src)">

                        </div>
                        <?php $num++; ?>
                    @endforeach
                </div>
            @endif

            <div id="fullimg">
                <img id="full">
                <span id="close" onclick="closeimg()"><i class="fa-solid fa-xmark"></i></span>
            </div>
        </div>
        <div class="comments">
            <h3>{{ __('general.comments') }}</h3>
            <form action="{{ route('comments.store', $post) }}" method="post">
                @csrf

                <textarea name="comment" id="comment" rows="5" placeholder="{{ __('general.leavecomment') }}"></textarea>

                <div class="button-subm ">
                    <button type="submit" name="ok">{{ __('general.comment') }}</button>
                </div>
            </form>

            <div class="comentarios">
                @foreach ($comments as $com)
                    <div class="comment">
                        <div class="pfp">
                            @if (File::exists(public_path('/storage/pfp/' . $com->user->id . '.png')))
                                <img src="/storage/pfp/{{ $com->user->id }}.png" alt="img">
                            @else
                                <img src="/imgs/or.png" alt="img">
                            @endif
                        </div>
                        <div class="txt">
                            <a href="{{ route('user.show', $com->user) }}"><b>{{ $com->user->username }}</b></a>
                            {!! nl2br(e($com->text)) !!}
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function full(ImgLink) {
            document.getElementById('full').src = ImgLink;
            document.getElementById('fullimg').style.display = "flex";
        }

        function closeimg() {
            document.getElementById('fullimg').style.display = "none";
        }
    </script>
@endsection
