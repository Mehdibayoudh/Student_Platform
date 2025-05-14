@extends('layouts.appstudent')

@section('title', 'Studentprofile')

@section('content')



    <div class="page-content">
        <div class="container-fluid">
            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="public/assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                </div>
            </div>
            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
                <div class="row g-4">
                    <div class="col-auto">
                        <div class="avatar-lg">
                            <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('assets/images/users/avatar-1.jpg') }}"
                                 alt="user-img"
                                 class="img-thumbnail rounded-circle"
                                 style="height: 100px; width: 100px; object-fit: cover;" />
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col">
                        <div class="p-2">
                            <h3 class="text-white mb-1">{{ $user->name }}</h3>
                            <p class="text-white text-opacity-75">{{ $user->role }}</p>
                            <div class="hstack text-white-50 gap-1">
                                <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>{{ $user->city }}, {{ $user->country }}</div>
                                <div>
                                    <i class="ri-building-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-12 col-lg-auto order-last order-lg-0">
                        <div class="row text text-white-50 text-center">
                            <div class="col-lg-6 col-4">
                                <div class="p-2">
                                    <h4 class="text-white mb-1">24.3K</h4>
                                    <p class="fs-14 mb-0">Followers</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-4">
                                <div class="p-2">
                                    <h4 class="text-white mb-1">1.3K</h4>
                                    <p class="fs-14 mb-0">Following</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                </div>
                <!--end row-->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="d-flex profile-wrapper">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                        <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Activities</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                        <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Projects</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                        <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Documents</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="flex-shrink-0">
                                <a href="{{ route('profileviewupdate') }}" class="btn btn-success">
                                    <i class="ri-edit-box-line align-bottom"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content pt-4 text-muted">
                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xxl-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-5">Complete Your Profile</h5>
                                                <div class="progress animated-progress custom-progress progress-label">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="label">30%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Info</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Full Name :</th>
                                                            <td class="text-muted">{{ $user->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Mobile :</th>
                                                            <td class="text-muted">+(216) {{ $user->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">E-mail :</th>
                                                            <td class="text-muted">{{ $user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Location :</th>
                                                            <td class="text-muted">{{ $user->city }}, {{ $user->country }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Joining Date</th>
                                                            <td class="text-muted">{{$user->email_verified_at}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Portfolio</h5>
                                                <div class="d-flex flex-wrap gap-2">
                                                    @if($user->github)
                                                        <div>
                                                            <a href="{{ $user->github }}" target="_blank" class="avatar-xs d-block">
                        <span class="avatar-title rounded-circle fs-16 bg-body text-body">
                            <i class="ri-github-fill"></i>
                        </span>
                                                            </a>
                                                        </div>
                                                    @endif

                                                    @if($user->website)
                                                        <div>
                                                            <a href="{{ $user->website }}" target="_blank" class="avatar-xs d-block">
                        <span class="avatar-title rounded-circle fs-16 bg-primary">
                            <i class="ri-global-fill"></i>
                        </span>
                                                            </a>
                                                        </div>
                                                    @endif

                                                    @if($user->linkedin)
                                                        <div>
                                                            <a href="{{ $user->linkedin }}" target="_blank" class="avatar-xs d-block">
                        <span class="avatar-title rounded-circle fs-16 bg-info text-white">
                            <i class="ri-linkedin-fill"></i>
                        </span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Skills</h5>
                                                <div class="d-flex flex-wrap gap-2 fs-15">
                                                    @if(!empty($user->skills) && is_array($user->skills))
                                                        @foreach($user->skills as $skill)
                                                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">{{ $skill }}</a>
                                                        @endforeach
                                                    @else
                                                        <span class="text-muted">No skills listed.</span>
                                                    @endif
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-4">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title mb-0">Suggestions</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <a href="#" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-2-fill fs-14"></i>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="d-flex align-items-center py-3">
                                                        <div class="avatar-xs flex-shrink-0 me-3">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle" />
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="fs-14 mb-1">Esther James</h5>
                                                                <p class="fs-13 text-muted mb-0">Frontend Developer</p>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <button type="button" class="btn btn-sm btn-outline-success"><i class="ri-user-add-line align-middle"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center py-3">
                                                        <div class="avatar-xs flex-shrink-0 me-3">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle" />
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="fs-14 mb-1">Jacqueline Steve</h5>
                                                                <p class="fs-13 text-muted mb-0">UI/UX Designer</p>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <button type="button" class="btn btn-sm btn-outline-success"><i class="ri-user-add-line align-middle"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center py-3">
                                                        <div class="avatar-xs flex-shrink-0 me-3">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="img-fluid rounded-circle" />
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="fs-14 mb-1">George Whalen</h5>
                                                                <p class="fs-13 text-muted mb-0">Backend Developer</p>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <button type="button" class="btn btn-sm btn-outline-success"><i class="ri-user-add-line align-middle"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div>
                                        <!--end card-->

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-4">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title mb-0">Popular Posts</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <a href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-2-fill fs-14"></i>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1">
                                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-4">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/small/img-4.jpg" alt="" height="50" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3 overflow-hidden">
                                                        <a href="javascript:void(0);">
                                                            <h6 class="text-truncate fs-14">Design your apps in your own way</h6>
                                                        </a>
                                                        <p class="text-muted mb-0">15 Dec 2021</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-4">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/small/img-5.jpg" alt="" height="50" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3 overflow-hidden">
                                                        <a href="javascript:void(0);">
                                                            <h6 class="text-truncate fs-14">Smartest Applications for Business</h6>
                                                        </a>
                                                        <p class="text-muted mb-0">28 Nov 2021</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/small/img-6.jpg" alt="" height="50" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3 overflow-hidden">
                                                        <a href="javascript:void(0);">
                                                            <h6 class="text-truncate fs-14">How to get creative in your work</h6>
                                                        </a>
                                                        <p class="text-muted mb-0">21 Nov 2021</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">About</h5>
                                                <p>{{ $user->about }}</p>
                                                 <div class="row">
                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                    <i class="ri-user-2-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Designation :</p>
                                                                <h6 class="text-truncate mb-0">{{ $user->designation }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                    <i class="ri-global-line"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Website :</p>
                                                                <a href="#" class="fw-semibold">www.velzon.com</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end card-body-->
                                        </div><!-- end card -->

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <h2 class="mb-4">Available Offers</h2>
                                                    @forelse ($offers as $offer)
                                                        <div class="col-md-6 mb-4">
                                                            <div class="card shadow-sm h-100">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4">
                                                                        <img class="img-fluid rounded-start h-100 w-100 object-fit-cover"
                                                                             src="{{ $offer->company?->user?->profile_image ? asset('storage/' . $offer->company->user->profile_image) : asset('assets/images/users/avatar-1.jpg') }}"
                                                                             alt="Company Image">

                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">{{ $offer->title }}</h5>
                                                                            <p class="card-text">{{ Str::limit($offer->description, 100) }}</p>
                                                                            <p class="card-text"><strong>Location:</strong> {{ $offer->location }}</p>
                                                                            <p class="card-text"><strong>Company:</strong> {{ $offer->company->company_name }}</p>
                                                                            <p class="card-text text-muted">
                                                                                {{ $offer->start_date }} – {{ $offer->end_date ?? 'Ongoing' }}
                                                                            </p>
                                                                            <form action="" method="POST">
                                                                                @csrf
                                                                                <button type="submit" class="btn btn-outline-success btn-sm">Apply Now</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                                                    @empty
                                                        <p>No offers available at the moment.</p>
                                                    @endforelse

                                                </div><!-- end card -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->

                                        <div class="card">
                                            <h2 class="mb-4 mt-5">Available Formations</h2>
                                            @forelse ($formations as $formation)
                                                <div class="col-md-6 mb-4">
                                                    <div class="card shadow-sm h-100">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img class="img-fluid rounded-start h-100 w-100 object-fit-cover"
                                                                     src="{{ $formation->centre?->user?->profile_image ? asset('storage/' . $formation->centre->user->profile_image) : asset('assets/images/users/avatar-1.jpg') }}"
                                                                     alt="Centre Image">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $formation->title }}</h5>
                                                                    <p class="card-text">{{ Str::limit($formation->description, 100) }}</p>
                                                                    <p class="card-text"><strong>Location:</strong> {{ $formation->location }}</p>
                                                                    <p class="card-text"><strong>Centre:</strong> {{ $formation->centre->user->name ?? 'N/A' }}</p>
                                                                    <p class="card-text text-muted">
                                                                        {{ $formation->start_date }} – {{ $formation->end_date ?? 'Ongoing' }}
                                                                    </p>
                                                                    <form action="" method="POST">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-outline-primary btn-sm">Apply Now</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                            @empty
                                                <p>No formations available at the moment.</p>
                                            @endforelse
                                            <!-- end card body -->
                                        </div><!-- end card -->

                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="tab-pane fade" id="activities" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Activities</h5>
                                        {{-- Show existing experiences --}}
                                        @foreach(auth()->user()->studentExperiences as $experience)
                                            <div class="card mt-3">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $experience->job_title }} at {{ $experience->company_name }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">{{ $experience->start_year }} - {{ $experience->end_year ?? 'Present' }}</h6>
                                                    <p class="card-text">{{ $experience->description }}</p>

                                                </div>
                                            </div>
                                        @endforeach                                    </div>
                                </div>
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane fade" id="projects" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none profile-project-warning">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Chat App Update</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">2 year Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-warning-subtle text-warning fs-10">Inprogress</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                                    J
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none profile-project-success">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">ABC Project Customization</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">2 month Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-primary-subtle text-primary fs-10"> Progress</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title rounded-circle bg-primary">
                                                                                    2+
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none profile-project-info">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Client - Frank Hook</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">1 hr Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-info-subtle text-info fs-10">New</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0"> Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                                    M
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none profile-project-primary">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Velzon Project</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">11 hr Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-success-subtle text-success fs-10">Completed</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none profile-project-danger">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Brand Logo Design</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">10 min Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-info-subtle text-info fs-10">New</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                                    E
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none profile-project-primary">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Chat App</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">8 hr Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-warning-subtle text-warning fs-10">Inprogress</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                                    R
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none profile-project-warning">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Project Update</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">48 min Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-warning-subtle text-warning fs-10">Inprogress</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none profile-project-success">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Client - Jennifer</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">30 min Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-primary-subtle text-primary fs-10">Process</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0"> Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none mb-xxl-0 profile-project-info">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Bsuiness Template - UI/UX design</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">7 month Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-success-subtle text-success fs-10">Completed</div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title rounded-circle bg-primary">
                                                                                    2+
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none mb-xxl-0  profile-project-success">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Update Project</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">1 month Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-info-subtle text-info fs-10">New</div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                                    A
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none mb-sm-0  profile-project-danger">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Bank Management System</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">10 month Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-success-subtle text-success fs-10">Completed</div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title rounded-circle bg-primary">
                                                                                    2+
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none mb-0  profile-project-primary">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">PSD to HTML Convert</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">29 min Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge bg-info-subtle text-info fs-10">New</div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mt-4">
                                                    <ul class="pagination pagination-separated justify-content-center mb-0">
                                                        <li class="page-item disabled">
                                                            <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="javascript:void(0);" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link">4</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link">5</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane fade" id="documents" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4">
                                            <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                            <div class="flex-shrink-0">
                                                <input class="form-control d-none" type="file" id="formFile">
                                                <label for="formFile" class="btn btn-danger"><i class="ri-upload-2-fill me-1 align-bottom"></i> Upload File</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless align-middle mb-0">
                                                        <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">File Name</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Size</th>
                                                            <th scope="col">Upload Date</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach(App\Models\StudentCertificate::where('user_id', auth()->id())->get() as $cert)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar-sm">
                                                                            <div class="avatar-title bg-danger-subtle text-danger rounded fs-20">
                                                                                <i class="ri-file-pdf-fill"></i>  <!-- PDF icon -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="ms-3 flex-grow-1">
                                                                            <h6 class="fs-15 mb-0">
                                                                                <a href="javascript:void(0);">{{ $cert->title }} - {{ basename($cert->certificate_path) }}</a>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>PDF File</td> <!-- File type -->
                                                                <td>{{ number_format(filesize(storage_path('app/public/' . $cert->certificate_path)) / 1024, 2) }} KB</td> <!-- File size -->
                                                                <td>{{ $cert->created_at->format('d M Y') }}</td> <!-- Upload Date -->
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink{{ $cert->id }}" data-bs-toggle="dropdown" aria-expanded="true">
                                                                            <i class="ri-equalizer-fill"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink{{ $cert->id }}">
                                                                            <li><a class="dropdown-item" href="{{ asset('storage/' . $cert->certificate_path) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                            <li><a class="dropdown-item" href="{{ asset('storage/' . $cert->certificate_path) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            <li class="dropdown-divider"></li>
                                                                            <li>
                                                                                <form action="{{ route('student-certificates.destroy', $cert->id) }}" method="POST" style="display:inline;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')">
                                                                                        <i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete
                                                                                    </button>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <a href="javascript:void(0);" class="text-success">
                                                        <i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            >
                            <!--end tab-pane-->
                        </div>
                        <!--end tab-content-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container-fluid -->
    </div><!-- End Page-content -->

  @endsection

