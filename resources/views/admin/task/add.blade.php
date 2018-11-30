@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавление задачи</h1>

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('tasks.index')}}">Список задач</a>
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

                <form action="{{route('tasks.store')}}" method="post" autocomplete="off">
                    @csrf

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Заголовок задачи *</label>
                        <input name="title" type='text' class="form-control" value="{{old('title')}}" />
                    </div>

                    <div class="form-group">
                        <label for="">Срок выполнения</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input name="time" type='text' class="form-control input-group-addon" value="{{old('time')}}" />
                        </div>
                    </div>

                    @if ($statuses)
                        <div class="form-group">
                            <label>Статус задачи</label>
                            <select name="status_id" autocomplete="off">
                                <option value="">no status</option>
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}"
                                            {{(old('status_id') == $status->id) ? 'selected' : ''}}
                                    >
                                        {{$status->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <textarea name="description" id="" cols="30" rows="10">{{old('description')}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        window.onload = function() {
            $('#datetimepicker1').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'});

            $.extend(true, $.fn.datetimepicker.defaults, {
                icons: {
                    time: 'far fa-clock',
                    date: 'far fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'fas fa-calendar-check',
                    clear: 'far fa-trash-alt',
                    close: 'far fa-times-circle'
                }
            });
        }
    </script>
@stop
