@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="tenants/create" class="btn btn-primary">Create Tenant</a>
                    
                    @if(count($tenants) > 0)
                    <h3>Created tenant</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($tenants as $tenant)
                            <tr>
                                <td>{{$tenant->name}}</td>
                                <td><a href="tenants/{{$tenant->id}}/edit" class="btn btn-default">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['TenantsController@destroy',$tenant->id],'method' => 'TENANT', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                                
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>No tenants are creted</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
