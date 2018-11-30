@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$status->title}}</h1>

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('status.index')}}">Список статусов</a>
                <a href="{{route('status.show', $status->id)}}">Текущий статус</a>
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

                <form action="{{route('status.update', $status->id)}}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Заголовок *</label>
                        <input name="title" class="form-control" value="{{old('title') ?? $status->title}}" type="text">
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Сортировка</label>
                        <input name="sort" class="form-control" type="number" min="1" value="{{old('sort') ?? $status->sort}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@stop