@extends('layouts.Admin.mastar')
@section('title','لوحة التحكم')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Revenue, Hit Rate & Deals -->
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="{{ route('users.index') }}">
                                            <div class="media-body text-left">
                                                <h3 class="info">{{ \App\Models\User::Customer()->count() }}</h3>
                                                <h6>العملاء</h6>
                                            </div>
                                            <div>
                                                <i class="icon-users success font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{--  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="{{ route('wedding-halls.index') }}">
                                            <div class="media-body text-left">
                                                <h3 class="warning">{{ \App\Models\WeddingHall::count() }}</h3>
                                                <h6>قاعات الافراح</h6>
                                            </div>
                                            <div>
                                                <i class="icon-bar-chart warning font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="{{ route('wedding-halls-categories.index') }}">
                                            <div class="media-body text-left">
                                                <h3 class="success">{{ \App\Models\WeddingHallCategory::count() }}</h3>
                                                <h6>اقسام قاعات الافراح</h6>
                                            </div>
                                            <div>
                                                <i class="icon-docs info font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="#">
                                            <div class="media-body text-left">
                                                <h3 class="success">{{ \App\Models\User::Admin()->count() }}</h3>
                                                <h6>المستخدمين</h6>
                                            </div>
                                            <div>
                                                <i class="icon-users info font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="{{ route('wedding-halls-booking.index') }}">
                                            <div class="media-body text-left">
                                                <h3 class="success">{{ \App\Models\WeddingHallBooking::count() }}</h3>
                                                <h6>عدد الحجوزات</h6>
                                            </div>
                                            <div>
                                                <i class="icon-docs info font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="{{ route('wedding-halls-booking.index') }}">
                                            <div class="media-body text-left">
                                                <h3 class="success">{{ \App\Models\WeddingHallBooking::sum('profit') . 'ج م ' }}</h3>
                                                <h6>مجموع الارباح</h6>
                                            </div>
                                            <div>
                                                <i class="icon-docs info font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
