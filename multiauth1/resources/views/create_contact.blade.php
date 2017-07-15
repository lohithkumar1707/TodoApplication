@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Contact</li>
      </ol>
  </section>
  <br/><br/>

  <div class="container-fluid">

      <div class="row">
          <div class="col-md-12">
              <!-- <div class="panel panel-default">
                  <div class="panel-heading">CREATE CONTACT </div>
                  <br/><br/> -->
                  
                  <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">CONTACT FORM</h3>
                      </div>

                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li style="list-style: none;">{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif

                      <!-- /.box-header -->
                      <!-- form start -->
                      {{ Form::open(['url' => '/addcontact', 'class'=>'form-horizontal']) }}
                        <div class="box-body">
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-6">
                              {{ Form::text('fname', null, ['required','class'=>'form-control', 'placeholder'=>'First Name']) }}
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-6">
                              {{ Form::text('lname', null, ['required','class'=>'form-control', 'placeholder'=>'Last Name']) }}
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-6">
                              {{ Form::text('phone', null, ['required','class'=>'form-control', 'placeholder'=>'Phone']) }}
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-6">
                              {{ Form::textarea('address', null, ['required','class'=>'form-control', 'placeholder'=>'Address', 'rows'=> '3']) }}
                            </div>
                          </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                          <div class="col-sm-6">
                              <button type="submit" class="btn btn-info pull-right">Submit</button>
                          </div>
                          <input type="reset" value ="Reset" onClick="return confirm('Are you sure you want to reset the form?')" class="btn btn-default">
                        </div>
                        <!-- /.box-footer -->
                      {{ Form::close() }}
                  </div>
                  
              <!-- </div> -->
          </div>
      </div>
  </div>
</div>

@endsection