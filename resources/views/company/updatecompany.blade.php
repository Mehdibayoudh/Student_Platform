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
                                    <form method="POST"
                                          action="{{ isset($editingExperience) ? route('student-experiences.update', $editingExperience->id) : route('student-experiences.store') }}">
                                        @csrf
                                        @if(isset($editingExperience))
                                            @method('PUT')
                                        @endif

                                        <div id="newlink">
                                            <div id="1">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="jobTitle" class="form-label">Job Title</label>
                                                            <input type="text" class="form-control" id="jobTitle" name="job_title" placeholder="Job title"
                                                                   value="{{ old('job_title', $editingExperience->job_title ?? '') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="companyName" class="form-label">Company Name</label>
                                                            <input type="text" class="form-control" id="companyName" name="company_name" placeholder="Company name"
                                                                   value="{{ old('company_name', $editingExperience->company_name ?? '') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="startYear" class="form-label">Experience Years</label>
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <select class="form-control" name="start_year" id="startYear">
                                                                        <option value="">Select Start Year</option>
                                                                        @for ($year = 2001; $year <= 2025; $year++)
                                                                            <option value="{{ $year }}"
                                                                                {{ (old('start_year', $editingExperience->start_year ?? '') == $year) ? 'selected' : '' }}>
                                                                                {{ $year }}
                                                                            </option>
                                                                        @endfor
                                                                    </select>
                                                                </div>

                                                                <div class="col-auto align-self-center">
                                                                    to
                                                                </div>

                                                                <div class="col-lg-5">
                                                                    <select class="form-control" name="end_year" id="endYear">
                                                                        <option value="">Select End Year</option>
                                                                        @for ($year = 2001; $year <= 2025; $year++)
                                                                            <option value="{{ $year }}"
                                                                                {{ (old('end_year', $editingExperience->end_year ?? '') == $year) ? 'selected' : '' }}>
                                                                                {{ $year }}
                                                                            </option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="jobDescription" class="form-label">Job Description</label>
                                                            <textarea class="form-control" id="jobDescription" name="description" rows="3" placeholder="Enter description">{{ old('description', $editingExperience->description ?? '') }}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-3">
                                            <div class="hstack gap-2">
                                                <button type="submit" class="btn btn-success">
                                                    {{ isset($editingExperience) ? 'Update Experience' : 'Save Experience' }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    {{-- Show existing experiences --}}
                                    @foreach(auth()->user()->studentExperiences as $experience)
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $experience->job_title }} at {{ $experience->company_name }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $experience->start_year }} - {{ $experience->end_year ?? 'Present' }}</h6>
                                                <p class="card-text">{{ $experience->description }}</p>
                                                <a href="{{ route('student-experiences.edit', $experience->id) }}#experience" class="btn btn-sm btn-primary">Edit</a>                                                    @csrf
                                                <form action="{{ route('student-experiences.destroy', $experience->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach

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
