@extends('layouts.appstudent')

@section('title', 'Studentprofile')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="assets/images/profile-bg.jpg" class="profile-wid-img" alt="">
                    <div class="overlay-content">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                                <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <form method="POST" action="{{ route('student.updateImage') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-n5">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/images/users/avatar-1.jpg') }}"
                                             class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                             alt="user-profile-image">


                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                            <input id="profile-img-file-input" type="file"
                                                   class="profile-img-file-input" name="profile_image"
                                                   onchange="this.form.submit()">
                                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                            <span class="avatar-title rounded-circle bg-light text-body">
                                <i class="ri-camera-fill"></i>
                            </span>
                                            </label>
                                        </div>
                                    </div>
                                    <h5 class="fs-16 mb-1">{{ $user->name }}</h5>
                                    <p class="text-muted mb-0">{{ $user->designation }}</p>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-5">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Complete Your Profile</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i class="ri-edit-box-line align-bottom me-1"></i> Edit</a>
                                </div>
                            </div>
                            <div class="progress animated-progress custom-progress progress-label">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                    <div class="label">30%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                        <i class="fas fa-home"></i> Personal Details
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#experience" role="tab">
                                        <i class="far fa-envelope"></i> Offres
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">CompanyName</label>
                                                    <input type="text" name="name" class="form-control" id="firstnameInput" placeholder="Enter your name" value="{{ old('name', auth()->user()->name) }}">
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" id="phonenumberInput" placeholder="Enter your phone number" value="{{ old('phone', auth()->user()->phone) }}">
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="designationInput" class="form-label">Designation</label>
                                                    <input type="text" name="designation" class="form-control" id="designationInput" placeholder="Designation" value="{{ old('designation', auth()->user()->designation) }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="cityInput" class="form-label">City</label>
                                                    <input type="text" name="city" class="form-control" id="cityInput" placeholder="City" value="{{ old('city', auth()->user()->city) }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="countryInput" class="form-label">Country</label>
                                                    <input type="text" name="country" class="form-control" id="countryInput" placeholder="Country" value="{{ old('country', auth()->user()->country) }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="zipcodeInput" class="form-label">Zip Code</label>
                                                    <input type="text" name="zip_code" class="form-control" id="zipcodeInput" placeholder="Enter zipcode" value="{{ old('zip_code', auth()->user()->zip_code) }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3 pb-2">
                                                    <label for="aboutInput" class="form-label">About</label>
                                                    <textarea name="about" class="form-control" id="aboutInput" placeholder="Enter your description" rows="3">{{ old('about', auth()->user()->about) }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <a class="btn btn-soft-success" href="{{ route('student.dashboard') }}">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--end tab-pane-->

                                <!--end tab-pane-->
                                <div class="tab-pane {{ request()->is('*#experience') ? 'active' : '' }}" id="experience" role="tabpanel">
                                    <form method="POST" action="{{ route('offers.store') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Offer Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="Offer title" value="{{ old('title') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="location" class="form-label">Location</label>
                                                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="{{ old('location') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="start_date" class="form-label">Start Date</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="end_date" class="form-label">End Date</label>
                                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Offer Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description">{{ old('description') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-3">
                                                <button type="submit" class="btn btn-primary">Publish Offer</button>
                                            </div>
                                        </div>
                                    </form>
                                    @foreach(auth()->user()->company->offers as $offer)
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h5 class="card-title"> {{ $offer->title }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $offer->start_date }} - {{ $offer->end_date ?? 'Present' }}</h6>
                                                <p class="card-text">{{ $offer->description }}</p>
                                                <p class="card-text"> Location: {{ $offer->location }}</p>

                                                <form action="{{ route('offer.destroy', $offer->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- Show existing experiences --}}

                                </div>

                                <!--end tab-pane-->

                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->
@endsection
