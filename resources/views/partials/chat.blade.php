@if (Auth::check())
    <div class="chat">
        <div class="chat-header">
            <h3><i class="fa-solid fa-message"></i>Chat</h3>
        </div>
        <div class="mensajes">
            <div class="mensajes-inv">
                @foreach ($messages as $message)
                    @if ($message->user_id == Auth::user()->id)
                        <div class="message">
                            <span class="mi-user"><a
                                    href="{{ route('user.show', $message->user) }}">{{ $message->user->username }}</a></span>
                            <div class="mimensaje">
                                <span class="m-txt">{{ $message->text }}</span>
                            </div>
                            <span class="mi hora">{{ substr($message->created_at, 11, 5) }}</span>
                        </div>
                    @else
                        <div class="message">
                            <span class="m-user"><a
                                    href="{{ route('user.show', $message->user) }}">{{ $message->user->username }}</a></span>
                            <div class="mensaje">
                                <span class="m-txt">{{ $message->text }}</span>

                            </div>
                            <span class="hora">{{ substr($message->created_at, 11, 5) }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="chat-input">
            <form action="{{ route('messages.store') }}" method="post">
                @csrf
                <input type="text" placeholder="{{ __('general.escribir') }}" name="text" id="text">
                <button type="submit"><i class="fa-solid fa-chevron-right"></i></button>
            </form>
        </div>
    </div>
@else
    <div class="cartel">
        <span>{{ __('general.adv') }}</span>
        <a href="{{ route('register') }}" class="boton" id="register">{{ __('general.register') }}</a>
        <a href="{{ route('login') }}" class="boton">{{ __('general.login') }}</a>

    </div>
@endif
