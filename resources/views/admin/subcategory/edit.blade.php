@extends('layouts.app')
@section('subcategory')
    active
@endsection
@section('title')
    Subcategory
@endsection

@section('content')
    @include('layouts.nav')
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" target="_blank" href="{{ url('/') }}">Muskan</a>
                <a class="breadcrumb-item" href="{{ url('/admin') }}">Dashboard</a>
                <span class="breadcrumb-item active">Subcategory</span>
            </nav>
        </div>
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Muskan Dashboard</h4>
            <p class="mg-b-0">Built on Service, and Focused on Style.</p>
        </div><!-- d-flex -->
        <div class="row pd-x-15">
            <div class="br-pagebody mg-t-1 col-lg-9">
                <!-- pagebody -->
                <div class="br-section-wrapper">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Subcategory Table</h6>
                    <p class="mg-b-25 mg-lg-b-20">Total Subcategory- {{ $total_subcategory }}.</p>

                    @if (session('delete'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong class="d-block d-sm-inline-block-force"></strong>{{ session('delete') }}.
                        </div><!-- alert -->
                    @endif
                    <form action="{{ url('admin/subcategory/markdelete') }}" method="POST">
                        @csrf
                        <table class="table table-bordered table-colored table-dark">
                            <thead>
                                {{-- <thead class="thead-colored thead-info"> --}}
                                <tr>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Subcategory Name</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $index => $subcategory)

                                    <tr>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $subcategory->subcategory_name }}</td>
                                        <td>{{ App\Models\Category::find($subcategory->category_id)->category_name ?? 'N/A' }}
                                        </td>
                                        <td>
                                            @if ($subcategory->created_at->diffInDays(Carbon\Carbon::now()))
                                                {{ $subcategory->created_at->format('d-m-y') }}
                                            @else
                                                {{ $subcategory->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/subcategory/edit') }}/{{ $subcategory->id }}"
                                                class="mg-l-2 mg-r-2 tx-15"><i class="fa fa-edit tx-primary"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    {{-- {{ $users->links() }} --}}




                </div>
            </div>
            <div class="br-pagebody mg-t-1 pd-l-15 col-lg-3">
                <!-- pagebody -->
                <div class="br-section-wrapper">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong class="d-block d-sm-inline-block-force"></strong>{{ session('success') }}.
                        </div><!-- alert -->
                    @endif
                    @if (session('exist'))
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong class="d-block d-sm-inline-block-force"></strong>{{ session('exist') }}.
                        </div><!-- alert -->
                    @endif
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Edit Subcategory</h6>

                    <form action="{{ url('admin/subcategory/update') }}/{{$subcategory_all->id}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Subcategory Name</label>
                            <input type="text" class="form-control" name="subcategory_name"
                                value="{{$subcategory_all->subcategory_name}}">
                            @error('subcategory_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="{{$subcategory_all->category_id}}">{{App\Models\Category::find($subcategory_all->category_id)->category_name }}</option>
                                @foreach ($categories as $category)
                                    <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info">Update Subcategory</button>
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
@section('footer_js')
    <script>
        $("#checkAll").click(function() {
            $('.check:input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>

    <script>
        $("#checkAll2").click(function() {
            $('.checke:input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>


@endsection
