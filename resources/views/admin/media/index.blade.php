@extends('layouts.admin')

@section('content')

@if(Session::has('media_deleted'))

	<p class="bg-danger">{{session('media_deleted')}}</p>

@endif

	<h1>Media</h1>
	
	<div class="row">
		
		<form action="delete/media" method="post" class="form-inline">
		
			{{csrf_field()}}
			{{method_field('delete')}}
			
			<div class="form-group">
			
				<select name="checkBoxArray" id="" class="form-control">
				
					<option value="">Delete</option>
				
				</select>
			
			</div>
			
			<div class="form-group">
			
				<input type="submit"  name="delete_all" value="Submit" class="btn-primary" />
			
			</div>
	
		<table class="table table-striped">
            <thead>
              <tr>
              	<th><input type="checkbox" id="options" /></th>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
              </tr>
            </thead>
            <tbody>
              
        	@if($photos)
        		
        		@foreach($photos as $photo)
        		
              <tr>
              	<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" /></td>
                <td>{{$photo->id}}</td>
<!--            <td><a href="{!! url('admin/categories/'. $photo->id.'/edit') !!}">{{$photo->file}}</a></td> -->
                <td><img src="{{ URL::to($photo->file ? $photo->file : 'http://placehold.it/400x400') }}" height="50" alt="" /></td>
                <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date'}}</td>
                <td>
                	
                	<input type="hidden" name="photo" value="{{$photo->id}}" />
                	
                	<div class="form-group">
                	
                		<input type="submit" name="delete_single" value="Delete"  class="btn btn-danger" />
                	
                	</div>
                </td>
              </tr>
                           
               @endforeach
     		</tbody>
         </table>
		</form>
	</div>         
   @endif

@stop

@section('scripts')

	<script>

    	$(document).ready(function(){
    
    		$('#options').click(function(){

    			if(this.checked){

					$('.checkBoxes').each(function(){

						this.checked = true;

					});
					
            	}else {

            		$('.checkBoxes').each(function(){

            			this.checked = false;
	
                	});
	
                }
		
        	});
    	
    	});

   </script>   
   
@stop





