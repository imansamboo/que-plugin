<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('timeout') ? 'has-error' : '' !!}">
    {!! Form::label('timeout', 'Timeout') !!}
    {!! Form::number('timeout', null, ['class'=>'form-control']) !!}
    {!! $errors->first('timeout', '<p class="help-block">:message</p>') !!}
</div>





{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}