@extends('admin.admin_master')
@section('content')
<div class="container-full">
	<!-- Content Header (Page header) -->
	<!-- Main content -->
	<section class="content">
		<div class="row">
			
			<!-- /.col -->

            <!-- to Add New Brand --> 
            <div class="col-4">
			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Edit Brand</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
                            <form method="post"  action="{{route('brand.update')}}" enctype="multipart/form-data" >
                            @csrf
                           <input type="hidden" name="id" value="{{$brand->id}}"
                            <div class="form-group">
                                    <h5><span >New Brand Name</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="{{$brand->brand_name}}"  name="brand_name">     
                                        @error('brand_name') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror 

                                    </div>
                                </div>
                    
                    
                                <div class="form-group">
                                    <h5><span >Brand image</span></h5>
                                    <div class="controls">
                                        <input type="file" class="form-control"  name="brand_image" >     
                                        <img src="{{asset('images/brand/'.$brand->brand_image)}}" style="width:70px; height:40px;" >
                                        @error('brand_image') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror    
                                    </div>
                                </div>      
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value= "Update Brand">
                                </div>
                            </form>
					    </div>
				    </div>
				<!-- /.box-body -->
			    </div>
			  <!-- /.box -->          
            </div>
            <!-- col --->
        </div>    
	    <!-- /.row -->
	</section>
		<!-- /.content -->
</div>


@endsection