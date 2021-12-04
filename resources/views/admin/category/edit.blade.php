@extends('layouts.app')
@section('category')
    active
@endsection
@section('title')
    Category
@endsection


@section('content')
    @include('layouts.nav')
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" target="_blank" href="{{ url('/') }}">Muskan</a>
                <a class="breadcrumb-item" href="{{ url('/admin') }}">Dashboard</a>
                <span class="breadcrumb-item active">Category</span>
            </nav>
        </div>
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Muskan Dashboard</h4>
            <p class="mg-b-0">Built on Service, and Focused on Style.</p>
        </div><!-- d-flex -->
        <div class="row pd-x-15">
            <div class="br-pagebody mg-t-1 col-lg-8">
                <!-- pagebody -->
                <div class="br-section-wrapper">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Category Table</h6>
                    <p class="mg-b-25 mg-lg-b-20">Total Category- {{ $total_category }}.</p>

                    @if (session('delete'))
                        <div class="alert alert-info" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-colored table-dark">
                        <thead>
                            {{-- <thead class="thead-colored thead-info"> --}}
                            <tr>
                                <th scope="col" class="wd-5p">#SL</th>
                                <th scope="col" class="wd-5p">Thumb.</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Added By</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index => $category)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td><img src="{{asset('uploads/category')}}/{{ $category->category_photo }}" class="wd-50" alt=""></td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ App\Models\User::find($category->added_by)->name }}</td>
                                    <td>
                                        @if ($category->created_at->diffInDays(Carbon\Carbon::now()))
                                            {{ $category->created_at->format('d-m-y') }}
                                        @else
                                            {{ $category->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/category/edit') }}/{{ $category->id }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ url('/admin/category/delete') }}/{{ $category->id }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $users->links() }} --}}
                </div>
            </div>
            <div class="br-pagebody mg-t-1 pd-l-15 col-lg-4">
                <!-- pagebody -->
                <div class="br-section-wrapper">
                    @if (session('success'))
                        <div class="alert alert-info">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Edit Category</h6>

                    <form action="{{ url('/admin/category/update') }}/{{ $category_all->id }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" value="{{ $category_all->category_name }}"
                                name="category_name">
                            @error('category_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category Photo</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="drag-area">
                                        <label for="file-6"><i class="fa fa-upload tx-50 pd-y-10"></i></label>
                                        <input name="category_photo" type="file" id="file-6" class="inputfile inputfile-5"
                                            data-multiple-caption="{count} files selected" multiple=""
                                            onchange="document.getElementById('image_preview_id').src = window.URL.createObjectURL(this.files[0])"
                                            hidden>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img id="image_preview_id" src="{{asset('uploads/category')}}/{{ $category_all->category_photo }}" class="ht-100" alt="">
                                </div>
                            </div>
                            @error('category_photo')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info">Update Category</button>
                    </form>
                </div>
            </div><!-- br-pagebody -->
        </div>

        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2017. Bracket. All Rights Reserved.</div>
                <div>Attentively and carefully made by ThemePixels.</div>
            </div>
            <div class="footer-right d-flex align-items-center">
                <span class="tx-uppercase mg-r-10">Share:</span>
                <a target="_blank" class="pd-x-5" href="https://www.facebook.com/billahbaqi"><i
                        class="fa fa-facebook tx-20"></i></a>
                <a target="_blank" class="pd-x-5" href="https://twitter.com/mdbaqibillah"><i
                        class="fa fa-twitter tx-20"></i></a>
            </div>
        </footer>
    </div><!-- br-mainpanel -->

@endsection
