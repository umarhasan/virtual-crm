@extends('layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.css" rel="stylesheet">
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
                <h1>Create New Leads</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Create New Leads</li>
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
                      <form method="post" action="{{ route('leads.store') }}">
                          @csrf
                          <!-- 1st row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control" required placeholder="Name">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Source:</label>
                                <select name="source" class="form-control">
                                @foreach ($LeadSources as $leadSource)
                                  <option value="{{ $leadSource->id }}">{{ $leadSource->name }}</option>
                                @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <!-- 2nd Row -->
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Company Name:</label>
                                  <input type="text" name="company_name" placeholder="Company Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Position:</label>
                                <input type="text" name="position" class="form-control" placeholder="Position">
                              </div>
                            </div>
                           </div>
                          <!-- 3rd Row -->
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Status:</label>
                                  <select name="status" class="form-control">
                                  @foreach ($leadStatus as $leads)
                                    <option value="{{ $leads->id }}">{{ $leads->name }}</option>
                                  @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Member:</label>
                                <select name="member" class="form-control">
                                @foreach ($MemberUser as $user_member)
                                    <option value="{{ $user_member->id }}">{{ $user_member->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <!-- 4th Row -->
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Phone:</label>
                                  <input type="text" name="phone" placeholder="Phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Website:</label>
                                <input type="text" name="website" placeholder="Website" class="form-control">
                              </div>
                            </div>
                          </div>
                          <!-- 5th Row -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Country:</label>
                                <input type="text" name="country" placeholder="Country" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tags:</label>
                                <input type="text" name="tags" placeholder="Tags" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Default Language:</label>
                                <input type="text" name="default_language" placeholder="Default Language" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                              Public: &nbsp;<input type="checkbox" name="public" id="publicCheckbox">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                              Contacted Today: &nbsp;<input type="checkbox" name="contacted_today" id="contactedTodayCheckbox">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label style="margin-top: 10px;" for="Project">Description <span class="text text-red">*</span></label>
                                <textarea  name="description" class="form-control summernoteExample" id="summernoteExample"  rows="6"></textarea> 
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#description').summernote({
      height: 200, // Adjust the height as needed
      // Add other options as needed
    });
  });
</script>
@endsection
