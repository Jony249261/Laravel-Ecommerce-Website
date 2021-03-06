@extends('admin.admin_master')
@section('products') active show-sub @endsection
@section('add-product') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Add Products</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row">
        <div class="card">
        <div class="card-header bg-primary text-white" >
                <h2 class="card-body-title text-white pl-2" style="font-size:15px;">Add New Product</h2>
              </div>
      <form action="{{ route('store-products')}}" method="POST" enctype="multipart/form-data">
      @csrf
          <div class="form-layout  pd-10">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" placeholder="Enter Product Name">
                  @error('product_name')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{ old('producut_code') }}" placeholder="Enter Product Code">
                  @error('product_code')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" value="{{ old('price') }}" placeholder="Enter Product Price">
                  @error('price')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity" value="{{ old('producut_quantity') }}" placeholder="Enter Product Quantity">
                  @error('product_quantity')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" data-placeholder="Choose country">
                    <option label="Choose Category"></option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->category_name }}</option>
                     @endforeach
                  </select>
                  @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="brand_id" data-placeholder="Choose country">
                      
                    <option label="Choose Brand"></option>
                    @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{ $brand->brand_name }}</option>
                    @endforeach
                  </select>
                  @error('brand_id')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
            

            <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                  <textarea name="short_description" id="summernote"></textarea>
                </div>
                @error('short_description')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
              </div><!-- col-lg-8 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2"></textarea>
                </div>
                @error('long_description')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
              </div><!-- col-lg-8 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main Thumbnail: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_one">
                  @error('image_one')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_two">
                  @error('image_two')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_three">
                  @error('image_three')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->

              </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Add Product</button>
            </div><!-- form-layout-footer -->
          
          </div><!-- form-layout -->
        </form>
        </div>
    </div>

</div>
@endsection