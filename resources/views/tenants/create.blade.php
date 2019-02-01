@extends('layouts.app')

@section('content')
    <h1>Create Tenant</h1>
    {!! Form::open(['action' => 'TenantsController@store','method' => 'TENANT' ]) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            <br>
            {{Form::text('name','', ['class'=> 'from-control','placeholder' =>'Samsung'])}}
        </div>

        <div class="form-group">
            {{Form::label('zone','Zone')}}
            <br>
            {{Form::text('zone','', ['class'=> 'from-control','placeholder' =>'Asian Arena'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('floor','Floor')}}
            <br>
            {{Form::text('floor','', ['class'=> 'from-control','placeholder' =>'3A'])}}
        </div>
    
        <div class="form-group">
            {{Form::label('lot_num','Lot Number')}}
            <br>
            {{Form::text('lot_num','', ['class'=> 'from-control','placeholder' =>'101-A'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('category','Category')}}
            <br>
            {{Form::text('category','', ['class'=> 'from-control','placeholder' =>'Beverage'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection