@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <a href="{{route('admin')}}">Административная панель</a>

                    <h3 style="margin-top: 20px;">Примеры api запросов</h3>
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li>
                            <a href="/api/tasks?title=demo task 1">Получить задачи</a>
                        </li>
                        <li>
                            <a href="/api/tasks/item/1">Задача</a>
                        </li>
                        <li>
                            <a href="/api/tasks/status-change?task=1&status=1">Смена статуса задачи</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
