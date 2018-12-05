@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit {{ $que->name }}</h3>
                {!! Form::model($que, ['route' => ['extensions.update', $que], 'method' =>'patch', 'files' => true])!!}
                @include('extensions._form', ['model' => $que])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection