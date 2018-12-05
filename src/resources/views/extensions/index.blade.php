@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Que <small><a href="{{ route('ques.create') }}" class="btn btn-warning btn-sm">New Que</a></small></h3>
                {!! Form::open(['url' => 'ques', 'method'=>'get', 'class'=>'form-inline']) !!}
                <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
                    {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Type name ...']) !!}
                    {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
                </div>

                {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>timeout</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ques as $que)
                        <tr>
                            <td>{{ $que->name }}</td>
                            <td>{{ $que->timeout}}</td>
                            <td>
                                {!! Form::model($que, ['route' => ['ques.destroy', $que], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                <a href="{{ route('ques.edit', $que->id)}}" class="btn btn-xs btn-success" style="margin-right: 2%;">Edit</a>
                                {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                                {!! Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--
                {!! $ques->appends(compact('q'))->links() !!}
--}}
            </div>
        </div>
    </div>
@endsection