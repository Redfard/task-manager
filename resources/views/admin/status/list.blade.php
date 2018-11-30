@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('alert_success'))
            <div class="alert alert-success" style="margin-top: 15px;">
                {{session('alert_success')}}
            </div>
        @endif

        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('status.create')}}">Добавить статус</a>

        <ul class="list-group">
            @foreach($statuses as $status)
                <li class="list-group-item">
                    <a href="{{route('status.show', $status->id)}}">
                        {{$status->title}}
                    </a>

                    <div style="float: right;">
                        <a href="{{route('status.edit', $status->id)}}">
                        <span class="badge badge-primary badge-pill">
                            Редактировать
                        </span>
                        </a>
                        <a href="{{route('status.destroy', $status->id)}}">
                        <span class="badge badge-primary badge-pill">
                            Удалить
                        </span>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@stop