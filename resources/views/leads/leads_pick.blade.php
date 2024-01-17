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
                <h1>Leads Pick</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Leads Pick</li>
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
                    <h3 class="card-title">Leads Pick List</h3>
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
                        @php $i=0; @endphp
                          @foreach($lead_pick as $lead)
                          @php $i++; @endphp    
                          <tr>
                                  <td>{{ $i }}</td>
                                  <td>{{ $lead->users->name }}</td>
                                  <td>{{ $lead->leads->name }}</td>
                                  <td>{{ $lead->leads->phone }}</td>
                                  @if(isset($lead) && $lead->status == 'pending')
                                  <td>{!! $lead->comment !!}</td>
                                    <td><span class="btn btn-warning btn-sm">{{ $lead->status }}</span></td>
                                  @elseif($lead->status == 'rejected')
                                  <td>{!! $lead->comment !!}</td>
                                    <td><span class="btn btn-danger btn-sm">{{ $lead->status }}</span></td>
                                  
                                    @else
                                    <td>{!! $lead->comment !!}</td>
                                    <td><span class="btn btn-primary btn-sm">{{ $lead->status }}</span></td>
                                  
                                  @endif
                                
                                  <td>
                                  <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#leadModal" data-lead-id="{{ $lead->leads->id }}" data-name="{{ $lead->leads->name }}" data-phone="{{ $lead->leads->phone }}">Leads Mark Convert</a>
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


<!-- Modal -->
<div class="modal fade" id="leadModal" tabindex="-1" role="dialog" aria-labelledby="leadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="leadModalLabel">Lead Details</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="{{ route('leads.mark.convert') }}">
            @csrf
            <div class="modal-body">
                <div class="mb-6">
                    <label for="status" class="form-label">Name:</label>
                    <span style="margin:100px" id="leadName"></span>
                    <input type="hidden" name="lead_id" id="lead_Id">
                    <input type="hidden" name="lead_name" id="lead_Name">
                </div>
                <div class="mb-6">
                    <label for="status" class="form-label">Phone:</label>
                    <span style="margin:100px" id="leadPhone"></span>
                    <input type="hidden" name="lead_phone" id="lead_Phone">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">--Select Status--</option>
                        <option value="pending">Pending</option>
                        <option value="rejected">Rejected</option>
                        <option value="accepted">Accepted</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lead_comment" class="form-label">Comments:</label>
                    <!-- <textarea name="lead_comment" id="lead_comment" class="form-control" rows="3"></textarea> -->
                    <textarea  name="lead_comment" class="form-lead_comment summernoteExample" id="summernoteExample"  rows="6"></textarea> 
                  </div>
                <div class="mb-3">
                    <label for="lead_amount" class="form-label">Amounts:</label>
                    <textarea type="number" name="lead_amount" id="lead_amount" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save</button>
            </div>
        </form>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function () {
    $('#order-listing').on('click', '.btn-primary', function () {
      var leadId = $(this).data('lead-id');
      var leadName = $(this).data('name');
      var leadPhone = $(this).data('phone');
     
      // Populate the modal with lead details
      $('#leadName').text(leadName);
      $('#leadPhone').text(leadPhone);

      $('#lead_Id').val(leadId);
      $('#lead_Name').val(leadName);
      $('#lead_Phone').val(leadPhone);

      // Show the modal
      $('#leadModal').modal('show');
    });
  });
</script>

 
@endsection
 