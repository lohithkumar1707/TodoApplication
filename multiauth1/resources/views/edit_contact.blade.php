@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Contact</li>
      </ol>
  </section>
  <br/><br/><div class="container-fluid">

      <div class="row">
          <div class="col-md-12">
              <!-- <div class="panel panel-default">
                  <div class="panel-heading">EDIT CONTACT </div>
                  <br/><br/> -->
                  
                  <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">EDIT CONTACT FORM</h3>
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
                      {{ Form::open(['url' => '/editcontact', 'class'=>'form-horizontal']) }}

                        @foreach ($contactDetails as $contact)
                        {{ Form::hidden('contact_id', $contact->contact_id)}}
                          <div class="box-body">
                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label">First Name</label>
                              <div class="col-sm-6">
                                {{ Form::text('fname', $contact->fname, ['required','class'=>'form-control', 'placeholder'=>'First Name']) }}
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label">Last Name</label>
                              <div class="col-sm-6">
                                {{ Form::text('lname', $contact->lname, ['required','class'=>'form-control', 'placeholder'=>'Last Name']) }}
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label">Phone</label>
                              <div class="col-sm-6">
                                {{ Form::text('phone', $contact->phone, ['required','class'=>'form-control', 'placeholder'=>'Phone']) }}
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label">Address</label>
                              <div class="col-sm-6">
                                {{ Form::textarea('address', $contact->address, ['required','class'=>'form-control', 'placeholder'=>'Address', 'rows'=> '3']) }}
                              </div>
                            </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                          </div>
                        @endforeach
                        <!-- /.box-footer -->
                      {{ Form::close() }}
                  <!-- </div> -->
                  
              </div>
          </div>
      </div>
  </div>
</div>
@endsection