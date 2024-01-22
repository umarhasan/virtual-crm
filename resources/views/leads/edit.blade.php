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
                    <h1>Edit Lead</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Lead</li>
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
                    <form method="post" action="{{ route('leads.update', $lead->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- 1st row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $lead->name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Source:</label>
                                    <select name="source" class="form-control">
                                        @foreach ($LeadSources as $leadSource)
                                            <option value="{{ $leadSource->id }}" {{ old('source', $lead->source) == $leadSource->id ? 'selected' : '' }}>
                                                {{ $leadSource->name }}
                                            </option>
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
                                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $lead->company_name) }}" placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position:</label>
                                    <input type="text" name="position" class="form-control" value="{{ old('position', $lead->position) }}" placeholder="Position">
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
                                            <option value="{{ $leads->id }}" {{ old('status', $lead->status) == $leads->id ? 'selected' : '' }}>
                                                {{ $leads->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Member:</label>
                                    <select name="member" class="form-control">
                                        @foreach ($MemberUser as $user_member)
                                            <option value="{{ $user_member->id }}" {{ old('member', $lead->user_member_id) == $user_member->id ? 'selected' : '' }}>
                                                {{ $user_member->name }}
                                            </option>
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
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $lead->phone) }}" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website:</label>
                                    <input type="text" name="website" class="form-control" value="{{ old('website', $lead->website) }}" placeholder="Website">
                                </div>
                            </div>
                        </div>
                        <!-- 5th Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country:</label>
                                    <input type="text" name="country" class="form-control" value="{{ old('country', $lead->country) }}" placeholder="Country">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tags:</label>
                                    <input type="text" name="tags" class="form-control" value="{{ old('tags', $lead->tags) }}" placeholder="Tags">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Default Language:</label>
                                    <input type="text" name="default_language" class="form-control" value="{{ old('default_language', $lead->default_language) }}" placeholder="Default Language">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea name="description" class="form-control" placeholder="Description...">{{ old('description', $lead->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    Public: &nbsp;<input type="checkbox" name="public" id="publicCheckbox" {{ old('public', $lead->public) ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    Contacted Today: &nbsp;<input type="checkbox" name="contacted_today" id="contactedTodayCheckbox" {{ old('contacted_today', $lead->contacted_today) ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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