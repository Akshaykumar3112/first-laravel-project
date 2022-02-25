@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
	<!-- Content Header (Page header) -->
	<!-- Main content -->
	<section class="content">
		<div class="row">
			
			<!-- /.col -->

            <!-- to Add New Brand --> 
            <div class="col-12">
			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Edit Sub-SubCategory</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
                            <form method="post"  action="{{route('sub.subcategory.update')}}"  >
                            @csrf
                                <input type="hidden" name="id" value="{{$subsubcategory->id}}">
                            
                                <div class="form-group">
                                    <h5><span >Category</span></h5>
                                    <div class="controls">
                                        <select name="category_id" required class="form-control">
										    <option value="" selected="" disabled="" >Select Category</option>
										    @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $subsubcategory->category_id ? 
                                                    'selected':''}} >{{$category->category_name}}</option>
                                            @endforeach
                                        </select>    
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <h5><span >Category</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" required class="form-control">
										    <option value="" selected="" disabled="" >Select Category</option>
										    @foreach($subcategory as $subcategory)
                                                <option value="{{$subcategory->id}}" {{$subcategory->id == $subsubcategory->subcategory_id ? 
                                                    'selected':''}} >{{$subcategory->subcategory_name}}</option>
                                            @endforeach
                                        </select>    
                                    </div>
                                </div> 
                            
                                <div class="form-group">
                                    <h5><span >SubCategory </span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="{{$subsubcategory->subsubcategory_name}}"  name="subsubcategory_name">     
                                        @error('subsubcategory_name') 
                                            <span class="text-danger" > {{$message}} </span>
                                        @enderror 

                                    </div>
                                </div>
                                     
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value= "Update Sub-SubCategory">
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