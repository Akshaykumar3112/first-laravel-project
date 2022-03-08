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
				        <h3 class="box-title">Slider List</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
					        <table id="example1" class="table table-bordered table-striped">
						        <thead>
							        <tr>
								        <th>Slider Image</th>
								        <th>Slider Title</th>
                                        <th>Description</th>
                                        <th>Status</th>    
                                        <th>Actions</th>
							        </tr>
						        </thead>
						        <tbody>
							        @foreach($sliders as $row)
                                    <tr>
                                    <td><img src="{{asset($row->slider_img)}}" style="width:70px; height:40px;" ></td>
								        <td>{{$row->title}}</td>
                                        <td>{{$row->description}}</td>
                                        <td><a href="{{route('slider.status',$row->id)}}" class="btn btn-info btn-sm" >
                                            {{ $row->status == 1 ? 'Active' : 'Deactive'}} </a>
                                        </td>
                                        <td width="30%"><a href="{{route('slider.edit',$row->id)}}" class="btn btn-info btn-sm" style="margin-right:5px; " > <i class="fa fa-pencil"> </i></a>    
                                            <a href="{{route('slider.delete', $row->id)}}" id="delete" style="margin-top:1px;" class="btn btn-danger btn-sm" ><i class="fa fa-trash" > </i></a> </td>
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
				        <h3 class="box-title">Add Slider</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
                            <form method="post"  action="{{route('slider.store')}}" enctype="multipart/form-data" >
                            @csrf
                                <div class="form-group">
                                    <h5><span >Slider Image</span></h5>
                                    <div class="controls">
                                        <input type="file" class="form-control"  name="slider_img" >     
                                        @error('slider_img') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror    
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <h5><span >Slider Title</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control"   name="title">     
                                        @error('title') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror 

                                    </div>
                                </div> 
                                <div class="form-group">
                                    <h5><span >Description</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control"   name="description">     
                                        @error('description') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror 
                                    </div>
                                </div>

                                <div class="form-group">
                                <div class="controls">
										<fieldset>
											<input type="checkbox" name="status" id="checkbox_2"  value="1">
											<label for="checkbox_2">Active Slider </label>
										</fieldset>
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