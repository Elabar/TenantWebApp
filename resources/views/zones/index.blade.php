@extends('layouts.app')

@section('content')

    <h3>Zones</h3>
    @if(count($zones)>0)
        @foreach($zones as $zone)
            <div class="well">
                <h3><a href="zones/{{$zone->id}}">{{$zone->name}}</a></h3>
                <p>{{$zone->description}}</p>
            </div>
        @endforeach
        {{$zones->links()}}
    @else
        <p>No zone records</p>
    @endif

@endsection
