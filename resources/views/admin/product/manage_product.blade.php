@extends('admin.admin_master')
@section('products') active show-sub @endsection
@section('manage-product') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Manage Product</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">    
              <div class="card">
                <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">Category List</h6>
              </div>    
               
                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-5p">Sl</th>
                        <th class="wd-15p">Product Name</th>  
                        <th class="wd-10p">Product price</th>  
                        <th class="wd-10p">Product image</th>  
                        <th class="wd-10p">Product Quantity</th>  
                        <th class="wd-10p">Category</th> 
                        <th class="wd-10p">status</th> 
                        <th class="wd-20p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($products as $row)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->product_name }}</td>
                        <td>{{ $row->price }}</td>
                        <td><img src="{{ asset($row->image_one) }}" width="50px" height="50px" alt=""></td>
                        <td>{{ $row->product_quantity }}</td>
                        <td>{{ $row->category->category_name }}</td>
                        <td>
                            @if($row->status == 1)
                            <span class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i> Active</span>
                            @else 
                            <span class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i> Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('admin/product/edit/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('admin/product/delete/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            @if($row->status == 1)
                            <a href="{{url('admin/product/inactive/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
                            @else
                            <a href="{{url('admin/product/active/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                            @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>


    </div>

</div>
@endsection