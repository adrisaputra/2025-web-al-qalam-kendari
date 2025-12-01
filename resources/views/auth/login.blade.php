@php
$setting = \App\Helpers\Helpers::setting();
@endphp
@extends('auth.layout')
@section('content')

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('upload/setting/'.$setting->background_login) }});background-blend-mode: darken;">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <a href="#" class="mb-12">
                {{--<center><img src="{{ asset('upload/setting/'.$setting->large_icon) }}" width="35%"></center>--}}
                <div class="text-center" style="margin-bottom:20px">
                </div>
            </a>
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form class="text-left" method="POST" action="{{ url('login') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($message = Session::get('status'))
                    <div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <h4 class="mb-2 text-light">Berhasil !</h4>
                            <span>{{ $message }}</span>
                        </div>
                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </button>
                    </div>
                    @endif

                    @if ($message = Session::get('status2'))
                    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <h4 class="mb-2 text-light">Gagal !</h4>
                            <span>{{ $message }}</span>
                        </div>
                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </button>
                    </div>
                    @endif

                    @if ($message = Session::get('status3'))
                    <div class="alert alert-dismissible bg-warning d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <h4 class="mb-2 text-light">Menunggu !</h4>
                            <span>{{ $message }}</span>
                        </div>
                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </button>
                    </div>
                    @endif

                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/upload/setting/'.$setting->large_icon) }}" style="width:100%" />
                    </div>
                    <div class="fv-row mb-5">
                        <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Username" name="name" autocomplete="off" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-bold fs-6 mb-2">{{ __('Password') }}</label>
                        <div class="col-md-12" data-kt-password-meter="true">
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password" id="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div id="username-field" style="padding-top:1px">
                                <span id="captcha-img"><img src="{{ captcha_src('math') }}&t={{ time() }}" alt="captcha" style="width: 130px; height: 42px;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input id="username" name="captcha" type="text" class="form-control form-control-solid" placeholder="Masukkan Captcha">
                            @if ($errors->has('captcha')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('captcha') }}</div>@endif
                        </div>
                        <div class="col-md-2">
                            <div id="username-field" style="padding-top:1px">
                                <button type="button" class="btn btn-sm btn-danger" style="padding: calc(0.75rem + 2px) calc(1.5rem + -4.2px);" id="refresh-captcha">&nbsp;<i class="fas fa-sync-alt"></i></button></p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">LOGIN</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#refresh-captcha').click(function() {
        $.ajax({
            type: 'GET',
            url: '{{ route("refresh.captcha") }}',
            success: function(data) {
                $('#captcha-img').html(data.captcha);
            }
        });
    });
</script>
@endsection