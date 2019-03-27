
@extends('layouts.app')

@section('content')

    <h3>{{$title}}</h3>
    @if(count($tenants)>0)
        @foreach($tenants as $tenant)
            <div class="well">
                <h3><a href="/tenants/{{$tenant->id}}">{{$tenant->name}}</a></h3>
            </div>
        @endforeach
        {{$tenants->links()}}
    @else
        <p>No tenant records</p>
    @endif

@endsection