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
                <h1>Leads Invoice</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Leads Invoice</li>
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
                    <h3 class="card-title">Leads Invoice Details</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>User Information</h5>
                                <p><strong>Name:</strong> {{ $invoice->users->name }}</p>
                                <p><strong>Email:</strong> {{ $invoice->users->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Lead Information</h5>
                                <p><strong>Lead Name:</strong> {{ $invoice->leads->name }}</p>
                                <p><strong>Lead Phone:</strong> {{ $invoice->leads->phone }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5>Invoice Details</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Amount</th>
                                <th>Created at</th>
                                
                            </tr>
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                            
                        </table>
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
 