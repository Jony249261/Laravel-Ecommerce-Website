@extends('admin.admin_master')
@section('category') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-8">    
              <div class="card pd-20 pd-sm-40">
                <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">Category List</h6>
              </div>
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Sl</th>
                        <th class="wd-15p">Category Name</th>
                        <th class="wd-20p">Status</th>  
                        <th class="wd-25p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($categories as $category)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            @if($category->status == 1)
                            <span class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i> Active</span>
                            @else 
                            <span class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i> Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/categories/edit/'.$category->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{ url('admin/categories/delete/'.$category->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            @if($category->status == 1)
                            <a href="{{ url('admin/categories/inactive/'.$category->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i> Inactive</a>
                            @else
                            <a href="{{ url('admin/categories/active/'.$category->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i> Active</a>
                            @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">Add Category
                </div>

                <div class="card-body">
                    <form action="{{ route('store.category') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Add Category</label>
                          <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

                          @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>




                </div>
            </div>
        </div>
    </div>

</div>
@endsection