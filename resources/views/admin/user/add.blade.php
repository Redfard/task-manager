@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавить пользователя</h1>

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('users.index')}}">Список пользователей</a>
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

                <form action="{{route('users.store')}}" method="post">
                    @csrf

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Имя *</label>
                        <input name="name" class="form-control" value="{{old('name')}}" type="text">
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Email *</label>
                        <input name="email" class="form-control" type="text" min="1" value="{{old('email')}}">
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Пароль *</label>
                        <input name="password" class="form-control" type="password" min="1" value="{{old('password')}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@stop