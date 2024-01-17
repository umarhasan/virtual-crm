@extends('layouts.app')


@section('content')
<style>
  /* Custom styles for the button */
.btn-view {
    font-size: 14px; /* Adjust the font size as needed */
}

/* Custom styles for the status */
.status-badge {
    font-size: 12px; /* Adjust the font size as needed */
    padding: 6px 8px; /* Adjust the padding as needed */
}
</style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Leads convert Invoice</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Leads convert Invoice</li>
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
                    <h3 class="card-title">Leads convert Invoice List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>users</th>
                          <th>Leads</th>
                          <th>Phone</th>
                          <th>Comments</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                      <tbody>
                        @if($lead_accepted)
                            @php $i=0; @endphp
                              @foreach($lead_accepted as $lead)
                                @php $i++; @endphp    
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $lead->users->name }}</td>
                                    <td>{{ $lead->leads->name }}</td>
                                    <td>{{ $lead->leads->phone }}</td>
                                    <td>{!! $lead->comment !!}</td>
                                    <td><span style="color:#156731;font-weight:bold;font-size:15px">{{ $lead->status }}</span></td>
                                    <td>
                                        <a href="{{ route('leads.invoice.show', $lead->lead_id) }}" class="btn btn-warning btn-sm btn-view">View</a>
                                    </td>
                                  </tr>
                              @endforeach
                        @endif  
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
 