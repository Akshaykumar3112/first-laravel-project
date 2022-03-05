@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
	<!-- Content Header (Page header) -->
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Product List</h3>
				    </div>
				    <!-- /.box-header -->
				    <div class="box-body">
					    <div class="table-responsive">
					        <table id="example1" class="table table-bordered table-striped">
						        <thead>
							        <tr>
                                        <th> Product Image </th>
                                        <th>Product Name </th>
								        <th>Product Code </th>
                                        <th>Product Quentity</th>
                                        <th>Product Size </th>
                                        <th>Product Color</th>
                                        <th>Selling Price </th>
								        <th>Discount Price</th>
								        <th>Category </th>
								        <th>SubCategory </th>
                                        <th>Sub Sub Category</th>
                                        <th>Hot Deal</th>
                                        <th>Featured </th>
								        <th>Special Offer </th>
                                        <th>Special Deal</th>
                                        <th> Active Status </th>
                                        <th> Action </th>
							        </tr>
						        </thead>
						        <tbody>
							        @foreach($products as $row)
                                    <tr>
                                        <td> <img src="{{asset($row->product_thambnail)}}" height="100px" width="100px"></td>
								        <td>{{$row->product_name}}</td>
                                        <td>{{$row->product_code}}</td>
                                        <td>{{$row->product_qty}}</td>
                                        <td>{{$row->product_size}}</td>
                                        <td>{{$row->product_color}}</td>
                                        <td>{{$row->selling_price}}</td>
                                        <td>{{$row->discount_price}}</td>
                                        <td>{{$row['category']['category_name']}}</td>
                                        <td>{{$row['subcategory']['subcategory_name']}}</td>
								        <td>{{$row['subsubcategory']['subsubcategory_name']}}</td>
                                        <td>{{$row->hot_deals}}</td>
                                        <td>{{$row->featured}}</td>
                                        <td>{{$row->special_offer}}</td>
                                        <td>{{$row->special_deals}}</td>
                                        <td>{{$row->status}}</td>
                                        <td><a href="{{route('product.edit',$row->id)}}" class="btn btn-info" style="margin-right:10px;" > <i class="fa fa-pencil"> </i></a>    
                                            <a href="{{route('product.delete', $row->id)}}" id="delete" class="btn btn-danger" style="margin-top: 4px;" ><i class="fa fa-trash" > </i></a> </td>
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
        </div>    
	    <!-- /.row -->
	</section>
		<!-- /.content -->
</div>




@endsection