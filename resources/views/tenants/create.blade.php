@extends('layouts.app')

@section('content')
    <h1>Create Tenant</h1>
    {!! Form::open(['action' => 'TenantsController@store','method' => 'POST' ]) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            <br>
            <input type='text' class='form-control' name='name'>
        </div>

        <div class="form-group">
            {{Form::label('lotNumber','Lot Number')}}
            <br>
            <input type='text' class='form-control' name='lotNumber'>
        </div>

        <div class="form-group">
            {{Form::label('description','Description')}}
            <br>
            <textarea class='form-control' rows='5' name='description'></textarea>
        </div>

        <div class="form-group">
            {{Form::label('zone','Zone')}}
            <select id='zoneID' name='zoneID' class='form-control'>
            @foreach($zones as $zone)
                <option value={{$zone->id}}>{{$zone->name}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            {{Form::label('floor','Floor')}}
            <select id='floorID' name='floorID' class='form-control'>
            @foreach($floors as $floor)
                <option value={{$floor->id}}>{{$floor->name}}</option>
            @endforeach
            </select>
        </div>
    
        <div class="form-group">
            {{Form::label('category','Category')}}
            <select id='categoryID' name='categoryID' class='form-control'>
            @foreach($categories as $category)
                <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
            </select>
            <p>If the category is not found, click <a href="/categories/create">here</a> to add a new category</p>
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection