@extends('admin.layouts.master')

@section('title')
    Thêm bệnh
@endsection

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Thêm Bệnh</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bệnh</a></li>
                            <li class="breadcrumb-item active">Thêm bệnh</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @if ($errors->any())
            <div class="alert alert-danger">Đã có lỗi nhập liệu. Vui lòng kiểm tra lại!</div>
        @endif

        <form id="create-disease-form" method="POST" action="{{ route('admin.diseases.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Cột chính bên trái -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Thông tin chung</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="name">Tên bệnh</label>
                                <input type="text" class="form-control" id="name" name="disease_name"
                                    value="{{ old('disease_name') }}">
                                @error('disease_name')
                                    <span class="d-block text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="symptom">Triệu chứng</label>
                                <textarea class="form-control" id="symptom" name="symptom">{{ old('symptom') }}</textarea>
                                @error('symptom')
                                    <span class="d-block text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="treatment_direction">Hướng điều trị</label>
                                <textarea class="form-control" id="treatment_direction" name="treatment_direction">{{ old('treatment_direction') }}</textarea>
                                @error('treatment_direction')
                                    <span class="d-block text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cột bên phải -->
                <div class="col-lg-4">
                    <!-- Card cho Mức độ nguy hiểm -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Mức độ nguy hiểm</h5>
                        </div>
                        <div class="card-body">
                            <select class="form-select" id="danger_level" name="danger_level">
                                <option value="low" {{ old('danger_level') == 'low' ? 'selected' : '' }}>Thấp</option>
                                <option value="medium" {{ old('danger_level') == 'medium' ? 'selected' : '' }}>Trung bình</option>
                                <option value="high" {{ old('danger_level') == 'high' ? 'selected' : '' }}>Cao</option>
                            </select>
                        </div>
                    </div>

                    <!-- Card cho Ảnh đại diện -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Ảnh đại diện</h5>
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control" id="feature_img" name="feature_img"
                                accept="image/png, image/gif, image/jpeg, image/jpg">
                            @error('feature_img')
                                <span class="d-block text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nút Lưu bệnh -->
            <div class="text-end mb-3">
                <a href="{{route('admin.diseases.index')}}"><button type="button" class="btn btn-primary w-sm">Quay lại</button></a>
                <button type="submit" class="btn btn-success w-sm">Lưu bệnh</button>
            </div>
        </form>
    </div>
@endsection

@section('style-libs')
    <!-- Plugins css -->
    <link href="{{ asset('theme/admin/assets/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script-libs')
    <!-- ckeditor -->
    <script src="{{ asset('theme/admin/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <script>
        ClassicEditor.create(document.querySelector('#symptom'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor.create(document.querySelector('#treatment_direction'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
