<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Virtue CRM</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('/admin')}}/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="{{asset('/admin')}}/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{asset('/admin')}}/vendors/css/vendor.bundle.addons.css">
  
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('/admin')}}/css/style.css">
  <!-- toastr -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/admin')}}/vendors/summernote/dist/summernote-bs4.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="http://www.urbanui.com/" />
  
    <!-- Gallery -->
    <link rel="stylesheet" href="{{asset('/admin')}}/vendors/lightgallery/css/lightgallery.css">
  <style>
 .sidebar .nav .nav-item.active > .nav-link:hover i,.sidebar .nav .nav-item.active > .nav-link:hover span  {
    color: #222b34 !important;
}


.sidebar .nav:not(.sub-menu) > .nav-item:hover:not(.nav-profile) > .nav-link {
    background: #f6f6f6;
    color: #222b34;
}

.sidebar .nav .nav-item .nav-link:hover i.menu-icon{
    color:#222b34;
}

.sidebar .nav .nav-item .nav-link:hover i.menu-arrow:before{
    color:#222b34;
}
.sidebar .nav .nav-item .nav-link i.menu-arrow:before{
    color:#f6f6f6;
}
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index-2.html"><img src="{{asset('/admin')}}/images/logo/logo.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="{{asset('/admin')}}/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item nav-search d-none d-md-flex">
            <div class="nav-link">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-flex">
            <a class="nav-link" href="#">
              <span class="btn btn-primary">+ Create new</span>
            </a>
          </li>
          <li class="nav-item dropdown d-none d-lg-flex">
            <div class="nav-link">
              <span class="dropdown-toggle btn btn-outline-dark" id="languageDropdown" data-toggle="dropdown">English</span>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item font-weight-medium" href="#">
                  French
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-medium" href="#">
                  Espanol
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-medium" href="#">
                  Latin
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-medium" href="#">
                  Arabic
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="fas fa-bell mx-0"></i>
              <span class="count">16</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 16 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-danger">
                    <i class="fas fa-exclamation-circle mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="fas fa-wrench mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="far fa-envelope mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium">New user registration</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-envelope mx-0"></i>
              <span class="count">25</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('/admin')}}/images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('/admin')}}/images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('/admin')}}/images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('/admin')}}/images/faces/face5.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="fas fa-cog text-primary"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{url('/logout')}}" class="dropdown-item">
                <i class="fas fa-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close fa fa-times"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close fa fa-times"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task-todo">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="{{asset('/admin')}}/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('/admin')}}/images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('/admin')}}/images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('/admin')}}/images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('/admin')}}/images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('/admin')}}/images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="{{asset('/admin')}}/images/faces/face5.jpg" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  Welcome {{auth::user()->name}}
                </p>
                <!-- <p class="designation">
                  Super Admin
                </p> -->
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard')}}">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @can('role-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Manage Roles</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('roles.index')}}">List Roles</a></li>
                @can('role-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('roles.create')}}">Add Role</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan
          @can('permission-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#permission-layouts" aria-expanded="false" aria-controls="permission-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Permission List</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="permission-layouts">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item"> <a class="nav-link" href="{{route('permission.index')}}">List Permission</a></li>
                @can('permission-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('permission.create')}}">Add Permission</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan
          @can('attendance-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#attendance-layouts" aria-expanded="false" aria-controls="attendance-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Attendance</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="attendance-layouts">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item"> <a class="nav-link" href="{{route('attendance.index')}}">List Attendance</a></li>
                @can('attendance-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('attendance.create')}}">Add Attendance</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan
          @can('leads-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#leads-layouts" aria-expanded="false" aria-controls="leads-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Leads</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="leads-layouts">
                <ul class="nav flex-column sub-menu">
                  @can('leads-status-list')
                    <li class="nav-item"> <a class="nav-link" href="{{route('leadStatus.index')}}">Leads Status</a></li>
                  @endcan
                  @can('leads-sources-list')
                    <li class="nav-item"><a class="nav-link" href="{{route('leadSources.index')}}">Lead Sources</a></li>
                  @endcan
                  @can('leads-list')
                    <li class="nav-item"> <a class="nav-link" href="{{route('leads.index')}}">Leads</a></li>
                  @endcan
                  @can('leads-pick')
                  <li class="nav-item"><a class="nav-link" href="{{route('leads.pick')}}">Leads Pick</a></li>
                  @endcan
                  @can('leads-invoice')
                  <li class="nav-item"><a class="nav-link" href="{{route('leads.invoice')}}">Leads Invoice</a></li>
                  @endcan
                </ul>
            </div>
          </li>
          @endcan
          @can('user-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-layouts" aria-expanded="false" aria-controls="user-layouts">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Manage Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('users.index')}}">List Users</a></li>
                @can('user-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('users.create')}}">Add User</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan
          @can('package-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#package-layouts" aria-expanded="false" aria-controls="package-layouts">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Package List</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="package-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('package.index')}}">List Package</a></li>
                @can('package-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('package.create')}}">Add Package</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan
          @can('shift-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#shift-layouts" aria-expanded="false" aria-controls="shift-layouts">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Manage Shift</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="shift-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('shift.index')}}">List Shift</a></li>
                @can('shift-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('shift.create')}}">Add Shift</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan
          @can('leaves-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#leaves-layouts" aria-expanded="false" aria-controls="leaves-layouts">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Manage leaves</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="leaves-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('leaves.index')}}">List leaves</a></li>
                @can('leaves-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('leaves.create')}}">Add leaves</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan
          @can('department-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#department-layouts" aria-expanded="false" aria-controls="department-layouts">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Manage department</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="department-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('department.index')}}">List Department</a></li>
                @can('department-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('department.create')}}">Add Department</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan        
          @can('client-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#client-layouts" aria-expanded="false" aria-controls="client-layouts">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Manage Client</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="client-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('client.index')}}">List Client</a></li>
                @can('client-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('client.create')}}">Add Client</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan
          @can('project-list')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#project-layouts" aria-expanded="false" aria-controls="project-layouts">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Manage Projects</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="project-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('project.index')}}">List Project</a></li>
                @can('project-create')
                <li class="nav-item"> <a class="nav-link" href="{{route('project.create')}}">Add Project</a></li>
                @endcan
              </ul>
            </div>
          </li>
          @endcan
          @can('mail-inbox')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#mail-layouts" aria-expanded="false" aria-controls="mail-layouts">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Mailbox</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="mail-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('mail.index')}}">Mail</a></li>
              </ul>
            </div>
          </li>
          @endcan

          <li class="nav-item">
              <a href="{{url('/logout')}}" class="nav-link">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">Logout</span>
              </a>  
          </li>

        </ul>
      </nav>
      <!-- partial -->
      @yield('content')
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  <!-- plugins:js -->
  <script src="{{asset('/admin')}}/vendors/js/vendor.bundle.base.js"></script>
  <script src="{{asset('/admin')}}/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('/admin')}}/js/off-canvas.js"></script>
  <script src="{{asset('/admin')}}/js/hoverable-collapse.js"></script>
  <script src="{{asset('/admin')}}/js/misc.js"></script>
  <script src="{{asset('/admin')}}/js/settings.js"></script>
  <script src="{{asset('/admin')}}/js/todolist.js"></script>
  <!-- endinject -->
    <!-- Gallery-->
    <script src="{{asset('/admin')}}/vendors/lightgallery/js/lightgallery-all.min.js"></script>
    <script src="{{asset('/admin')}}/js/light-gallery.js"></script>
  <!-- Custom js for this page-->
  <script src="{{asset('/admin')}}/js/dashboard.js"></script>
  <!--Data table-->
  <script src="{{asset('/admin')}}/js/data-table.js"></script>
  <!-- Summernote -->
  <script src="{{asset('/admin')}}/vendors/summernote/dist/summernote-bs4.min.js"></script>
    <!-- select 2 -->
    <script src="{{asset('/admin')}}/js/select2.js"></script>
  <script src="{{asset('/admin')}}/js/file-upload.js"></script>
  <script src="{{asset('/admin')}}/js/typeahead.js"></script>
  <!-- toastr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

</script>
<script>

  $('.summernoteExample').summernote();
</script>
@stack('js')
</body>
<script>
function assign_users(){
  $.ajax({
    url: "{{route('user.fetch')}}",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      jQuery.each(data.users, function(index, item) 
      {
          $('<option/>').val(item.id).text(item.name).appendTo('#assign_user');
      });
    }
  });
}

function assign_clients(){
  $.ajax({
    url: "{{route('clients.fetch')}}",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      jQuery.each(data.clients, function(index, item) 
      {
          $('<option/>').val(item.id).text(item.company_name).appendTo('#assign_client');
      });
    }
  });
}

function assign_projects(){
  $.ajax({
    url: "{{route('projects.fetch')}}",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      jQuery.each(data.projects, function(index, item) 
      {
          $('<option/>').val(item.id).text(item.name).appendTo('#assign_project');
      });
    }
  });
}


assign_users();
assign_clients();
assign_projects();


</script>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    //   $(function() {
    //     $(".imageListId").sortable({
    //         update: function(event, ui) {
    //                 getIdsOfImages();
    //             } //end update       
    //     });
    // });
 
    // function getIdsOfImages() {
    //     var values = [];
    //     $('.wrapper').each(function(index) {
    //         values.push($(this).attr("item-id")
    //                     .replace("imageNo", ""));
    //     });
    // }
  $( function() {
    $( ".new-item-drop, .complete-item-drop, .process-item-drop, .test-item-drop" ).sortable({
      connectWith: ".connectedSortable",
      opacity: 0.5,
      receive: function(event, ui) {
                    // $(".container").css("background-color", "red");
            }
    }).disableSelection();

    $( ".connectedSortable" ).on( "sortupdate", function( event, ui ) {
        var panddingArr = [];
        var completeArr = [];

        $(".new-item-drop #wrapper").each(function( index ) {
          panddingArr[index] = $(this).attr('item-id');
        });
        $(".process-item-drop #wrapper").each(function( index ) {
          panddingArr[index] = $(this).attr('item-id');
        });
        $(".test-item-drop #wrapper").each(function( index ) {
          panddingArr[index] = $(this).attr('item-id');
        });

        $(".complete-item-drop #wrapper").each(function( index ) {
          completeArr[index] = $(this).attr('item-id');
        });

        /* $.ajax({
            url: "{{ route('task.update',1) }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {panddingArr:panddingArr,completeArr:completeArr},
            success: function(data) {
              console.log('success');
            }
        }); */
          
    });
  });
</script>
</html>