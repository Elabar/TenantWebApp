@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>
    {!! Form::open(['action' => 'CategoriesController@store','method' => 'POST' ]) !!}
        <div class="form-group">
            {{Form::label('name','Category Name')}}
            <br>
            <input type='text' class='form-control' name='name'>
        </div>

        <div class="form-group">
            {{Form::label('description','Description')}}
            <br>
            <textarea class='form-control' rows='5' name='description'></textarea>
        </div>

        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection