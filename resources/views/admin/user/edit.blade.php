@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$user->email}}</h1>

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('users.index')}}">Список пользователей</a>
                <a href="{{route('users.show', $user->id)}}">Текущий пользователь</a>
            </div>

            <div class='col-md-12'>
                @if (!$errors->isEmpty())
                    <div class="alert alert-danger" style="margin-top: 15px;">
                        <ul style="margin: 0">
                            @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('users.update', $user->id)}}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Имя *</label>
                        <input name="name" class="form-control" value="{{old('name') ?? $user->name}}" type="text">
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Email *</label>
                        <input name="email" class="form-control" type="text" min="1" value="{{old('email') ?? $user->email}}">
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Новый пароль</label>
                        <input name="password" class="form-control" type="password" min="1" value="{{old('password')}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@stop