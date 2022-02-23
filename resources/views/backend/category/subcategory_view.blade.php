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
				        <h3 class="box-title">SubCategory List</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
					        <table id="example1" class="table table-bordered table-striped">
						        <thead>
							        <tr>
								        <th>Category </th>
								        <th>SubCategory </th>
                                        <th> Actions </th>
							        </tr>
						        </thead>
						        <tbody>
							        @foreach($subcategory as $item)
                                    <tr>
								        <td>{{$item['category']['category_name']}}</td>
								        <td>{{$item->subcategory_name}}</td>
                                        <td><a href="{{route('subcategory.edit',$item->id)}}" class="btn btn-info" style="margin-right:10px;" > <i class="fa fa-pencil"> Edit</i></a>    
                                            <a href="{{route('subcategory.delete', $item->id)}}" id="delete" class="btn btn-danger" ><i class="fa fa-trash" > Delete</i></a> </td>
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
				        <h3 class="box-title">Add SubCategory</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
                            <form method="post"  action="{{route('subcategory.store')}}" >
                            @csrf
                                
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
                                
                            <div class="form-group">
                                <h5><span >SubCategory </span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="subcategory_name" >     
                                    @error('subcategory_name') 
                                        <span class="text-danger" > {{$message}} </span>
                                    @enderror    
                                </div>
                            </div>      
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value= "Add SubCategory">
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