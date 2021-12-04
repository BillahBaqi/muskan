@extends('layouts.app')

@section('title')
    Profile
@endsection


@section('content')
    @include('layouts.nav')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel br-profile-page">

        <div class="card shadow-base bd-0 rounded-0 widget-4">
            <div class="card-header ht-75">
                <div class="hidden-xs-down">
                </div>
                <div class="tx-24 hidden-xs-down">
                    <a href="" class="mg-r-10"><i class="icon ion-ios-email-outline"></i></a>
                    <a href=""><i class="icon ion-more"></i></a>
                </div>
            </div><!-- card-header -->
            <div class="card-body pos-relative">
                <div class="pos-absolute" style="left: 50%;  top: -50px;  margin-left: -50px;">
                    <img class="wd-100 bg-white ht-100 pos-relative rounded-circle"
                        src="{{ asset('uploads/profile') }}/{{ Auth::user()->profile_image }}" alt="image">
                    <a data-toggle="modal" data-target="#modalpro" class="pos-absolute b-0 r-0"><i
                            class="fa fa-edit pd-5 tx-16 tx-info" style="background:#ffffff; border-radius:100%;"></i><a>
                </div>
                <!-- Modal-->
                <div id="modalpro" class="modal fade" role="dialog" aria-labelledby="modalpro" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-horizontaly-center" role="document">

                        <div class="modal-content bd-0">
                            <div class="modal-header pd-x-20">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Profile Picture Edit</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="{{ url('admin/profile/imagechange') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body pd-30">
                                    <div class="row">
                                        <img id="pic" class="wd-150 m-auto"
                                            src="{{ asset('uploads/profile') }}/{{ Auth::user()->profile_image }}"
                                            alt="image">
                                    </div>
                                    <div class="row pd-t-20">
                                        <label class="custom-file">
                                            <input oninput="pic.src=window.URL.createObjectURL(this.files[0])" name="profile_image" type="file" class="custom-file-input">
                                            <span class="custom-file-control custom-file-control-inverse"></span>
                                        </label>
                                    </div>

                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="submit"
                                        class="btn btn-info tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Update</button>
                                    <button type="button"
                                        class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>

                        {{-- <div class="modal-content bd-0 tx-14">
                            <div class="modal-header pd-y-20 pd-x-25">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body pd-25">
                                <h4 class="lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Why We Use Electoral
                                        College, Not Popular Vote</a></h4>
                                <p class="mg-b-5">It is a long established fact that a reader will be distracted by
                                    the readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using
                                    'Content here, content here', making it look like readable English. </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Save
                                    changes</button>
                                <button type="button"
                                    class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div> --}}

                    </div><!-- modal-dialog -->
                </div>




                <div class="container">

                    <h4 class="tx-normal tx-roboto tx-white">{{ Auth::user()->name }}</h4>
                    <p class="mg-b-10">Super Admin</p>

                </div><!-- card-body -->
            </div><!-- card-profile-img -->

        </div><!-- card -->

        <div class="ht-50 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
            <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile"
                        role="tab">Profile</a></li>
                <li class="nav-item hidden-xs-down"><a class="nav-link" data-toggle="tab" href="#"
                        role="tab">Posts</a></li>
            </ul>
        </div>

        @if (session('profile_success'))
            <div class="alert alert-bordered alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ session('profile_success') }}
            </div>
        @endif


        @error('profile_image')
            <div class="alert alert-bordered alert-danger mr-t-20">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ $message }}
            </div>            
        @enderror

        <div class="tab-content br-profile-body">
            <div class="tab-pane fade active show" id="profile">
                <div class="row">
                    <div class="br-section-wrapper mg-t-20 col-md-8">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Edit Profile</h6>
                        <p class="mg-b-30 tx-gray-600">Edit your Basic information. </p>
                        @if (session('success'))
                            <div class="alert alert-bordered alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ url('admin/profile/update') }}" method="POST">
                            @csrf
                            <div class="form-layout form-layout-2">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">User Name: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ Auth::user()->name }}" placeholder="Enter firstname">
                                            @error('name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div><!-- col-6 -->

                                    <div class="col-md-6 mg-t--1 mg-md-t-0">
                                        <div class="form-group mg-md-l--1">
                                            <label class="form-control-label">Email address: <span
                                                    class="tx-danger">*</span></label>
                                            <input class="form-control" type="email" name="email"
                                                value="{{ Auth::user()->email }}" placeholder="Enter email address">
                                            @error('email')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div><!-- col-6 -->

                                </div><!-- row -->
                                <div class="form-layout-footer bd pd-20 bd-t-0">
                                    <button type="submit" class="btn btn-info">Update Profile</button>
                                </div><!-- form-group -->
                            </div><!-- form-layout -->
                        </form>

                    </div>
                    <div class="br-section-wrapper mg-t-20 col-md-4">
                        <h6 class="text-center card-body-title">Change Password</h6>
                        <p class="text-center mg-b-20 mg-sm-b-30">(Give a strong password for better security).</p>
                        @error('password')
                            <div class="alert alert-bordered alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ $message }}
                            </div>
                        @enderror
                        @if (session('passchange'))
                            <div class="alert alert-bordered alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ session('passchange') }}
                            </div>
                        @endif
                        @if (session('old_pass'))
                            <div class="alert alert-bordered alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ session('old_pass') }}
                            </div>
                        @endif


                        <form action="{{ url('admin/profile/passchange') }}" method="POST">
                            @csrf
                            <div class="justify-content-center">
                                <div class="form-group">
                                    <label class="text-left">Old Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-control" type="password" name="old_password">
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="justify-content-center">

                                <div class="form-group">
                                    <label class="text-left">New Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-control" type="password" name="password">
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="justify-content-center">

                                <div class="form-group">
                                    <label class="text-left">Confirm Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-control" type="password" name="password_confirmation">
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center form-layout-footer mg-t-30">
                                <button type="submit" class="btn btn-info mg-r-5">Update Password</button>
                            </div><!-- form-layout-footer -->
                        </form>
                    </div><!-- card -->
                </div>


            </div><!-- tab-pane -->

        </div><!-- br-mainpanel -->




        <!-- ########## END: MAIN PANEL ########## -->

        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2021. Muskan. All Rights Reserved.</div>
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
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>
    <script>
        $('#Modalpro').on('shown.bs.modal', function() {
            $('#Modalpro').trigger('focus')
        })
    </script>


@endsection
