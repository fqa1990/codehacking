@extends('layouts.admin')

@section('content')

	<h1>Edit Categories</h1>
	
	{!! Form::model($category, ['method'=>'PUT', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
			
			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
				
			</div>
			
			<div class="form-group col-sm-6">
				{!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
			</div>
			
		{!! Form::close() !!}
		
		{!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
			
			<div class="form-group col-sm-6">
				{!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
			</div>
			
		{!! Form::close() !!}
		
		@include('includes.form_error')

@stop