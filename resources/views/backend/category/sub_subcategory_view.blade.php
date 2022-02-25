@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
								        <th>SubCategory Name </th>
                                        <th>Sub Sub Category name </th>
                                        <th> Action </th>
							        </tr>
						        </thead>
						        <tbody>
							        @foreach($subsubcategory as $row)
                                    <tr>
								        <td>{{$row['category']['category_name']}}</td>
                                        <td> {{$row['subcategory']['subcategory_name']}}</td>
								        <td>{{$row->subsubcategory_name}}</td>
                                        <td style="width: 50%;"><a href="{{route('subsubcategory.edit',$row->id)}}" class="btn btn-info" style="margin-right:10px;" > <i class="fa fa-pencil"> </i></a>    
                                            <a href="{{route('subsubcategory.delete', $row->id)}}" id="delete" class="btn btn-danger" ><i class="fa fa-trash" > </i></a> </td>
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
				        <h3 class="box-title">Add Sub-SubCategory</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
                            <form method="post"  action="{{route('sub.subcategory.store')}}" >
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

                            <div class="form-group">
                                <h5>Sub-SubCategory<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control"  name="subsubcategory_name" >     
                                    @error('subsubcategory_name') 
                                        <span class="text-danger" > {{$message}} </span>
                                    @enderror    
                                </div>
                            </div>      
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value= "Add Sub-SubCategory">
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