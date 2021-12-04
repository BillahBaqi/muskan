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
                                    <th scope="col"><input id="checkAll" type="checkbox"></th>
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
                                        <td><input class="check" type="checkbox" name="mark_id[]" value="{{ $subcategory->id }}"></td>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $subcategory->subcategory_name }}</td>
                                        <td>{{ App\Models\Category::find($subcategory->category_id)->category_name ?? '' }}
                                        </td>
                                        <td>
                                            @if ($subcategory->created_at->diffInDays(Carbon\Carbon::now()))
                                                {{ $subcategory->created_at->format('d-m-y') }}
                                            @else
                                                {{ $subcategory->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/subcategory/edit') }}/{{ $subcategory->id }}"
                                                class="mg-l-2 mg-r-2 tx-15"><i class="fa fa-edit tx-primary"></i></a>
                                            <a href="{{ url('/admin/subcategory/delete') }}/{{ $subcategory->id }}"
                                                class="tx-15 mg-l-2 mg-r-2"><i class="fa fa-trash tx-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="btn-group dropup">
                            <div class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                With marked
                            </div>
                            <div class="dropdown-menu">
                                <button type="submit" class="btn dropdown-item">Delete</button>
                            </div>
                        </div>



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
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Add Subcategory</h6>

                    <form action="{{ url('/admin/subcategory/insert') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Subcategory Name</label>
                            <input type="text" class="form-control" name="subcategory_name"
                                value="{{ old('subcategory_name') }}">
                            @error('subcategory_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">-- Select one --</option>
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
                        <button type="submit" class="btn btn-info">Add Subcategory</button>
                    </form>

                </div>
            </div><!-- br-pagebody -->
        </div>
        <div class="row pd-x-15 mt-3">
            <div class="br-pagebody mg-t-1 col-lg-9">
                <!-- pagebody -->
                <div class="br-section-wrapper">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-10">Trash <span><i
                                class="fa fa-trash tx-danger"></i></span></h6>
                    @if (session('restore'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong class="d-block d-sm-inline-block-force"></strong>{{ session('restore') }}.
                        </div><!-- alert -->
                    @endif
                    @if (session('permanentdelete'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong class="d-block d-sm-inline-block-force"></strong>{{ session('permanentdelete') }}.
                        </div><!-- alert -->
                    @endif
                    <form action="{{ url('admin/subcategory/marktrash') }}" method="POST">
                        @csrf
                        <table class="table table-bordered table-colored table-dark">
                            <thead>
                                {{-- <thead class="thead-colored thead-info"> --}}
                                <tr>
                                    <th scope="col"><input id="checkAll2" type="checkbox"></th>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Subcategory Name</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col" class="wd-20p text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trash_subcategories as $index => $trash_subcategory)

                                    <tr>
                                        <td><input class="checke" type="checkbox" name="mark_trash_id[]"
                                                value="{{ $trash_subcategory->id }}"></td>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $trash_subcategory->subcategory_name }}</td>
                                        <td>{{ App\Models\Category::find($trash_subcategory->category_id)->category_name ?? '-'}}
                                        </td>

                                        <td>
                                            @if ($trash_subcategory->created_at->diffInDays(Carbon\Carbon::now()))
                                                {{ $trash_subcategory->created_at->format('d-m-y') }}
                                            @else
                                                {{ $trash_subcategory->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/subcategory/restore/') }}/{{ $trash_subcategory->id }}"
                                                class="tx-15 mg-r-10"><i class="fa fa-undo tx-info"></i></a>
                                            <a href="{{ url('admin/subcategory/permanentdelete/') }}/{{ $trash_subcategory->id }}"
                                                class="tx-15"><i class="fa fa-trash tx-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="btn-group dropup">
                            <div class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                With marked
                            </div>
                            <div class="dropdown-menu">
                                <button name="restore" value="restore" type="submit"
                                    class="btn dropdown-item">Restore</button>
                                <button name="delete" value="delete" type="submit" class="btn dropdown-item">Permanently
                                    Delete</button>
                            </div>
                        </div>
                    </form>
                    {{-- {{ $users->links() }} --}}
                </div>
            </div>
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
