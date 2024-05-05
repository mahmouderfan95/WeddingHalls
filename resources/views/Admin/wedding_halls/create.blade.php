@extends('layouts.Admin.mastar')
@section('title', 'اضافة قاعة جديد')
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
                                    <h4 class="card-title" id="basic-layout-form">اضافة قاعة جديد </h4>
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
                                        <form class="form" action="{{ route('wedding-halls.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">الاسم</label>
                                                            <input id="name" type="text" class="form-control"
                                                                name="name" value="{{ old('name') }}"
                                                                placeholder="Name" required>
                                                        </div>
                                                        @error('name')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="image">الصورة</label>
                                                            <input id="image" type="file" class="form-control"
                                                                name="image"required>
                                                        </div>
                                                        @error('image')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="price">السعر</label>
                                                            <input id="price" type="number" class="form-control"
                                                                name="price" value="{{ old('price') }}"
                                                                placeholder="price" required>
                                                        </div>
                                                        @error('name')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="price">قسم القاعة</label>
                                                            <select id="wedding_hall_category_id" class="form-control" name="wedding_hall_category_id">
                                                                @foreach ($weddingHallCategories as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('name')
                                                            <p class="text-danger" style="font-size: 12px">{{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> حفظ
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
