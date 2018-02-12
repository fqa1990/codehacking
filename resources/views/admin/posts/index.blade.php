@extends('layouts.admin')

@section('content')


	<h1>Posts</h1>
	
	<table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
          
    	@if($posts)
    		
    		@foreach($posts as $post)
    		
          <tr>
            <td>{{$post->id}}</td>
            <td><img src="{{ URL::to($post->photo ? $post->photo->file : 'http://placehold.it/400x400') }}" height="50" alt="" /></td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td><a href="{!! url('admin/posts/'.$post->id.'/edit') !!}">{{$post->title}}</a></td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          
           @endforeach
          
        @endif
        
        </tbody>
      </table>

@stop









