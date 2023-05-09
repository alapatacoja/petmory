@extends('layout')
@section('content')
    <div class="createpost">
        <h3>{{$post->title}}</h3>
        {{$post->text}}
    </div>
@endsection