@extends('layouts.admin')

@section('content')
	
	@if(count($replies) > 0)
	
	<h1>Replies</h1>
	
	@if(Session::has('reply_deleted'))
	
		<p class="bg-danger">{{session('reply_deleted')}}</p>
	
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
              
        	@if($replies)
        		
        		@foreach($replies as $reply)
        		
              <tr>
                <td>{{$reply->id}}</td>
               	<td>{{$reply->author}}</td>
               	<td>{{$reply->email}}</td>
               	<td>{{$reply->body}}</td>
               	<td><a href="{!! url('post/'.$reply->post_id) !!}">View Post</a></td>
               	<td>
               		
               		@if($reply->is_active == 1)
               		
               			{!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
               			
               				<input type="hidden" name="is_active" value="0" />
               				
               				{!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
               			
               			{!! Form::close() !!}
               		
               			@else
               			
               			{!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
               			
               				<input type="hidden" name="is_active" value="1" />
               				
               				{!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
               			
               			{!! Form::close() !!}
               		
               		@endif
               		
               	</td>
               	
               	<td>
               	
               		{!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
               			               				
               				{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
               			
               		{!! Form::close() !!}
               	
               	</td>
<!--                 <td>{{$reply->created_at ? $reply->created_at->diffForHumans() : 'no date'}}</td> -->
<!--                 <td>{{$reply->updated_at ? $reply->updated_at->diffForHumans() : 'no date'}}</td> -->
              </tr>
              	
              		
               @endforeach
              
            @endif
            
            </tbody>
          </table>
          
          @else
          
          <h1 class="text-center">No Comments</h1>
          
	@endif
@stop