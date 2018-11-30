@extends('layouts.app')

@section('content')
    <div class="container">
        <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{route('tasks.create')}}">Добавить задачу</a>

        @if (session('alert_success'))
            <div class="alert alert-success" style="margin-top: 15px;">
                {{session('alert_success')}}
            </div>
        @endif

        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item">
                    <a href="{{route('tasks.show', $task->id)}}">
                        {{$task->title}}
                        {{$task->status ? "({$task->status->title})" : ''}}
                    </a>

                    <div style="float: right;">
                        <a href="{{route('tasks.edit', $task->id)}}">
                            <span class="badge badge-primary badge-pill">
                                Редактировать
                            </span>
                        </a>
                        <a href="{{route('tasks.destroy', $task->id)}}">
                            <span class="badge badge-primary badge-pill">
                                Удалить
                            </span>
                        </a>
                    </div>


                </li>
            @endforeach
        </ul>

        {{ $tasks->links() }}
    </div>
@stop
