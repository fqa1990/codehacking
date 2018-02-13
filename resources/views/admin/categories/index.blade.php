@extends('layouts.admin')

@section('content')

@if(Session::has('category_created'))

	<p class="bg-success">{{session('category_created')}}</p>

@endif

@if(Session::has('category_updated'))

	<p class="bg-info">{{session('category_updated')}}</p>

@endif

@if(Session::has('category_deleted'))

	<p class="bg-danger">{{session('category_deleted')}}</p>

@endif

	<h1>Categories</h1>
	
	<div class="col-sm-6">
	
		{!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
			
			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
				
			</div>
			
			<div class="form-group">
				{!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
			</div>
			
		{!! Form::close() !!}
		
		@include('includes.form_error')
    	
	</div>
	
	<div class="col-sm-6">
	
		<table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
              </tr>
            </thead>
            <tbody>
              
        	@if($categories)
        		
        		@foreach($categories as $category)
        		
              <tr>
                <td>{{$category->id}}</td>
               	<td><a href="{!! url('admin/categories/'. $category->id.'/edit') !!}">{{$category->name}}</a></td>
                <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'no date'}}</td>
              </tr>
              
               @endforeach
              
            @endif
            
            </tbody>
          </table>
	
	</div>
@stop