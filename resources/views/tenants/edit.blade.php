@extends('layouts.app')

@section('content')
    <h1>Edit Tenant</h1>
    {!! Form::open(['action' => ['TenantsController@update',$tenant->id],'method' => 'TENANT' ]) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            <br>
            <input type='text' class='form-control' name='name' value={{$tenant->name}}>
        </div>

        <div class="form-group">
            {{Form::label('lotNumber','Lot Number')}}
            <br>
            <input type='text' class='form-control' name='lotNumber' value={{$tenant->lotNumber}}>
        </div>

        <div class="form-group">
            {{Form::label('description','Description')}}
            <br>
            <textarea class='form-control' rows='5' name='description' >{{$tenant->description}}</textarea>
        </div>

        <div class="form-group">
            {{Form::label('zone','Zone')}}
            <select id='zoneID' name='zoneID' class='form-control'>
            @foreach($zones as $zone)
                @if ($zone->id == $tenant->zoneID)
                    <option value={{$zone->id}} selected>{{$zone->name}}</option>
                @else
                    <option value={{$zone->id}}>{{$zone->name}}</option>
                @endif
            @endforeach
            </select>
        </div>

        <div class="form-group">
            {{Form::label('floor','Floor')}}
            <select id='floorID' name='floorID' class='form-control'>
            @foreach($floors as $floor)
                @if ($floor->id == $tenant->floorID)
                    <option value={{$floor->id}} selected>{{$floor->name}}</option>
                @else
                    <option value={{$floor->id}}>{{$floor->name}}</option>
                @endif
            @endforeach
            </select>
        </div>
    
        <div class="form-group">
            {{Form::label('category','Category')}}
            <select id='categoryID' name='categoryID' class='form-control'>
            @foreach($categories as $category)
                @if ($category->id == $tenant->categoryID)
                    <option value={{$category->id}} selected>{{$category->name}}</option>
                @else
                    <option value={{$category->id}}>{{$category->name}}</option>
                @endif
            @endforeach
            </select>
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection