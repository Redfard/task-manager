@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('tasks.index')}}">Задачи</a>
        <br>
        <a href="{{route('status.index')}}">Статусы</a>
        <br>
        <a href="{{route('users.index')}}">Пользователи</a>
    </div>
@stop