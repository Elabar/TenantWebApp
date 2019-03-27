@extends('layouts.app')

@section('content')
 
    <h3>Categories</h3>
    @if(count($categories)>0)
        @foreach($categories as $category)
            <div class="well">
                <h3><a href="categories/{{$category->id}}">{{$category->name}}</a></h3>
                <p>{{$category->description}}</p>
            </div>
        @endforeach
        {{$categories->links()}}
    @else
        <p>No category records</p>
    @endif

@endsection
