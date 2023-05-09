@extends('layout')

@section('content')
    <link rel="stylesheet" href="/css/profile.css">
    <div class="container">
        <div class="editacc">
            <form class="row g-3" action="{{ route('user.update', Auth::user()) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3> {{ __('general.editacc') }} </h3>

                <div class="input">
                    <label for="name" class="form-label">{{ __('general.nombre') }} </label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ Auth::user()->name }}">
                </div>
                <div class="input">
                    <label for="user" class="form-label">{{ __('general.usuario') }}</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{ Auth::user()->username }}">
                </div>
                <div class="input">
                    <label for="email" class="form-label">{{ __('general.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ Auth::user()->email }}">
                </div>
                <div class="input">
                    <label for="password" class="form-label">{{ __('general.pass') }}</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="input">
                    <label for="password_confirmation" class="form-label">{{ __('general.pass_val') }}</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="input full">
                    <label for="pfp" class="form-label">{{ __('general.pfp') }}</label>
                    <input type="file" class="form-control" id="pfp" aria-describedby="inputGroupFileAddon04"
                        aria-label="Upload" name="pfp">
                </div>
                <div class="input">
                    <label for="bio" class="form-label">{{ __('general.bio') }}</label>
                    <textarea name="bio" id="bio" cols="30" rows="10">{{ Auth::user()->bio }}</textarea>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">{{ __('general.cont') }}</button>
                </div>
            </form>

        </div>
        <div class="delacc">
            <h3>{{ __('general.deleteacc') }}</h3>
            <p>{{ __('general.nodeshacer') }}</p>
            <div class="boton">
                <form action="{{ route('user.destroy', Auth::user()) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="{{ __('general.delete') }}">
                </form>
            </div>
        </div>
        <div class="manpets">
            <h3>{{ __('general.editpets') }}</h3>
            <div class="flex">
                <table>
                    <tr>
                        <th>{{ __('general.nombre') }}</th>
                        <th>{{ __('general.type') }}</th>
                        <th>{{ __('general.visib') }}</th>
                        <th></th>
                    </tr>
                    @foreach (Auth::user()->pets as $pet)
                        <tr>
                            <td>{{ $pet->name }}</td>
                            <td>
                                @switch($pet->type)
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
                            </td>
                            @if ($pet->visibility == true)
                                <td><a href="{{ route('visibility', $pet) }}"><i class="fa-solid fa-eye"></i></a></td>
                            @else
                                <td><a href="{{ route('visibility', $pet) }}"><i class="fa-solid fa-eye-slash"></i></a>
                                </td>
                            @endif
                            <td><a href="{{ route('pets.edit', $pet) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><form action="{{ route('pets.destroy', $pet) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                
                                </form></td>

                        </tr>
                    @endforeach
                </table>

                <div class="boton">
                    <a href="{{ route('pets.create') }}">{{ __('general.addpet') }}</a>
                </div>
            </div>
        </div>

    </div>
@endsection
