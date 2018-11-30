@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$task->title}} {{$task->status ? "({$task->status->title})" : ''}}</h1>

        @if (session('alert_success'))
            <div class="alert alert-success" style="margin-top: 15px;">
                {{session('alert_success')}}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('tasks.edit', $task->id)}}">Редактировать</a>
                <a href="{{route('tasks.destroy', $task->id)}}">Удалить</a>
            </div>

            <div class="col-md-12">
                @if ($task->time)
                    <div>Срок выполнения: {{$task->time}}</div>
                @endif

                <div>Создана: {{$task->created_at}}</div>
                <div>Обновлена: {{$task->updated_at}}</div>
            </div>

            @if ($task->description)
                <div class="col-md-12" style="margin-top: 20px;">
                    {{$task->description}}
                </div>
            @endif
        </div>
    </div>
@stop
