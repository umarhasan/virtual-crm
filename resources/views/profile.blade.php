@extends('layouts.app')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Profile Update</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Profile Update</li>
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
              <div class="text-center">
                <img src="{{ asset('uploads/user/' . auth()->user()->image) }}" alt="" class="rounded-circle" style="width: 100px; height: 100px;">
              </div>
            </div>
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                  <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                          <label>Name:</label>
                          <input class="form-control" name="name" value="{{ auth()->user()->name }}" type="text">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                          <label>Email:</label>
                          <input class="form-control" name="email" value="{{ auth()->user()->email }}" type="text">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                          <label>Phone Number:</label>
                          <input class="form-control" type="phonenumber" name="phone_number" value="{{ auth()->user()->phone }}" >
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                          <label>Address:</label>
                          <input class="form-control" name="address" type="text" value="{{ auth()->user()->address }}">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <label>Image:</label>
                          <input type="file" name="profile" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
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