@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Contact List</li>
        </ol>
    </section>
    <br/><br/><div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <!-- <div class="panel panel-default">
                    <div class="panel-heading">CONTACT LIST </div>
                    <br/><br/> -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">CONTACT LIST</h3>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-success" id="success-msg">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @if ($contacts->isEmpty())
                            <p> Currently, there is no contacts!</p>
                        @else
                        <table class="table" id="contactsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td align="left">{{ $contact->contact_id }} </td>
                                        <td align="left">{{ $contact->fname}}</td>
                                        <td align="left">{{ $contact->lname}}</td>
                                        <td align="left">{{ $contact->phone}}</td>
                                        <td align="left">{{ $contact->address}}</td>
                                        <td align="left">
                                            <a href="{{ url('./editcontact', $contact->contact_id) }}" class="btn btn-primary">Edit</a>
                                            <!-- <a href="{{ url('Auth\ContactController@delete', $contact->contact_id) }}" class="btn btn-danger">Delete</a> -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default-{{ $contact->contact_id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    
                </div>
            </div>
        </div>
    </div>
    @foreach($contacts as $contact)
    <div class="modal fade" id="modal-default-{{ $contact->contact_id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Contact</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this contact ?</p>
            </div>
            <div class="modal-footer">

              <form method="POST" action="{{ url('./contactlist') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="contact_id" value="{{ $contact->contact_id }}">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">
                      <i class="fa fa-times-circle"></i> Yes
                    </button>
              </form>
              <!-- <button type="button" id="deleteProduct" class="btn btn-primary pull-left"> &nbsp; Yes &nbsp; </button> -->
               
              <!-- <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    @endforeach
</div>
@endsection