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
					<a href="#">Edit brand</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit brand</h2>
						
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
						<form class="form-horizontal" action="{{ url ('/update_brand',$brand_info->brand_id)}}" method="post">
                        {{ csrf_field() }}  
                        <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">brand Name</label>
							  <div class="controls">
								<input type="text" name="brand_name" id="date01" placeholder="brand Name" value="{{$brand_info->brand_name}}" required>
							  </div>
							</div>        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">brand Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="brand_description" value="" id="textarea2" rows="3" required>
                                    {{$brand_info->brand_description}}
                                </textarea>
							  </div>
                            </div>
                            
                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status  </label>
                              <div class="controls">
                              <input type="checkbox" name="publication_status" value="{{$brand_info->publication_status}}" value="1">
                              </div>
                            </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

		
    

	
@endsection