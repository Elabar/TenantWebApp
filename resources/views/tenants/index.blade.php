
@extends('layouts.app')

@section('content')
    <h1>Tenants</h1>

    @if(count($tenants)>0)
        @foreach($tenants as $tenant)
            <div class="well">
                <h3><a href="/test/public/tenants/{{$tenant->id}}">{{$tenant->name}}</a></h3>
                <small>Category: {{$tenant->category}}</small>
            </div>
        @endforeach
        {{$tenants->links()}}
    @else
        <p>No tenant records</p>
    @endif
@endsection