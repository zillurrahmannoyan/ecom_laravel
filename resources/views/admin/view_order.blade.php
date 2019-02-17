@extends('admin_layout')
@section('admin_content')




<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Detials</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table">
							<thead>
								<tr>
									<th>Username</th>
									<th>Mobile</th>                                          
								</tr>
							</thead>   
							<tbody>
								<tr>
									<td>Samppa Nori</td>
									<td class="center">Member</td>                                     
								</tr>
								                                 
							</tbody>
						</table> 

						<div class="pagination pagination-centered">
							<ul>
								<li><a href="#">Prev</a></li>
								<li class="active">
									<a href="#">1</a>
								</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">Next</a></li>
							</ul>
						</div>     
					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Detials</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Username</th>
									<th>Address</th>
									<th>Mobile</th>                                          
								</tr>
							</thead>   
							<tbody>
								<tr>
									<td></td>
									<td class="center"></td>
									<td class="center"></td>                                      
								</tr>
								                                 
							</tbody>
						</table>  
						<div class="pagination pagination-centered">
							<ul>
								<li><a href="#">Prev</a></li>
								<li class="active">
									<a href="#">1</a>
								</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">Next</a></li>
							</ul>
						</div>     
					</div>
				</div><!--/span-->
			</div>


<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Detials</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							<thead>
								<tr>
									<th>Id</th>
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Product Sale Quantity</th>
									<th>Product Sub Total</th>                                         
								</tr>
							</thead>   
							<tbody>
								<tr>
									<td></td>
									<td class="center"></td>
									<td class="center"></td>                                      
									<td class="center"></td>                                      
									<td class="center"></td>                                      
								</tr>                                  
							</tbody>
						</table>  
						<div class="pagination pagination-centered">
							<ul>
								<li><a href="#">Prev</a></li>
								<li class="active">
									<a href="#">1</a>
								</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">Next</a></li>
							</ul>
						</div>     
					</div>
				</div><!--/span-->
			</div>





@endsection