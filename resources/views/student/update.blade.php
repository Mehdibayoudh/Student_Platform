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
                    <form action="{{ route('student.updatePortfolio') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">Portfolio</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="submit" class="badge bg-light text-primary fs-12 border-0"><i class="ri-check-fill align-bottom me-1"></i> Save</button>
                                    </div>
                                </div>

                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                    <span class="avatar-title rounded-circle fs-16 bg-dark text-white">
                        <i class="ri-github-fill"></i>
                    </span>
                                    </div>
                                    <input type="text" name="github" class="form-control" placeholder="GitHub URL" value="{{ old('github', $user->github) }}">
                                </div>

                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                    <span class="avatar-title rounded-circle fs-16 bg-primary">
                        <i class="ri-linkedin-fill"></i>
                    </span>
                                    </div>
                                    <input type="text" name="linkedin" class="form-control" placeholder="LinkedIn URL" value="{{ old('linkedin', $user->linkedin) }}">
                                </div>

                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                    <span class="avatar-title rounded-circle fs-16 bg-info text-white">
                        <i class="ri-global-fill"></i>
                    </span>
                                    </div>
                                    <input type="text" name="website" class="form-control" placeholder="Website URL" value="{{ old('website', $user->website) }}">
                                </div>
                            </div>
                        </div>
                    </form>

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
                                        <i class="far fa-envelope"></i> Experience
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
                                                    <label for="firstnameInput" class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control" id="firstnameInput" placeholder="Enter your name" value="{{ old('name', auth()->user()->name) }}">
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" id="phonenumberInput" placeholder="Enter your phone number" value="{{ old('phone', auth()->user()->phone) }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="skillsInput" class="form-label">Skills</label>
                                                    <select class="form-control" name="skills[]" data-choices data-choices-text-unique-true multiple id="skillsInput">
                                                        @php $userSkills = auth()->user()->skills ?? []; @endphp
                                                        @foreach(['illustrator', 'photoshop', 'css', 'html', 'javascript', 'python', 'php'] as $skill)
                                                            <option value="{{ $skill }}" {{ in_array($skill, $userSkills) ? 'selected' : '' }}>{{ ucfirst($skill) }}</option>
                                                        @endforeach
                                                    </select>
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
                                <div class="tab-pane" id="experience" role="tabpanel">
                                    <form>
                                        <div id="newlink">
                                            <div id="1">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="jobTitle" class="form-label">Job Title</label>
                                                            <input type="text" class="form-control" id="jobTitle" placeholder="Job title" value="Lead Designer / Developer">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="companyName" class="form-label">Company Name</label>
                                                            <input type="text" class="form-control" id="companyName" placeholder="Company name" value="Themesbrand">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="experienceYear" class="form-label">Experience Years</label>
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <select class="form-control" data-choices data-choices-search-false name="experienceYear" id="experienceYear">
                                                                        <option value="">Select years</option>
                                                                        <option value="Choice 1">2001</option>
                                                                        <option value="Choice 2">2002</option>
                                                                        <option value="Choice 3">2003</option>
                                                                        <option value="Choice 4">2004</option>
                                                                        <option value="Choice 5">2005</option>
                                                                        <option value="Choice 6">2006</option>
                                                                        <option value="Choice 7">2007</option>
                                                                        <option value="Choice 8">2008</option>
                                                                        <option value="Choice 9">2009</option>
                                                                        <option value="Choice 10">2010</option>
                                                                        <option value="Choice 11">2011</option>
                                                                        <option value="Choice 12">2012</option>
                                                                        <option value="Choice 13">2013</option>
                                                                        <option value="Choice 14">2014</option>
                                                                        <option value="Choice 15">2015</option>
                                                                        <option value="Choice 16">2016</option>
                                                                        <option value="Choice 17" selected>2017</option>
                                                                        <option value="Choice 18">2018</option>
                                                                        <option value="Choice 19">2019</option>
                                                                        <option value="Choice 20">2020</option>
                                                                        <option value="Choice 21">2021</option>
                                                                        <option value="Choice 22">2022</option>
                                                                    </select>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-auto align-self-center">
                                                                    to
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-5">
                                                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default2">
                                                                        <option value="">Select years</option>
                                                                        <option value="Choice 1">2001</option>
                                                                        <option value="Choice 2">2002</option>
                                                                        <option value="Choice 3">2003</option>
                                                                        <option value="Choice 4">2004</option>
                                                                        <option value="Choice 5">2005</option>
                                                                        <option value="Choice 6">2006</option>
                                                                        <option value="Choice 7">2007</option>
                                                                        <option value="Choice 8">2008</option>
                                                                        <option value="Choice 9">2009</option>
                                                                        <option value="Choice 10">2010</option>
                                                                        <option value="Choice 11">2011</option>
                                                                        <option value="Choice 12">2012</option>
                                                                        <option value="Choice 13">2013</option>
                                                                        <option value="Choice 14">2014</option>
                                                                        <option value="Choice 15">2015</option>
                                                                        <option value="Choice 16">2016</option>
                                                                        <option value="Choice 17">2017</option>
                                                                        <option value="Choice 18">2018</option>
                                                                        <option value="Choice 19">2019</option>
                                                                        <option value="Choice 20" selected>2020</option>
                                                                        <option value="Choice 21">2021</option>
                                                                        <option value="Choice 22">2022</option>
                                                                    </select>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="jobDescription" class="form-label">Job Description</label>
                                                            <textarea class="form-control" id="jobDescription" rows="3" placeholder="Enter description">You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you're working with reputable font websites. </textarea>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a class="btn btn-success" href="javascript:deleteEl(1)">Delete</a>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                        </div>
                                        <div id="newForm" style="display: none;">

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2">
                                                <button type="submit" class="btn btn-success">Update</button>
                                                <a href="javascript:new_link()" class="btn btn-primary">Add New</a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </form>
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
