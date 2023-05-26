
@if (Auth::check())
    <div class="chat">
        <div class="chat-header">
            <h3><i class="fa-solid fa-message"></i>Chat</h3>
        </div>
        <div class="mensajes" id="mensajes">
             <div class="mensajes-inv" id="mensajes-inv">
                @foreach ($mess as $message)
                    @if ($message->user_id == Auth::user()->id)
                        <div class="message">
                            <span class="mi-user"><a href="{{ route('user.show', $message->user) }}">{{ $message->user->username }}</a></span>
                            <div class="mimensaje">
                                <span class="m-txt">{{ $message->text }}</span>
                            </div>
                            <span class="mi hora">{{ substr($message->created_at, 11, 5) }}</span>
                        </div>
                    @else
                        <div class="message">
                            <span class="m-user"><a href="{{ route('user.show', $message->user) }}">{{ $message->user->username }}</a></span>
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
            <form action="{{ route('messages.store') }}" method="post" id="message-form">
                @csrf
                <input type="text" placeholder="{{ __('general.escribir') }}" name="text" id="text" autocomplete="off">
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

@if (Auth::check())
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: '/',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response.messages);
                    if (response.messages.length > 0) {
                        var messages = '';
                        for (var i = 0; i < response.messages.length; i++) {
                            console.log(response.messages);
                            if(response.messages[i]['user_id']=={{Auth::user()->id}}){
                                messages += '<div class="message"><span class="mi-user"><a href="/users/'+response.messages[i]['username']+'">'+response.messages[i]['username']+'</a></span><div class="mimensaje"><span class="m-txt">'+response.messages[i]['text']+'</span></div><span class="mi hora">'+response.messages[i]['created_at'].substring(11,16)+'</span></div>';
                            } else {
                                messages+= '<div class="message"><span class="m-user"><a href="/users/'+response.messages[i]['username']+'">'+response.messages[i]['username']+'</a></span><div class="mensaje"><span class="m-txt">'+response.messages[i]['text']+'</span></div><span class="hora">'+response.messages[i]['created_at'].substring(11,16)+'</span></div>';;
                            }

                        }
                        $('#mensajes-inv').empty();
                        $('#mensajes-inv').append(messages);
                    }
                },
                error: function(err) {

                }
            })
        }, 1000);
    });
</script>


@endif
