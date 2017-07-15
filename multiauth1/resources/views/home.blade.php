@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <br/><br/>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">USER Dashboard</h3>
                    </div>

                    <div class="panel-body">
                        <div id="success-msg">
                            @component('components.who')

                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
