@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        USER PROFILE
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    @if(session()->has('message'))
        <div class="alert alert-success" id="success-msg">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="list-style: none;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @foreach($profileDetails as $profile)
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/uploads/{{ $profile->image }}" style="width: 100px; height: 100px;" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $profile->name }}</h3>

              <p class="text-muted text-center">User</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>User Name</b> <a class="pull-right">{{ $profile->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $profile->email }}</a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
           
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Profile Picture</a></li>
              <li><a href="#settings" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="/uploads/{{ $profile->image }}" style="width: 200px; height: 200px;" alt="user image">
                  </div>
                  <!-- /.user-block -->
                  
                  {{ Form::open(['url' => '/profile', 'files' => 'true', 'class'=>'form-horizontal']) }}
                    {{ Form::hidden('user_id', $profile->user_id)}}
                        <div class="box-body">
                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label">Upload Picture</label>
                              <div class="col-sm-6">
                                {{ Form::file('image',null,['required','class'=>'form-control']) }}
                              </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-sm-4 pull-left">
                                <button type="submit" class="btn btn-info pull-right">Upload</button>
                            </div>
                        </div>
                          <!-- /.box-body -->
                    {{ Form::close() }}
                </div>
              </div>

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="/profile/changepass" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Current Password</label>

                    <div class="col-sm-10">
                      <input type="password" name="curpass" class="form-control" placeholder="Current Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputpass" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-10">
                      <input type="password" name="newpass" class="form-control" placeholder="New Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputpass" class="col-sm-2 control-label">Confirm Password</label>

                    <div class="col-sm-10">
                      <input type="password" name="confirmpass" class="form-control" placeholder="Confirm Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    @endforeach
    </section>
    <!-- /.content -->
  </div>

@endsection