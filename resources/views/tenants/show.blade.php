@extends('layouts.app')

@section('content')
    <a href={{url()->previous()}} class="btn btn-default">Back</a>
    <h1>{{$tenant->name}}</h1>
    
    <div>
        Zone: <a href='/zones/{{$tenant->zoneID}}'>{{$tenant->Zone->name}}</a>
        <br>
        Floor: <a href='/floors/{{$tenant->floorID}}'>{{$tenant->Floor->name}} floor</a>
        <br>
        Lot Number: {{$tenant->lotNumber}}
        <br>
        Category: <a href='/categories/{{$tenant->categoryID}}'>{{$tenant->Category->name}}</a>
        <br><br>
        About us: {{$tenant->description}}
    </div>

    
    <hr>

    @if(!Auth::guest())
        <a href="{{$tenant->id}}/edit" class="btn btn-default">Edit</a>

        {!!Form::open(['action' => ['TenantsController@destroy',$tenant->id],'method' => 'TENANT', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif
@endsection