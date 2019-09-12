@extends('layouts.app')


@section('content')
<h1>タスク管理アプリ</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                    <th>ステータス</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, [$task->id], ['class' => '']) !!}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status }}</td>
                    
                    <td>
                        <div class="btn-toolbar">
                        {!! link_to_route('tasks.show', 'もっと見る', ['id' => $task->id], ['class' => 'btn btn-primary btn-info']) !!}
                        {!! link_to_route('tasks.edit', '編集', ['id' => $task->id], ['class' => 'btn btn-primary btn-light']) !!}
                        {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-primary btn-danger']) !!}
                        {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! link_to_route('tasks.create', '新規タスク', [], ['class' => 'btn btn-primary']) !!}

@endsection