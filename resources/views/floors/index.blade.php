@extends('layouts.app')

@section('content')

    <h3>Floors</h3>
    @if(count($floors)>0)
        @foreach($floors as $floor)
            <div class="well">
                <h3><a href="floors/{{$floor->id}}">{{$floor->name}}</a></h3>
                <p>{{$floor->description}}</p>
            </div>
        @endforeach
        {{$floors->links()}}
    @else
        <p>No floor records</p>
    @endif

@endsection
