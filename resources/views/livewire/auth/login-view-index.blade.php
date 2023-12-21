<div class="container-fluid">
    @section('page-title', $page_title)
    <div class="row">
        <!-- Kolom untuk gambar latar belakang -->
        <div class="col-md-6 d-none d-md-block"
            style="
            background-image: url('{{ url('assets/images/frame.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            margin-left: -15px;
        ">
            <!-- Tidak ada konten di sini -->
        </div>
        <!-- Kolom untuk konten -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <!--begin::Content body-->
            <div class="col-md-8 mt-5 mt-md-0">
                <div class="text-center mb-10">
                    <img src="{{ asset('assets/images/logo-main.png') }}" class="max-h-250px" alt="">
                    <h3 class="font-weight-bold text-muted font-size-h5 font-size-h6-lg">Please, Log In to your account
                    </h3>

                </div>
                <!--begin::Form-->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!--begin::Title-->
                    <!--end::Title-->

                    <!--begin::Form group-->
                    <div class="form-group fv-plugins-icon-container">
                        <input
                            class="form-control @error('email') is-invalid
                        @enderror form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6"
                            type="email" placeholder="Email" name="email" autocomplete="off">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Form group-->

                    <!--begin::Form group-->
                    <div class="form-group fv-plugins-icon-container">
                        <input
                            class="form-control @error('password') is-invalid
                            
                        @enderror form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6"
                            type="password" placeholder="Password" name="password" autocomplete="off">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Form group-->

                    <!--begin::Form group-->
                    <div class="form-group d-flex justify-content-center flex-wrap pb-lg-0 pb-3">
                        <button type="submit"
                            class="btn btn-pink btn-pill font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                    </div>
                </form>
                <!--end::Form-->

                <div class="my-10 text-center">
                    <p class="text-muted font-weight-light font-size-h4">Dont have an account? <a
                            class="font-weight-bold" href="{{ route('register-page') }}">Sign Up</a></p>
                </div>
            </div>

            <!--end::Content body-->
        </div>
    </div>
</div>
