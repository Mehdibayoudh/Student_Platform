@extends('layouts.appstudent')

@section('title', 'Studentprofile')

@section('content')

    <style>
        .profile-wid-bg::before {
            background: linear-gradient(to top, #171e32, #3e8829) !important;
        }

    </style>

    <div class="page-content" >
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
                                        <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Offers</span>
                                    </a>
                                </li>


                            </ul>
                            <div class="flex-shrink-0">
                                <a href="{{ route('profileupdatecentre') }}" class="btn btn-success">
                                    <i class="ri-edit-box-line align-bottom"></i> Edit Profile|Edit Offers
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
                                                <h5 class="card-title mb-3">Info</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Company Name </th>
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
                                                    <div class="card-header align-items-center d-flex">
                                                        <h4 class="card-title mb-0  me-2">Recent Activity</h4>
                                                        <div class="flex-shrink-0 ms-auto">
                                                            <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#today" role="tab">
                                                                        Today
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#weekly" role="tab">
                                                                        Weekly
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#monthly" role="tab">
                                                                        Monthly
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content text-muted">
                                                            <div class="tab-pane active" id="today" role="tabpanel">
                                                                <div class="profile-timeline">
                                                                    <div class="accordion accordion-flush" id="todayExample">
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="headingOne">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0">
                                                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Jacqueline Steve
                                                                                            </h6>
                                                                                            <small class="text-muted">We has changed 2 attributes on 05:16PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5">
                                                                                    In an awareness campaign, it is vital for people to begin put 2 and 2 together and begin to recognize your cause. Too much or too little spacing, as in the example below, can make things unpleasant for the reader. The goal is to make your text as comfortable to read as possible. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="headingTwo">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0 avatar-xs">
                                                                                            <div class="avatar-title bg-light text-success rounded-circle">
                                                                                                M
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Megan Elmore
                                                                                            </h6>
                                                                                            <small class="text-muted">Adding a new event with attachments - 04:45PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5">
                                                                                    <div class="row g-2">
                                                                                        <div class="col-auto">
                                                                                            <div class="d-flex border border-dashed p-2 rounded position-relative">
                                                                                                <div class="flex-shrink-0">
                                                                                                    <i class="ri-image-2-line fs-17 text-danger"></i>
                                                                                                </div>
                                                                                                <div class="flex-grow-1 ms-2">
                                                                                                    <h6>
                                                                                                        <a href="javascript:void(0);" class="stretched-link">Business Template - UI/UX design</a>
                                                                                                    </h6>
                                                                                                    <small>685 KB</small>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            <div class="d-flex border border-dashed p-2 rounded position-relative">
                                                                                                <div class="flex-shrink-0">
                                                                                                    <i class="ri-file-zip-line fs-17 text-info"></i>
                                                                                                </div>
                                                                                                <div class="flex-grow-1 ms-2">
                                                                                                    <h6 class="mb-0">
                                                                                                        <a href="javascript:void(0);" class="stretched-link">Bank Management System - PSD</a>
                                                                                                    </h6>
                                                                                                    <small>8.78 MB</small>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="headingThree">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapsethree" aria-expanded="false">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0">
                                                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1"> New ticket received</h6>
                                                                                            <small class="text-muted mb-2">User <span class="text-secondary">Erica245</span> submitted a ticket - 02:33PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="headingFour">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="true">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0 avatar-xs">
                                                                                            <div class="avatar-title bg-light text-muted rounded-circle">
                                                                                                <i class="ri-user-3-fill"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Nancy Martino
                                                                                            </h6>
                                                                                            <small class="text-muted">Commented on 12:57PM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5 fst-italic">
                                                                                    " A wonderful serenity has
                                                                                    taken possession of my
                                                                                    entire soul, like these
                                                                                    sweet mornings of spring
                                                                                    which I enjoy with my whole
                                                                                    heart. Each design is a new,
                                                                                    unique piece of art birthed
                                                                                    into this world, and while
                                                                                    you have the opportunity to
                                                                                    be creative and make your
                                                                                    own style choices. "
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="headingFive">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="true">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0">
                                                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Lewis Arnold
                                                                                            </h6>
                                                                                            <small class="text-muted">Create new project buildng product - 10:05AM</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5">
                                                                                    <p class="text-muted mb-2"> Every team project can have a velzon. Use the velzon to share information with your team to understand and contribute to your project.</p>
                                                                                    <div class="avatar-group">
                                                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Christi">
                                                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                                                        </a>
                                                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Frank Hook">
                                                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs">
                                                                                        </a>
                                                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title=" Ruby">
                                                                                            <div class="avatar-xs">
                                                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                                                    R
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="more">
                                                                                            <div class="avatar-xs">
                                                                                                <div class="avatar-title rounded-circle">
                                                                                                    2+
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end accordion-->
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="weekly" role="tabpanel">
                                                                <div class="profile-timeline">
                                                                    <div class="accordion accordion-flush" id="weeklyExample">
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading6">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse6" aria-expanded="true">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0">
                                                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Joseph Parker
                                                                                            </h6>
                                                                                            <small class="text-muted">New people joined with our company - Yesterday</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapse6" class="accordion-collapse collapse show" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5">
                                                                                    It makes a statement, it’s
                                                                                    impressive graphic design.
                                                                                    Increase or decrease the
                                                                                    letter spacing depending on
                                                                                    the situation and try, try
                                                                                    again until it looks right,
                                                                                    and each letter has the
                                                                                    perfect spot of its own.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading7">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse7" aria-expanded="false">
                                                                                    <div class="d-flex">
                                                                                        <div class="avatar-xs">
                                                                                            <div class="avatar-title rounded-circle bg-light text-danger">
                                                                                                <i class="ri-shopping-bag-line"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Your order is placed <span class="badge bg-success-subtle text-success align-middle">Completed</span>
                                                                                            </h6>
                                                                                            <small class="text-muted">These customers can rest assured their order has been placed - 1 week Ago</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading8">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse8" aria-expanded="true">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0 avatar-xs">
                                                                                            <div class="avatar-title bg-light text-success rounded-circle">
                                                                                                <i class="ri-home-3-line"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Velzon admin dashboard templates layout upload
                                                                                            </h6>
                                                                                            <small class="text-muted">We talked about a project on linkedin - 1 week Ago</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapse8" class="accordion-collapse collapse show" aria-labelledby="heading8" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5 fst-italic">
                                                                                    Powerful, clean & modern
                                                                                    responsive bootstrap 5 admin
                                                                                    template. The maximum file
                                                                                    size for uploads in this demo :
                                                                                    <div class="row mt-2">
                                                                                        <div class="col-xxl-6">
                                                                                            <div class="row border border-dashed gx-2 p-2">
                                                                                                <div class="col-3">
                                                                                                    <img src="assets/images/small/img-3.jpg" alt="" class="img-fluid rounded" />
                                                                                                </div>
                                                                                                <!--end col-->
                                                                                                <div class="col-3">
                                                                                                    <img src="assets/images/small/img-5.jpg" alt="" class="img-fluid rounded" />
                                                                                                </div>
                                                                                                <!--end col-->
                                                                                                <div class="col-3">
                                                                                                    <img src="assets/images/small/img-7.jpg" alt="" class="img-fluid rounded" />
                                                                                                </div>
                                                                                                <!--end col-->
                                                                                                <div class="col-3">
                                                                                                    <img src="assets/images/small/img-9.jpg" alt="" class="img-fluid rounded" />
                                                                                                </div>
                                                                                                <!--end col-->
                                                                                            </div>
                                                                                            <!--end row-->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading9">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse9" aria-expanded="false">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0">
                                                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                New ticket created <span class="badge bg-info-subtle text-info align-middle">Inprogress</span>
                                                                                            </h6>
                                                                                            <small class="text-muted mb-2">User <span class="text-secondary">Jack365</span> submitted a ticket - 2 week Ago</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading10">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse10" aria-expanded="true">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0">
                                                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Jennifer Carter
                                                                                            </h6>
                                                                                            <small class="text-muted">Commented - 4 week Ago</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5">
                                                                                    <p class="text-muted fst-italic mb-2">
                                                                                        " This is an awesome
                                                                                        admin dashboard
                                                                                        template. It is
                                                                                        extremely well
                                                                                        structured and uses
                                                                                        state of the art
                                                                                        components (e.g. one of
                                                                                        the only templates using
                                                                                        boostrap 5.1.3 so far).
                                                                                        I integrated it into a
                                                                                        Rails 6 project. Needs
                                                                                        manual integration work
                                                                                        of course but the
                                                                                        template structure made
                                                                                        it easy. "</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end accordion-->
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="monthly" role="tabpanel">
                                                                <div class="profile-timeline">
                                                                    <div class="accordion accordion-flush" id="monthlyExample">
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading11">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse11" aria-expanded="false">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0 avatar-xs">
                                                                                            <div class="avatar-title bg-light text-success rounded-circle">
                                                                                                M
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Megan Elmore
                                                                                            </h6>
                                                                                            <small class="text-muted">Adding a new event with attachments - 1 month Ago.</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapse11" class="accordion-collapse collapse show" aria-labelledby="heading11" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5">
                                                                                    <div class="row g-2">
                                                                                        <div class="col-auto">
                                                                                            <div class="d-flex border border-dashed p-2 rounded position-relative">
                                                                                                <div class="flex-shrink-0">
                                                                                                    <i class="ri-image-2-line fs-17 text-danger"></i>
                                                                                                </div>
                                                                                                <div class="flex-grow-1 ms-2">
                                                                                                    <h6 class="mb-0">
                                                                                                        <a href="javascript:void(0);" class="stretched-link">Business Template - UI/UX design</a>
                                                                                                    </h6>
                                                                                                    <small>685 KB</small>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            <div class="d-flex border border-dashed p-2 rounded position-relative">
                                                                                                <div class="flex-shrink-0">
                                                                                                    <i class="ri-file-zip-line fs-17 text-info"></i>
                                                                                                </div>
                                                                                                <div class="flex-grow-1 ms-2">
                                                                                                    <h6 class="mb-0">
                                                                                                        <a href="javascript:void(0);" class="stretched-link">Bank Management System - PSD</a>
                                                                                                    </h6>
                                                                                                    <small>8.78 MB</small>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            <div class="d-flex border border-dashed p-2 rounded position-relative">
                                                                                                <div class="flex-shrink-0">
                                                                                                    <i class="ri-file-zip-line fs-17 text-info"></i>
                                                                                                </div>
                                                                                                <div class="flex-grow-1 ms-2">
                                                                                                    <h6 class="mb-0">
                                                                                                        <a href="javascript:void(0);" class="stretched-link">Bank Management System - PSD</a>
                                                                                                    </h6>
                                                                                                    <small>8.78 MB</small>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading12">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse12" aria-expanded="true">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0">
                                                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Jacqueline Steve
                                                                                            </h6>
                                                                                            <small class="text-muted">We has changed 2 attributes on 3 month Ago</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapse12" class="accordion-collapse collapse show" aria-labelledby="heading12" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5">
                                                                                    In an awareness campaign, it
                                                                                    is vital for people to begin
                                                                                    put 2 and 2 together and
                                                                                    begin to recognize your
                                                                                    cause. Too much or too
                                                                                    little spacing, as in the
                                                                                    example below, can make
                                                                                    things unpleasant for the
                                                                                    reader. The goal is to make
                                                                                    your text as comfortable to
                                                                                    read as possible. A
                                                                                    wonderful serenity has taken
                                                                                    possession of my entire
                                                                                    soul, like these sweet
                                                                                    mornings of spring which I
                                                                                    enjoy with my whole heart.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading13">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse13" aria-expanded="false">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0">
                                                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                New ticket received
                                                                                            </h6>
                                                                                            <small class="text-muted mb-2">User <span class="text-secondary">Erica245</span> submitted a ticket - 5 month Ago</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading14">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse14" aria-expanded="true">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0 avatar-xs">
                                                                                            <div class="avatar-title bg-light text-muted rounded-circle">
                                                                                                <i class="ri-user-3-fill"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Nancy Martino
                                                                                            </h6>
                                                                                            <small class="text-muted">Commented on 24 Nov, 2021.</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapse14" class="accordion-collapse collapse show" aria-labelledby="heading14" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5 fst-italic">
                                                                                    " A wonderful serenity has
                                                                                    taken possession of my
                                                                                    entire soul, like these
                                                                                    sweet mornings of spring
                                                                                    which I enjoy with my whole
                                                                                    heart. Each design is a new,
                                                                                    unique piece of art birthed
                                                                                    into this world, and while
                                                                                    you have the opportunity to
                                                                                    be creative and make your
                                                                                    own style choices. "
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header" id="heading15">
                                                                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse15" aria-expanded="true">
                                                                                    <div class="d-flex">
                                                                                        <div class="flex-shrink-0">
                                                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1 ms-3">
                                                                                            <h6 class="fs-14 mb-1">
                                                                                                Lewis Arnold
                                                                                            </h6>
                                                                                            <small class="text-muted">Create new project buildng product - 8 month Ago</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div id="collapse15" class="accordion-collapse collapse show" aria-labelledby="heading15" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body ms-2 ps-5">
                                                                                    <p class="text-muted mb-2">
                                                                                        Every team project can
                                                                                        have a velzon. Use the
                                                                                        velzon to share
                                                                                        information with your
                                                                                        team to understand and
                                                                                        contribute to your
                                                                                        project.</p>
                                                                                    <div class="avatar-group">
                                                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Christi">
                                                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                                                        </a>
                                                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Frank Hook">
                                                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs">
                                                                                        </a>
                                                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title=" Ruby">
                                                                                            <div class="avatar-xs">
                                                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                                                    R
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="more">
                                                                                            <div class="avatar-xs">
                                                                                                <div class="avatar-title rounded-circle">
                                                                                                    2+
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end accordion-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->


                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="tab-pane fade" id="activities" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">My Offers</h5>


                                    </div>
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

