@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	  <div class="container-full">
		<!-- Content Header (Page header) -->
			  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form novalidate>
					  <div class="row">
						<div class="col-12">
                            
                            <div class="row"> <!--Start 1st row  --> 
                                <div class="col-md-3">
                                    <div class="form-group">
								        <h5>Brand <span class="text-danger">*</span></h5>
								        <div class="controls">
									
                                            <select name="category_id" required class="form-control">
										        <option value="" selected="" disabled="" >Select Brand</option>
										        @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                @endforeach
                                            </select>
                                    
                                            @error('category_id') 
                                                <span class="text-danger" > {{$message}} </span>
                                            @enderror
								        </div>
							        </div>
                                </div><!--end col md 3-->

                                <div class="col-md-3">
                                    <div class="form-group">
								        <h5>Category <span class="text-danger">*</span></h5>
								        <div class="controls">
									
                                            <select name="category_id" required class="form-control">
										        <option value="" selected="" disabled="" >Select Category</option>
										        @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                    
                                            @error('category_id') 
                                                <span class="text-danger" > {{$message}} </span>
                                            @enderror
								        </div>
							        </div>
                                </div><!--end col md 3 -->

                                <div class="col-md-3">
                                    <div class="form-group">
								        <h5>Sub-Category <span class="text-danger">*</span></h5>
								        <div class="controls">
                                            <select name="subcategory_id" required class="form-control">
										        <option value="" selected="" disabled="" >Select SubCategory</option>
                                             </select>
                                    
                                            @error('category_id') 
                                                <span class="text-danger" > {{$message}} </span>
                                            @enderror
								        </div>
							        </div>
                                </div><!--end col md 3 -->

                                <div class="col-md-3">
                                    <div class="form-group">
								        <h5>Sub-SubCategory <span class="text-danger">*</span></h5>
								        <div class="controls">
									
                                            <select name="category_id" required class="form-control">
										        <option value="" selected="" disabled="" >Select Sub-SubCategory</option>
										        @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                    
                                            @error('category_id') 
                                                <span class="text-danger" > {{$message}} </span>
                                            @enderror
								        </div>
							        </div>
                                </div><!--end col md 3 -->
                        </div> <!--end 1st row -->  

						<div class="row"> <!-- Start 2Ed Row -->
                            <div class="col-md-6">
                                <div class="form-group">
								    <h5>Product Name <span class="text-danger">*</span></h5>
								    <div class="controls">
									    <input type="text" name="product_name" class="form-control"> 
                                        @error('product_name') 
                                                <span class="text-danger" > {{$message}} </span>
                                        @enderror
                                    
                                    </div>
							    </div>
                            </div> <!-- End Col Md 6 -->
                            <div class="col-md-6">
                                <div class="form-group">
								    <h5>Product Code <span class="text-danger">*</span></h5>
								    <div class="controls">
									    <input type="text" name="product_code" class="form-control"> 
                                        @error('product_code') 
                                                <span class="text-danger" > {{$message}} </span>
                                        @enderror
                                    
                                    </div>
							    </div>
                            </div><!-- End Col Md 6 -->
                        </div> <!-- End 2ed Row -->

						<div class="row"> <!-- Start 3Ed Row -->
                            <div class="col-md-6">
                                <div class="form-group">
								    <h5>Product Quantity <span class="text-danger">*</span></h5>
								    <div class="controls">
									    <input type="text" name="product_qty" class="form-control"> 
                                        @error('product_qty') 
                                                <span class="text-danger" > {{$message}} </span>
                                        @enderror
                                    
                                    </div>
							    </div>
                            </div> <!-- End Col Md 6 -->
                            <div class="col-md-6">
                                <div class="form-group">
								    <h5>Product Tags <span class="text-danger">*</span></h5>
								    <div class="controls">
                                        <div class="tags-default">
					                	    <input type="text" name="product_tags" value="" data-role="tagsinput" placeholder="add tags"  /> 
                                            @error('product_tags') 
                                                <span class="text-danger" > {{$message}} </span>
                                        @enderror
                                        </div> 
                                    </div>
							    </div>
                            </div><!-- End Col Md 6 -->
                        </div><!-- End 3ed Row -->
                        
                        <div class="row"> <!-- Start 4th Row -->
                            <div class="col-md-6">
                                <div class="form-group">
								    <h5>Product Size <span class="text-danger">*</span></h5>
								    <div class="controls">
									    <input type="text" name="product_size" class="form-control"> 
                                        @error('product_size') 
                                                <span class="text-danger" > {{$message}} </span>
                                        @enderror
                                    </div>
							    </div>
                            </div> <!-- End Col Md 6 -->
                            <div class="col-md-6">
                                <div class="form-group">
								    <h5>Product Color <span class="text-danger">*</span></h5>
								    <div class="controls">
									    <input type="text" name="product_color" class="form-control"> 
                                        @error('product_color') 
                                                <span class="text-danger" > {{$message}} </span>
                                        @enderror
                                    </div>
							    </div>
                            </div><!-- End Col Md 6 -->
                        </div><!-- End 4th Row -->
                        
                        <div class="row"> <!-- Start 5th Row -->
                            <div class="col-md-6">
                                <div class="form-group">
								    <h5>Selling Price<span class="text-danger">*</span></h5>
								    <div class="controls">
									    <input type="text" name="selling_price" class="form-control"> 
                                        @error('selling_price') 
                                                <span class="text-danger" > {{$message}} </span>
                                        @enderror
                                    </div>
							    </div>
                            </div> <!-- End Col Md 6 -->
                            <div class="col-md-6">
                                <div class="form-group">
								    <h5>Discount Price <span class="text-danger">*</span></h5>
								    <div class="controls">
									    <input type="text" name="discount_price" class="form-control"> 
                                        @error('discount_price') 
                                                <span class="text-danger" > {{$message}} </span>
                                        @enderror
                                    </div>
							    </div>
                            </div><!-- End Col Md 6 -->
                        </div><!-- End 5th Row -->
						
                        <div class="row"> <!-- Start 6th Row -->
                            <div class="col-md-12">
                                <div class="form-group">
								    <h5>Short Description <span class="text-danger">*</span></h5>
								    <div class="controls">
                                        <div class="box">
				
				                    <!-- /.box-header -->
				                            <div class="box-body">
						                        <textarea id="editor1" name="editor1" rows="10" cols="80">
											        This is my textarea to be replaced with CKEditor.
						                        </textarea>
				                            </div>
			                            </div>
			                                <!-- /.box -->
                                    </div>
						        </div>
                            </div> <!-- End Col Md 12 -->
                        </div> <!-- End Row -->
                            
                        <div class="row"> <!-- Start 6th Row -->
                            <div class="col-md-12">
                                <div class="form-group">
								    <h5>Long Description <span class="text-danger">*</span></h5>
								    <div class="controls">
                                        <div class="box">
				                            <div class="box-body">
						                        <textarea id="editor1" name="editor" rows="10" cols="80">
											        This is my textarea to be replaced with CKEditor.
						                        </textarea>
				                            </div>
			                            </div>
                                    </div>
						        </div>
                            </div><!-- End Col Md 12 -->
                        </div><!-- End 6th Row -->
                        
                        <div class="form-group">
								<h5> Input Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="file" class="form-control" required> </div>
							</div>
							
							<div class="form-group">
								<h5>Basic Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="select" id="select" required class="form-control">
										<option value="">Select Your City</option>
										<option value="1">India</option>
										<option value="2">USA</option>
										<option value="3">UK</option>
										<option value="4">Canada</option>
										<option value="5">Dubai</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<h5>Textarea <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
								</div>
							</div>
						</div>
					  </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h5>Checkbox <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="checkbox" id="checkbox_1" required value="single">
										<label for="checkbox_1">Check this custom checkbox</label>
									</div>								
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<h5>Checkbox Group <span class="text-danger">*</span></h5>
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_2" required value="x">
											<label for="checkbox_2">I am unchecked Checkbox</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" value="y">
											<label for="checkbox_3">I am unchecked too</label>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add product" >
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
             var category_id = $(this).val();
             if(category_id){
                 $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d = $('select[name="subcategory_id"]').empty();
                            $.each(data,function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option');            
                            });
                    },
                 });
             } else{
                 alert('danger');
             }  
        });
    });
</script>



@endsection