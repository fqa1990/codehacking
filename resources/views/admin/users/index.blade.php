@extends('layouts.admin')

@section('content')
<h1>admin users index</h1>

	<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      
	@if($users)
		
		@foreach($users as $user)
		
      <tr>
        <td>{{$user->id}}</td>

        <td><img src="{{ URL::to($user->photo ? $user->photo->file : 'http://placehold.it/400x400') }}" height="50" alt="" /></td>
        <td><a href="{!! url('admin/users/'.$user->id.'/edit') !!}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      
       @endforeach
      
    @endif
    
    </tbody>
  </table>
	
@endsection
