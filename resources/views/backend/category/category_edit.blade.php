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
				        <h3 class="box-title">Edit Category</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
                            <form method="post"  action="{{route('category.update')}}"  >
                            @csrf
                           <input type="hidden" name="id" value="{{$category->id}}"
                            <div class="form-group">
                                    <h5><span >Category Name</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="{{$category->category_name}}"  name="category_name">     
                                        @error('category_name') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror 

                                    </div>
                                </div>
                    
                    
                                <div class="form-group">
                                    <h5><span >Category Icon</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="{{$category->category_icon}}"  name="category_icon" >     
                                        @error('category_icon') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror    
                                    </div>
                                </div>      
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value= "Update Category">
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