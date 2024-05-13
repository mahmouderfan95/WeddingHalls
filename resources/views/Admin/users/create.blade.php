@extends('layouts.Admin.mastar')
@section('title','اضافة مستخدم جديد')
@section('css')
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">اضافة مستخدم جديد </h4>
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
                                    <div class="card-body">
                                        <form  class="form" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                                <input type="hidden" name="type" value="user">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name">الاسم</label>
                                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required>
                                                            </div>
                                                            @error('name')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>البريد الالكترونى</label>
                                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email">
                                                            </div>
                                                            @error('email')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>كلمة السر</label>
                                                                <input type="password" class="form-control" name="password" placeholder="password">
                                                            </div>
                                                            @error('password')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>الهاتف المحمول</label>
                                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="phone">
                                                            </div>
                                                            @error('phone')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>العنوان</label>
                                                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="address">
                                                            </div>
                                                            @error('address')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>الرقم القومى</label>
                                                                <input type="text" class="form-control" name="national_id" value="{{ old('national_id') }}" placeholder="national_id">
                                                            </div>
                                                            @error('national_id')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i>  حفظ
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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
