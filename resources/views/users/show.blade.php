@extends('layout')

@section('content')
    <link rel="stylesheet" href="css/profile.css">

    @if (!Auth::check())
        <div class="content">
            <div class="scroller">
                <div class="profile">
                    <img src="/imgs/pfpdefault.png" alt="">
                    <span class="user">username</span>
                    <span class="bio"><h4>bio</h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia labore repudiandae, ipsa laudantium non omnis aperiam, quas quia alias sed blanditiis ab amet officiis nesciunt ullam eum id dolorem assumenda!</span>
                </div>
                <div class="daily"><img src="imgs/img1.png" alt=""></div>
                <div class="p-posts">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!    
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae adipisci quis rem, magnam, a, quidem numquam dignissimos nemo nisi doloremque amet ipsa? Exercitationem accusamus optio recusandae vero quibusdam? Qui, voluptatem!
                </div>
            </div>
            <div class="pets"> d</div>
            <div class="recoms"> e</div>
            {{-- <div class="following">f </div> --}}
        </div>
    @else
        <div class="parent">
            <div class="div1"> </div>
            <div class="div2"> </div>
            <div class="div3"> </div>
            <div class="div4"> </div>
            <div class="div5"> </div>
            <div class="div6"> </div>
        </div>
    @endif
@endsection
