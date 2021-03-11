@extends('user.layout.app')
@php($c = App\Visitors::count())
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Mini Blog</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h5 class="page-title">Dashboard</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cube-outline float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">TOTAL VISITORS</h6>
                    </div>
                    <div class="card-body">
                            <b>{{ $c }}</b>
                        <div class="mt-4 text-muted">
                            <p class="m-0"></p>
                            {{--  <h5 class="m-0">1456<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>  --}}

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->

        
    </div><!-- container fluid -->
@endsection
