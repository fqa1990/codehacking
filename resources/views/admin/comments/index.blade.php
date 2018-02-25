@extends('layouts.admin')

@section('content')
	
	@if(count($comments) > 0)
	
	<h1>Comments</h1>
	
	@if(Session::has('comment_deleted'))
	
		<p class="bg-danger">{{session('comment_deleted')}}</p>
	
	@endif
		
	<table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Body</th>               
<!--                 <th>Created</th> -->
<!--                 <th>Updated</th> -->
              </tr>
            </thead>
            <tbody>
              
        	@if($comments)
        		
        		@foreach($comments as $comment)
        		
              <tr>
                <td>{{$comment->id}}</td>
               	<td>{{$comment->author}}</td>
               	<td>{{$comment->email}}</td>
               	<td>{{$comment->body}}</td>
               	<td><a href="{!! url('post/'.$comment->post_id) !!}">View Post</a></td>
               	<td>
               		
               		@if($comment->is_active == 1)
               		
               			{!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
               			
               				<input type="hidden" name="is_active" value="0" />
               				
               				{!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
               			
               			{!! Form::close() !!}
               		
               			@else
               			
               			{!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
               			
               				<input type="hidden" name="is_active" value="1" />
               				
               				{!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
               			
               			{!! Form::close() !!}
               		
               		@endif
               		
               	</td>
               	
               	<td>
               	
               		{!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
               			               				
               				{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
               			
               		{!! Form::close() !!}
               	
               	</td>
<!--                 <td>{{$comment->created_at ? $comment->created_at->diffForHumans() : 'no date'}}</td> -->
<!--                 <td>{{$comment->updated_at ? $comment->updated_at->diffForHumans() : 'no date'}}</td> -->
              </tr>
              
               @endforeach
              
            @endif
            
            </tbody>
          </table>
          
          @else
          
          <h1 class="text-center">No Comments</h1>
          
	@endif
@stop