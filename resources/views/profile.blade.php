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
                <h1>Edit profile</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit profile</li>
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
        
                  <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <label>Name:</label>
                                <input class="form-control" value="{{ $user->name }}" name="name" type="text" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <label>Email:</label>
                                <input class="form-control"  value="{{ $user->email }}" name="email" type="text" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <input class="form-control" value="{{ $user->phone }}" type="phonenumber" name="phone_number" >
                                </div>
                            </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <label>Address:</label>
                                <input class="form-control"  value="{{ $user->address }}" name="address" type="text" >
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <label>Image:</label>
                                <input  type="file" name="image" class="form-control" value="{{ $user->image }}">
                            </div>
                        </div>
                        

                               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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





    
