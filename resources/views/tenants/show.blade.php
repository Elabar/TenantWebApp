@extends('layouts.app')

@section('content')
    <a href={{url()->previous()}} class="btn btn-default">Back</a>
    <h1>{{$tenant->name}}</h1>
    <small>Updated on {{$tenant->updated_at}}</small>
    <div>
        We are located at {{$zoneName}},{{$floorName}} floor and our lot number is {{$tenant->lotNumber}}.
        <br>
        We sell tons of {{$categoryName}}.
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