@extends('admin.admin_master')
@section('content')
<div class="container-full">
	<!-- Content Header (Page header) -->
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-8">
			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Brand List</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
					        <table id="example1" class="table table-bordered table-striped">
						        <thead>
							        <tr>
								        <th>Brand Name</th>
								        <th>Brand Image</th>
                                        <th> Actions </th>
							        </tr>
						        </thead>
						        <tbody>
							        @foreach($brands as $brand)
                                    <tr>
								        <td>{{$brand->brand_name}}</td>
								        <td><img src="{{asset('images/brand/'.$brand->brand_image)}}" style="width:70px; height:40px;" ></td>
                                        <td><a href="{{route('brand.edit',$brand->id)}}" class="btn btn-info" style="margin-right:10px;" > <i class="fa fa-pencil"> Edit</i></a>    
                                            <a href="{{route('brand.delete', $brand->id)}}" id="delete" class="btn btn-danger" ><i class="fa fa-trash" > Delete</i></a> </td>
							        </tr>
                                    @endforeach	
						        </tbody>
						
					        </table>
					    </div>
				    </div>
				<!-- /.box-body -->
			    </div>
			  <!-- /.box -->           
            </div>
			<!-- /.col -->

            <!-- to Add New Brand --> 
            <div class="col-4">
			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Add Brand</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
                            <form method="post"  action="{{route('brand.store')}}" enctype="multipart/form-data" >
                            @csrf
                                <div class="form-group">
                                    <h5><span >New Brand Name</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control"   name="brand_name">     
                                        @error('brand_name') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror 

                                    </div>
                                </div>
                    
                    
                                <div class="form-group">
                                    <h5><span >Brand image</span></h5>
                                    <div class="controls">
                                        <input type="file" class="form-control"  name="brand_image" >     
                                        @error('brand_image') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror    
                                    </div>
                                </div>      
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value= "Add New Brand">
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