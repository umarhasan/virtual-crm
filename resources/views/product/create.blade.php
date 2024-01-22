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
                <h1>Create New Product</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Create New Product</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                      <!-- Start Form -->
                      <form method="post" action="{{ route('product.store') }}">
                          @csrf
                          <!-- 1st row -->
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control" required placeholder="Name">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Company User:</label>
                                <input type="text" name="company_user" class="form-control" required placeholder="User">
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Amount:</label>
                                <input type="number" name="amount" class="form-control" required placeholder="Amount">
                              </div>
                            </div>
                            </div>
    
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : null }}">
                                  <label style="margin-top: 10px;" for="Description">Description <span class="text text-red">*</span></label>
                                 <textarea  name="description" class="form-control summernoteExample" id="summernoteExample"  rows="6"></textarea>
                                </div>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a href="/product" class='btn btn-danger'>Cancel</a>
                      </form>
                      <!-- End Form -->
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