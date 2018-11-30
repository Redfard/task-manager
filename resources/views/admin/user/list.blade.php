@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('alert_success'))
            <div class="alert alert-success" style="margin-top: 15px;">
                {{session('alert_success')}}
            </div>
        @endif

        @if (session('alert_danger'))
            <div class="alert alert-danger" style="margin-top: 15px;">
                {{session('alert_danger')}}
            </div>
        @endif

        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('users.create')}}">Добавить пользователя</a>

        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">
                    <a href="{{route('users.show', $user->id)}}">
                        {{$user->email}}
                    </a>

                    <div style="float: right;">
                        <a href="{{route('users.edit', $user->id)}}">
                        <span class="badge badge-primary badge-pill">
                            Редактировать
                        </span>
                        </a>
                        <a href="{{route('users.destroy', $user->id)}}">
                        <span class="badge badge-primary badge-pill">
                            Удалить
                        </span>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>

        {{ $users->links() }}
    </div>
@stop