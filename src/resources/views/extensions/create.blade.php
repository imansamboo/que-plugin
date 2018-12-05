@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>New Que</h3>
                {!! Form::open(['route' => 'ques.store', 'files' => true])!!}
                @include('ques._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection