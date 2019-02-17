@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Update Category</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
			
		</div>
		
		<div class="box-content">
			<form class="form-horizontal" action="{{ url("/update-category",$category_info->category_id)}}" method="post">
				{{ csrf_field() }}
				<fieldset>
							{{-- <div class="control-group">
							  <label class="control-label" for="typeahead">Auto complete </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
								<p class="help-block">Start typing to activate auto complete!</p>
							  </div>
							</div> --}}
							<div class="control-group">
								<label class="control-label" for="date01">Category Name</label>
								<div class="controls">
									<input type="text" class="input-xlarge" name="category_name" value="{{$category_info->category_name}}">
								</div>
							</div>

							<div class="control-group hidden-phone">
								<label class="control-label" for="textarea2">Category Description</label>
								<div class="controls">
									<textarea class="cleditor" name="category_description" rows="3" >
										{{$category_info->category_description}}
									</textarea>
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</fieldset>
					</form>   

				</div>
			</div><!--/span-->

		</div><!--/row-->

		@endsection