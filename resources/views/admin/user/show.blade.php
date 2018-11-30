@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$user->name}}</h1>

        @if (session('alert_success'))
            <div class="alert alert-success" style="margin-top: 15px;">
                {{session('alert_success')}}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('users.edit', $user->id)}}">Редактировать</a>
                <a href="{{route('users.destroy', $user->id)}}">Удалить</a>
            </div>

            <div class="col-md-12">
                <div>Почта: {{$user->email}}</div>
            </div>
        </div>
    </div>
@stop