@extends('layouts.Admin.mastar')
@section('title','العملاء')
@section('css')
@endsection
@section('content')
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
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm mb-3">اضافة عميل جديد</a>
                    </div>
                    {{--  <div target="_blank" class="btn-group float-md-right mr-1">
                        <a href="{{ route('users.print') }}" class="btn btn-primary btn-sm mb-3">طباعة العملاء</a>
                    </div>  --}}
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
                                            <!-- search form -->
                                            <form action="" method="GET">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="search" value="{{request()->get('search')}}" placeholder="ابحث بالاسم">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group mb-3">
                                                            <input type="email" class="form-control" name="email" value="{{request()->get('email')}}" placeholder="ابحث بالبريد الالكترونى">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group mb-3">
                                                            <input type="date" class="form-control" name="created_at" value="{{request()->get('created_at')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit">بحث</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- end search form -->
                                            <table class="table table-striped table-bordered " id="companies-table" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الاسم</th>
                                                        <th>البريد الالكترونى</th>
                                                        <th>الهاتف</th>
                                                        <th>الرقم القومى</th>
                                                        <th>العنوان</th>
                                                        <th>تاريخ الاضافة</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($users->count() > 0)
                                                        @foreach($users as $index => $admin)
                                                            <tr>
                                                                <td>{{$index + 1}}</td>
                                                                <td>{{$admin->name ?? '-'}}</td>
                                                                <td>{{$admin->email ?? '-'}}</td>
                                                                <td>{{$admin->phone ?? '-'}}</td>
                                                                <td>{{$admin->national_id ?? '-'}}</td>
                                                                <td>{{$admin->address ?? '-'}}</td>
                                                                <td>{{$admin->created_at->format('d/m/Y') ?? '-'}}</td>
                                                                <td>
                                                                    <a href="{{ route('users.edit',$admin->id) }}" class="btn btn-info btn-sm">
                                                                        <i class="icon-pencil"></i>
                                                                    </a>
                                                                    <button type="button" class="btn btn-btn btn-danger btn-sm " data-toggle="modal" data-target="#delete{{ $admin->id }}">
                                                                        <i class="fa fa-trash"></i>
                                                                        <i class="icon-trash"></i>
                                                                    </button>
                                                                    <form action="{{ route('users.destroy', $admin->id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;" autocomplete="off">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <!-- Modal -->
                                                                                <div class="modal animated flipInY text-left" id="delete{{ $admin->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h4 class="modal-title" id="myModalLabel62">   حذف</h4>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                                <input type="hidden" value="{{ $admin->id }}">
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <h5>warning</h5>

                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"> Close</button>
                                                                                                <button type="submit" class="btn btn-outline-primary"> Save</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                            {{$users->links("pagination::bootstrap-4")}}
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
@endsection
