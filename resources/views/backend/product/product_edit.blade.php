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
					<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
					  <div class="row">
						<div class="col-12">
                            
                            <div class="row"> <!--Start 1st row  --> 
                                <div class="col-md-3">
                                    <div class="form-group">
								        <h5>Brand <span class="text-danger">*</span></h5>
								        <div class="controls">
									
                                            <select name="brand_id" class="form-control">
										        <option value="" selected="" disabled="" >Select Brand</option>
										        @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}} > {{$brand->brand_name}}</option>
                                                @endforeach
                                            </select>
                                    
                                            @error('brand_id') 
                                                <span class="text-danger" > {{$message}} </span>
                                            @enderror
								        </div>
							        </div>
                                </div><!--end col md 3-->

                                <div class="col-md-3">
                                    <div class="form-group">
								        <h5>Category <span class="text-danger">*</span></h5>
								        <div class="controls">
									
                                            <select name="category_id" class="form-control">
										        <option value="" selected="" disabled="" >Select Category</option>
										        @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
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
                                            <select name="subcategory_id" class="form-control">
										        <option value="{{$product->subcategory_id}}" selected="" disabled="" >{{$product['subcategory']['subcategory_name']}}</option>
                                             </select>
                                    
                                            @error('subcategory_id') 
                                                <span class="text-danger" > {{$message}} </span>
                                            @enderror
								        </div>
							        </div>
                                </div><!--end col md 3 -->

                                <div class="col-md-3">
                                    <div class="form-group">
								        <h5>Sub-SubCategory <span class="text-danger">*</span></h5>
								        <div class="controls">
									
                                            <select name="subsubcategory_id" class="form-control">
										        <option value="{{$product->subsubcategory_id}}" selected="" disabled="" >{{$product['subsubcategory']['subsubcategory_name']}} </option>
                                            </select>
                                    
                                            @error('subsubcategory_id') 
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
									    <input type="text" value="{{$product->product_name ? $product->product_name : ''  }}" name="product_name" class="form-control"> 
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
									    <input type="text" name="product_code" value="{{$product->product_code ? $product->product_code : ''  }}" class="form-control"> 
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
									    <input type="text" name="product_qty" value="{{$product->product_qty ? $product->product_qty : ''  }}" class="form-control"> 
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
					                	    <input type="text" name="product_tags" value="{{$product->product_tags ? $product->product_tags : ''  }}" data-role="tagsinput" placeholder="add tags"  /> 
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
									    <input type="text" name="product_size" value="{{$product->product_size ? $product->product_size : ''  }}" class="form-control"> 
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
									    <input type="text" name="product_color" value="{{$product->product_color ? $product->product_color : ''  }}" class="form-control"> 
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
									    <input type="text" name="selling_price" value="{{$product->selling_price ? $product->selling_price : ''  }}" class="form-control"> 
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
									    <input type="text" name="discount_price" value="{{$product->discount_price ? $product->discount_price : ''  }}" class="form-control"> 
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
						                        <textarea id="editor2" name="short_description"  rows="10" cols="80">
                                                    {{$product->short_description ? $product->short_description : ''  }}
						                        </textarea>
				                            </div>
			                            </div>
			                                <!-- /.box -->
                                    </div>
						        </div>
                            </div> <!-- End Col Md 12 -->
                        </div> <!-- End Row -->
                            
                        <div class="row"> <!-- Start 7th Row -->
                            <div class="col-md-12">
                                <div class="form-group">
								    <h5>Long Description <span class="text-danger">*</span></h5>
								    <div class="controls">
                                        <div class="box">
				
				                    <!-- /.box-header -->
				                            <div class="box-body">
						                        <textarea id="editor1" name="long_description" rows="10" cols="80">
                                                    {{$product->long_description ? $product->long_description : '' }}
						                        </textarea>
				                            </div>
			                            </div>
			                                <!-- /.box -->
                                    </div>
						        </div>
                            </div><!-- End Col Md 12 -->
                        </div><!-- End 7th Row -->
                        <div class="row"> <!-- start 8th row -->
                            <div Class="col-md-6">
                                <div class="form-group">
								    <h5>Product Thambnail <span class="text-danger">*</span></h5>
								    <div class="controls">
									    <input type="file" name="product_thambnail" onChange="mainThamUrl(this)" class="form-control" > 
                                    
                                        <img src="{{$product->product_thambnail ? asset($product->product_thambnail) : ''}}" id ="mainThamb">
                                    </div>
							    </div>
                            </div>
                            <div Class="col-md-6">
                                <h5>Product Images <span class="text-danger">*</span></h5>
								    <div class="controls">
									    <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" > 
                                        <div class="row" id ="preview_img"> 

                                                @foreach($multiImage as $img)
                                                    {{$img->photo_name}}
                                                    <!-- <img id = "$img->id" src="{{asset($img->photo_name)}}" width='100px' height='100px' >-->
                                                @endforeach
                                        </div>
                                    </div>

                            </div>     
                        </div><!-- End 8th Row -->
                        <hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
                                <div class="controls">
										<fieldset>
											<input type="checkbox" name="hot_deals" id="checkbox_2"  value="1">
											<label for="checkbox_2">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" name="featured" id="checkbox_3" value="1">
											<label for="checkbox_3">Featured </label>
										</fieldset>
									</div>								
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<fieldset>
											<input type="checkbox" name="special_offer" id="checkbox_4"  value="1">
											<label for="checkbox_4"> Special Offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" name="special_deals" id="checkbox_5" value="1">
											<label for="checkbox_5">Special Deals</label>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
						
                        <div class="row">
                            <div Class="col-md-4">
                                <div class="form-group">
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_6" name="status"  value="1">
											<label for="checkbox_6">Active </label>
										</fieldset>
                                    </div>
                                </div>

                            </div>
                            <div Class="col-md-4"></div>
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


  <!--- javascript to load SubCategory Dropdown on Category change function --->
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
                        $('select[name="subsubcategory_id"]').html('');
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


// To Load Sub-SubCategory On SubCategory Change Function 
        $('select[name="subcategory_id"]').on('change',function(){
             var subcategory_id = $(this).val();
             if(subcategory_id){
                 $.ajax({
                    url: "{{ url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data,function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name + '</option');            
                            });
                    },
                 });
             } else{
                 alert('danger');
             }  
        });
    });
</script>

<!-- To Display Thumbnail image -->
<script type="text/javascript">

    function mainThamUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThamb').attr('src',e.target.result).width(80).height(80);

            };
            reader.readAsDataURL(input.files[0]);
        }

    }

</script>
<!-- To Display Multi image -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#multiImg').on('change',function(){
            if(window.File && window.FileReader && window.FileList && window.Blob){
                var data = $(this)[0].files;
                $.each(data, function(index,file){
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
                        var fRead = new FileReader();
                        fRead.onload = (function(file){
                            return function(e){
                                var img = $('<img/>').addClass('thumb').attr('src' , e.target.result).width(80).height(80);
                                $('#preview_img').append(img);
                            };
                        })(file);
                        fRead.readAsDataURL(file);
                    }
                });
            }else{
                alert("your browser doesn't support File API!");
            }
        });
    });

</script>




@endsection