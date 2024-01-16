@extends('layouts.app')

@section('page-title')
Create Leads Sources
@endsection

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Create Leads Sources</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Create Leads Sources</li>
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
                  <form name="leadStatusForm" id="leadStatusForm" method="POST" action="{{ route('leadSources.store') }}">
                      @csrf
                      <div class="box box-primary">
                          <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                      <strong>Name:</strong>
                                      <input type="text" name="name" class="form-control" placeholder="Lead Sources Name">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="reset" onclick="window.location='{{ URL::previous() }}'" class="btn btn-danger">Cancel</button>
                      </div>
                  </form>

            </div>
          </div> 
        </div>   
      </section>
    </div>
  </div>

@endsection