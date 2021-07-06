@extends('layouts.app')

@section('title')
Tutor | Setting
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/Setting.css') }}">
@endpush

@section('content')
<section>
    <div class="banner flex">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12  settingOuter1 d-none d-sm-block d-md-none d-lg-block">
                    <div class="profile pt-2 mt-5 icon">
                        <i class="far fa-user"></i>
                        <p style="display: inline;" class="pl-2">Profile</p>
                    </div>

                    <div class="email pt-2 icon">
                        <i class="far fa-envelope"></i>
                        <p style="display: inline;" class="pl-2">Email</p>
                    </div>

                    <div class="phone pt-2 icon">
                        <i class="fas fa-phone"></i>
                        <p style="display: inline;" class="pl-2">Phone</p>
                    </div>
                    <div class="name pt-2 icon">
                        <i class="fas fa-signature"></i>
                        <p style="display: inline;" class="pl-1">Name</p>
                    </div>
                    <div class="profile pt-2 icon">
                        <i class="far fa-images"></i>
                        <p style="display: inline;" class="pl-2">Profile Photo</p>
                    </div>
                    <div class="profile pt-2 icon">
                        <i class="far fa-eye"></i>
                        <p style="display: inline;" class="pl-2">Post Visibility</p>
                    </div>
                    <div class="profile pt-2 icon">
                        <i class="far fa-address-card"></i>
                        <p style="display: inline;" class="pl-2">Tutor Account</p>
                    </div>


                </div>
                <div class="col-lg-9 col-md-12 col-12 settingOuter2 ml-5 pl-5 pr-5">

                    <h2 style="font-weight: bold; letter-spacing: 2px; padding-top: 0.5rem;">General Settings</h2>

                    <div class="profileSetting pt-2">
                        <h5 style="font-weight: bold; color: #0076cb;">Profile Live</h5>
                        <p style="display: inline;">
                            If you delete your profile, you will lose all your data permanently.
                        </p>
                        <a href="javascript:void(0)" id="deleteFormBtn">
                            <button style="float: right; padding: 0.3rem 1.5rem;" type="button"
                                class="btn btn-outline-primary btn-sm">
                                Delete Profile
                            </button>
                        </a>
                        <form id="accountDeleteForm" action="{{route('delete.account')}}" method="post">
                            @csrf
                        </form>
                    </div>


                    <div class="profileSetting pt-2">
                        <h5 style="font-weight: bold; color: #0076cb;">Email</h5>
                        <p style="display: inline;">Your email is {{ Auth::user()->email }}</p>
                        <a href="{{route('email')}}">

                            <button style="float: right; padding: 0.3rem 1.4rem;" type="button"
                                class="btn btn-outline-primary btn-sm">Change Email</button>
                        </a>
                    </div>

                    <div class="profileSetting pt-2">
                        <h5 style="font-weight: bold; color: #0076cb;">Phone</h5>
                        <p style="display: inline;">Add, remove, and verify phone numbers.</p>
                        <a href="{{route('phone')}}">
                            <button style="float: right; padding: 0.3rem 1.2rem;" type="button"
                                class="btn btn-outline-primary btn-sm">Manage Phone</button>
                        </a>
                    </div>

                    <div class="profileSetting pt-2">
                        <h5 style="font-weight: bold; color: #0076cb;">Name</h5>
                        <p style="display: inline;">Manage how others see your name.</p>
                        <a href="{{route('username')}}">
                            <button style="float: right; padding: 0.3rem 1.3rem;" type="button"
                                class="btn btn-outline-primary btn-sm">Manage Name</button>
                        </a>
                    </div>

                    <div class="profileSetting pt-2">
                        <h5 style="font-weight: bold; color: #0076cb;">Profile Photo</h5>
                        <p style="display: inline;">Manage your profile picture.</p>
                        <a href="{{route('profile')}}">
                            <button style="float: right; padding: 0.3rem 1.2rem;" type="button"
                                class="btn btn-outline-primary btn-sm">Manage Profile</button>
                        </a>
                    </div>
                    @role('student')
                    <div class="profileSetting pt-2">
                        <h5 style="font-weight: bold; color: #0076cb;">Post Visibility</h5>
                        <p style="display: inline;">Select how your posts are made public.</p>
                        <a href="{{route('post.visibility',['visibility'=> $is_verified->post_is_public?0:1])}}">
                            <button style="float: right; padding: 0.3rem 1.5rem;min-width: 148px;" type="button"
                                class="btn btn-outline-primary btn-sm">
                                @if ($is_verified->post_is_public)
                                Always Public
                                @else
                                Only Me
                                @endif
                            </button>
                        </a>
                    </div>
                    @endrole
                    @role('teacher')
                    <div class="profileSetting pt-2">
                        <h5 style="font-weight: bold; color: #0076cb;">Tutor Account Setting</h5>
                        <p style="display: inline;">Open Tutor account.</p>
                        <a href="{{route('tutor_profile',['id'=>Auth::user()->id])}}">
                            <button style="float: right; padding: 0.3rem 1.4rem;" type="button"
                                class="btn btn-outline-primary btn-sm">Open Account</button>
                        </a>
                    </div>
                    @endrole

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ModalCode -->
<section>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fas fa-arrow-left back" style="float: left;"></i>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h3 style="font-weight: bold; letter-spacing: 2px; padding-top: 0.5rem;">For Your Student
                        Account</h3>
                    <ul class="pl-5 pr-5 pt-3">
                        <li>All your posts will be closed and made private</li>
                        <li>No new teachers will be able to contact you.</li>
                        <li>Teachers who already have your contact may still contact you.</li>
                        <li>We will notify Google to remove all your data from their searches.</li>
                    </ul>
                    <div class="currency  mt-5 flex">
                        <button type="button" class="btn btn-outline-primary btn-md mr-3 ">Cancel</button>
                        <button type="button" class="btn btn-primary btn-md">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop




@push('include-js')
<script>
    $(document).ready(function () {
        $('#deleteFormBtn').click(()=>{
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Account!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete){
                    $('#accountDeleteForm').submit();
                }
            });
        })
    })
</script>
@endpush
