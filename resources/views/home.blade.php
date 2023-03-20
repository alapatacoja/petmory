@extends('layout')

@section('content')
    <?php
    session(['lang' => 'en']);
    ?>

    <div class="posts">
        <select name="" id="">
            <option value="posts">perro
            </option>
        </select>
        <div class="post">
            <div class="pfp"><img src="/imgs/img1sa.png" alt="">
                <div class="p-titles"><span class="p-title">post titulo</span><br>
                    <span>user uwu</span>
                </div>

            </div>
            <div class="p-txt">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ea consectetur iusto modi explicabo alias
                quidem
                cum autem pariatur dolorum quod cumque ullam dicta cupiditate recusandae voluptatibus adipisci,
                repellendus
                neque?
            </div>
            <div class="p-img"> <img src="/imgs/img1.png" alt=""></div>
        </div>
        <div class="post">
            <div class="pfp"><img src="/imgs/img1sa.png" alt="">
                <div class="p-titles"><span class="p-title">post titulo</span><br>
                    <span>user uwu</span>
                </div>

            </div>
            <div class="p-txt">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ea consectetur iusto modi explicabo alias
                quidem
                cum autem pariatur dolorum quod cumque ullam dicta cupiditate recusandae voluptatibus adipisci,
                repellendus
                neque?
            </div>
            <div class="p-img"> <img src="/imgs/img1.png" alt=""></div>
        </div>
        <div class="post">
            <div class="pfp"><img src="/imgs/img1sa.png" alt="">
                <div class="p-titles"><span class="p-title">post titulo</span><br>
                    <span>user uwu</span>
                </div>

            </div>
            <div class="p-txt">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ea consectetur iusto modi explicabo alias
                quidem
                cum autem pariatur dolorum quod cumque ullam dicta cupiditate recusandae voluptatibus adipisci,
                repellendus
                neque?
            </div>
            <div class="p-img"> <img src="/imgs/img1.png" alt=""></div>
        </div>
        <div class="post">
            <div class="pfp"><img src="/imgs/img1sa.png" alt="">
                <div class="p-titles"><span class="p-title">post titulo</span><br>
                    <span>user uwu</span>
                </div>

            </div>
            <div class="p-txt">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ea consectetur iusto modi explicabo alias
                quidem
                cum autem pariatur dolorum quod cumque ullam dicta cupiditate recusandae voluptatibus adipisci,
                repellendus
                neque?
            </div>
            <div class="p-img"> <img src="/imgs/img1.png" alt=""></div>
        </div>
    </div>
   
@endsection

@section('sidebar')
<div class="chat">
    <div class="chat-header">
        <h3><i class="fa-solid fa-message"></i>Chat</h3>
    </div>
    <div class="mensajes">
        <div class="message">
            <span class="m-user">user</span>
            <div class="mensaje">
                <span class="m-txt">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur quasi
                    quisquam
                    cumque eius, laudantium ipsa harum mollitia cum dolore debitis, natus sequi voluptate? Esse saepe,
                    iste
                    nemo in sapiente fuga.</span>
            </div>
        </div>
        <div class="message">
            <span class="mi-user">me</span>
            <div class="mimensaje">
                <span class="m-txt">Lorem ipsum </span>
            </div>
        </div>
        <div class="message">
            <span class="m-user">user</span>
            <div class="mensaje">
                <span class="m-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit itaque illo
                    unde
                    ipsa pariatur dolor autem ut facilis necessitatibus? Velit necessitatibus recusandae fugiat eaque
                    eveniet dolorem deserunt ipsa minus aliquid.</span>
            </div>
        </div>
        <div class="message">
            <span class="m-user">user</span>
            <div class="mensaje">
                <span class="m-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit itaque illo
                    unde
                    ipsa pariatur dolor autem ut facilis necessitatibus? Velit necessitatibus recusandae fugiat eaque
                    eveniet dolorem deserunt ipsa minus aliquid.</span>
            </div>
        </div>
    </div>
    <div class="chat-input">
        <form action="" method="post">
            <input type="text" placeholder="{{ __('general.escribir') }}">
            <button type="submit"><i class="fa-solid fa-chevron-right"></i></button>
        </form>
    </div>
</div>
@endsection
