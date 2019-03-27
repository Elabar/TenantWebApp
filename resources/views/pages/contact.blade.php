@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($contacts)>0)
        <ul class = "list-group">
        @foreach($contacts as $contact)
            <li class = "list-group-item">{{$contact}}</li> 
        @endforeach
        </ul>
    @endif
@endsection