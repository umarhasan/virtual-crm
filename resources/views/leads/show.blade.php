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
                <h1>Leads View</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Leads View</li>
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
                  <div class="card-header">
                    <h3 class="card-title">Leads View Details</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                                <p><strong>Lead Name:</strong> {{ $Leads->name }}</p>
                                <p><strong>Company:</strong> {{ $Leads->company_name }}</p>
                                <p><strong>Lead Phone:</strong> {{ $Leads->phone }}</p>
                                <p><strong>Country:</strong> {{ $Leads->country }}</p>
                                <p><strong>Website:</strong> {{ $Leads->website }}</p>
                            
                            </div>
                            <div class="col-md-6">
                                <p><strong>Position:</strong> {{ $Leads->position }}</p>
                                <p><strong>Source:</strong> {{ $Leads->Source->name }}</p>
                                <p><strong>Status:</strong> {{ $Leads->Status->name }}</p>
                              
                                <p><strong>Tags:</strong> {{ $Leads->tags }}</p>
                                <p><strong>Language:</strong> {{ $Leads->default_language }}</p>
                            </div>
                        </div>
                      </div>
                    <div class="card-footer">
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Dashboard</a>
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
 