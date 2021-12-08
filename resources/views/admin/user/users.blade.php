@extends('layouts.app')
@section('users')
    active
@endsection
@section('title')
    Users
@endsection


@section('content')
    @include('layouts.nav')
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" target="_blank" href="{{ url('/') }}">Muskan</a>
                <a class="breadcrumb-item" href="{{ url('/admin') }}">Dashboard</a>
                <span class="breadcrumb-item active">Users</span>
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
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-10">Admin Table</h6>
                    <p class="mg-b-25 mg-lg-b-20">Total Admin/Moderator - {{ $total_user }}.</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-colored table-dark">
                        <thead>
                            {{-- <thead class="thead-colored thead-info"> --}}
                            <tr>
                                <th class="wd-10p">SL</th>
                                <th class="wd-20p">Name</th>
                                <th class="wd-25p">Email</th>
                                <th class="wd-15p">Role</th>
                                <th class="wd-20p">Created At</th>
                                <th class="wd-15p text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $index => $user)
                                <tr>
                                    <th scope="row">{{ $users->firstitem() + $index }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ( $user->role == 'ADM')
                                            Admin
                                        @elseif ( $user->role == 'MOD')
                                            Moderator                                   

                                        @endif
                                        
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/y h:i:m A') }}</td>
                                    <td class="text-center">
                                        <a href="#"
                                            class="tx-15 mg-r-10"><i class="fa fa-edit tx-info"></i></a>
                                        <a href="#"
                                            class="tx-15"><i class="fa fa-trash tx-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>

                <div class="br-section-wrapper mt-4" >
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-20 mg-b-10">User Table</h6>
                    <p class="mg-b-25 mg-lg-b-20">Total User - {{ $total_user }}.</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-colored table-dark">
                        <thead>
                            {{-- <thead class="thead-colored thead-info"> --}}
                            <tr>
                                <th class="wd-10p">SL</th>
                                <th class="wd-35p">Name</th>
                                <th class="wd-35p">Email</th>
                                <th class="wd-20p">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <th scope="row">{{ $users->firstitem() + $index }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d/m/y h:i:m A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div><!-- br-pagebody -->
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
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">Add Subcategory</h6>

                    <form action="{{ url('/admin/user/insert') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Select Role</label>
                            <select name="role" class="form-control" value="">
                                <option value="">-- Select one --</option>
                                <option value="ADM">Admin</option>
                                <option value="MOD">Moderator</option>
                                <option value="USR">User</option>
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



        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2021. Muskan. All Rights Reserved.</div>
                <div>Best Care for Your baby.</div>
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
