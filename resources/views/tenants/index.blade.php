
@extends('layouts.app')

@section('content')
    @if($type == 'name')
        <h3>Tenants</h3>
        @if(count($tenants)>0)
            @foreach($tenants as $tenant)
                <div class="well">
                    <h3><a href="tenants/{{$tenant->id}}">{{$tenant->name}}</a></h3>
                    <small>Category: {{$tenant->category}}</small>
                </div>
            @endforeach
            {{$tenants->links()}}
        @else
            <p>No tenant records</p>
        @endif
    @elseif($type == 'category')
        <h3>Categories</h3>
        @if(count($categories)>0)
            @foreach($categories as $category)
                <div class="well">
                    <h3><a href="category/{{$category->category}}">{{$category->category}}</a></h3>
                </div>
            @endforeach
            {{$categories->links()}}
        @else
            <p>No category records</p>
        @endif
    @elseif($type == 'floor')
        <h3>Floors</h3>
        @if(count($floors)>0)
            @foreach($floors as $floor)
                <div class="well">
                    <h3><a href="floor/{{$floor->floor}}">{{$floor->floor}}</a></h3>
                </div>
            @endforeach
            {{$floors->links()}}
        @else
            <p>No category records</p>
        @endif
    @elseif($type == 'zone')
        <h3>Zones</h3>
        @if(count($zones)>0)
            @foreach($zones as $zone)
                <div class="well">
                    <h3><a href="zone/{{$zone->zone}}">{{$zone->zone}}</a></h3>
                </div>
            @endforeach
            {{$zones->links()}}
        @else
            <p>No category records</p>
        @endif
    @endif

@endsection