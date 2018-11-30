@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$status->title}}</h1>

        @if (session('alert_success'))
            <div class="alert alert-success" style="margin-top: 15px;">
                {{session('alert_success')}}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('status.edit', $status->id)}}">Редактировать</a>
                <a href="{{route('status.destroy', $status->id)}}">Удалить</a>
            </div>

            <div class="col-md-12">
                <div>Сортировка: {{$status->sort}}</div>
            </div>
        </div>
    </div>
@stop