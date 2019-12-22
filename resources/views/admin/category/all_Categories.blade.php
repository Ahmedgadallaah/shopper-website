@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Categories</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Categories</h2>
                        </div>    
                        <p class="alert-success">
                        <?php
                        $message=Session::get('message');
                        
                        if ($message)
                        { 
                            echo $message;
                            Session::put('message',NULL);
                        
                        }
                        
                        ?>

                    </p>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                  <th>ID</th>
								  <th>Name</th>
								  <th>Describtion</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
                             @foreach($all_categories_info as $categories_info ) 
							<tr>
								<td>{{$categories_info->category_id}}</td>
								<td class="center">{{$categories_info->category_name}}</td>
								<td class="center">{{$categories_info->category_description}}</td>
								<td class="center">
                                    @if($categories_info->publication_status==1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">InActive</span>
                                    @endif
                                </td>
								<td class="center">
                                    @if($categories_info->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/InActive_category/'.$categories_info->category_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
                                    </a>
                                    @else
                                    <a class="btn btn-success"href="{{URL::to('/Active_category/'.$categories_info->category_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
                                    </a>
                                    @endif
                                    <a class="btn btn-info" href="{{URL::to('/edit_category/'.$categories_info->category_id)}}">
										<i class="halflings-icon white edit"></i>  
                                    </a>
                                    
									<a id="delete" class="btn btn-danger" href="{{URL::to('/delete_category/'.$categories_info->category_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

		
			
		
			
		
    


@endsection