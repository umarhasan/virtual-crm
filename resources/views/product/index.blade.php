@extends('layouts.app')


@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Product List</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Product List</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="pull-right">
                      @can('product-create')
                        <a class="btn btn-primary" style="margin-bottom:5px" href="{{ route('product.create') }}"> + Add Product</a>
                      @endcan
                    </div>
                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                    <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Company users</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                   
                                    <!-- Add more columns as needed -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                   @php 
                                    $id = 1;
                                    @endphp
                                    @foreach($product as $row)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->company_users }}</td>
                                            <td>{{ $row->amount }}</td>
                                            <td>{{ $row->description }}</td>
                                        
                                            <!-- Add more columns as needed -->
                                            <td>
                                                <a href="{{ route('Product.edit', $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('Products.destroy', $row->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                              </tbody>
                        </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
  </div>
</div>
@endsection