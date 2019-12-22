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
					<a href="#">Add Product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						
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
						<form class="form-horizontal" action="{{ url ('/store_product')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}  
                        <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" name="product_name" id="date01" placeholder="product Name" required>
							  </div>
							</div>    
							
							<div class="control-group">
								<label class="control-label" for="selectError3">Product category</label>
								<div class="controls">
								  <select id="selectError3" name="catregory_id">
									  <option>select category</option>
								  <?php 
						$all_published_categories=DB::table('tbl_category')
												  ->where('publication_status',1)
												  ->get();

												  foreach($all_published_categories as $publish_categories){
						?>
									<option value="{{$publish_categories->category_id}}">{{$publish_categories->category_name}}</option>
												  <?php }?>			
								  </select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Product brand</label>
								<div class="controls">
								  <select id="selectError3" name="brand_id">
									  <option>select Brand</option>
								  <?php 
						$all_published_brands=DB::table('tbl_brand')
												  ->where('publication_status',1)
												  ->get();

												  foreach($all_published_brands as $publish_brands){
						?>
									<option value="{{$publish_brands->brand_id}}">{{$publish_brands->brand_name}}</option>
												  <?php }?>			
								  </select>
								</div>
							</div>

							

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">product short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_describtion" id="textarea2" rows="3" required></textarea>
							  </div>
							</div>
							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">product long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_describtion" id="textarea2" rows="3" required></textarea>
							  </div>
                            </div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product price</label>
							  <div class="controls">
								<input type="text" name="product_price" id="date01" placeholder="product price" required>
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="date01">Product size</label>
							  <div class="controls">
								<input type="text" name="product_size" id="date01" placeholder="product size" required>
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" name="product_color" id="date01" placeholder="product Color" required>
							  </div>
							</div> 

                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status  </label>
                              <div class="controls">
                              <input type="checkbox" name="publication_status" value="1">
                              </div>
                            </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add product</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

		
    

	
@endsection