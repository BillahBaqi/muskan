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

        <div class="br-pagebody mg-t-1 pd-x-30">
            <!-- pagebody -->
            <div class="br-section-wrapper">
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

                {{-- <div class="row content-justify-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Welcome, {{ $logged_user }}
                        </div>
                        <div class="alert alert-info">
                            <h5> Total Users {{ $total_user }}</h5>
                        </div>


                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Created At</th>
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
                    </div>
                </div>
            </div> --}}
            </div>
        </div><!-- br-pagebody -->
        
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
