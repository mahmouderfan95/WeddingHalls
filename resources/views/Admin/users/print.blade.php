<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    @include('layouts.Admin.head_css')
    @yield('css')
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
      <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">العملاء</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- search form -->
                <!-- search form -->
            </div>
            <div class="content-body">
                <section >
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">العملاء</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered " id="companies-table" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الاسم</th>
                                                        <th>البريد الالكترونى</th>
                                                        <th>تاريخ الاضافة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($users->count() > 0)
                                                        @foreach($users as $index => $admin)
                                                            <tr>
                                                                <td>{{$index + 1}}</td>
                                                                <td>{{$admin->name ?? '-'}}</td>
                                                                <td>{{$admin->email ?? '-'}}</td>
                                                                <td>{{$admin->created_at->format('d/m/Y') ?? '-'}}</td>

                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @php
        echo "<script> window.print() </script>"
    @endphp
</body>
