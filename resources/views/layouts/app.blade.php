<!doctype html>
<html lang="en" data-theme="dark">
<!-- Mirrored from clever-dashboard.webpixels.work/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:05:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
 
    <title>Internship - Ghana</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/utilities.css')}}"><!-- Google Tag Manager -->
    <link rel="icon" href="{{asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">
    <!-- End Google Tag Manager -->
    <script defer data-domain="webpixels.works" src="https://plausible.io/js/plausible.js"></script>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        
        @include('includes.intern.sidebar')
        
        <div class="flex-lg-1 h-screen overflow-y-lg-auto">
            @include('includes.intern.header')
            <header>
                <div class="container-fluid">
                    <div class="border-bottom pt-6">
                        <div class="row align-items-center">
                            <div class="col-sm col-12">
                                <h1 class="h2 ls-tight"><span class="d-inline-block me-3">👋</span>Hi, {{auth()->user()->username}}!</h1>
                            </div>
                            <div class="col-sm-auto col-12 mt-4 mt-sm-0">
                                <div class="hstack gap-2 justify-content-sm-end"><a href="#modalExport"
                                        class="btn btn-sm btn-neutral border-base" data-bs-toggle="modal"><span
                                            class="pe-2"><i class="bi bi-people-fill"></i> </span><span>Share</span>
                                    </a><a href="#offcanvasCreate" class="btn btn-sm btn-primary"
                                        data-bs-toggle="offcanvas"><span class="pe-2"><i
                                                class="bi bi-plus-square-dotted"></i> </span><span>Create</span></a>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs overflow-x border-0">
                            <li class="nav-item"><a href="#" class="nav-link active">View all</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Most recent</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Popular</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <main class="py-6 bg-surface-secondary">
                <div class="offcanvas offcanvas-end w-full w-lg-1/3" data-bs-scroll="true" data-bs-backdrop="true"
                    tabindex="-1" id="offcanvasCreate" aria-labelledby="offcanvasCreateLabel">
                    <div class="offcanvas-header border-bottom py-5 bg-surface-secondary">
                        <h5 class="offcanvas-title" id="offcanvasCreateLabel">Create a new project</h5><button
                            type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body vstack gap-5">
                        <div><label class="form-label">Name</label> <input type="text" class="form-control"
                                placeholder="Project name"> <span class="d-block mt-2 text-sm text-muted">Make it
                                unique.</span></div>
                        <div><label class="form-label">Description</label> <textarea class="form-control"
                                placeholder="Project description ..." rows="2"></textarea> <span
                                class="d-block mt-2 text-sm text-muted">Make it unique.</span></div>
                        <hr class="my-0">
                        <div><label class="form-label">Select view</label>
                            <div class="hstack gap-3">
                                <div class="form-item-checkable"><input class="form-item-check" type="radio"
                                        name="project-view" id="project-view-kanban" checked="checked"> <label
                                        class="form-item" for="project-view-kanban"><span
                                            class="form-item-click d-inline-flex align-items-center justify-content-center form-control w-24 h-24 text-center text-muted"><i
                                                class="bi bi-kanban" style="font-size:2rem"></i></span></label></div>
                                <div class="form-item-checkable"><input class="form-item-check" type="radio"
                                        name="project-view" id="project-view-list"> <label class="form-item"
                                        for="project-view-list"><span
                                            class="form-item-click d-inline-flex align-items-center justify-content-center form-control w-24 h-24 text-center text-muted"><i
                                                class="bi bi-view-list" style="font-size:2rem"></i></span></label></div>
                                <div class="form-item-checkable"><input class="form-item-check" type="radio"
                                        name="project-view" id="project-view-table"> <label class="form-item"
                                        for="project-view-table"><span
                                            class="form-item-click d-inline-flex align-items-center justify-content-center form-control w-24 h-24 text-center text-muted"><i
                                                class="bi bi-table" style="font-size:2rem"></i></span></label></div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="vstack gap-4">
                            <div class="d-flex gap-3"><input class="form-check-input flex-shrink-0 text-lg" type="radio"
                                    name="projecy-privacy" checked="checked">
                                <div class="pt-1 form-checked-content">
                                    <h6 class="mb-1 lh-relaxed">Private</h6><span class="d-block text-muted text-sm"><i
                                            class="bi bi-lock-fill me-1"></i> Only you will be able to see this
                                        project</span>
                                </div>
                            </div>
                            <div class="d-flex gap-3"><input class="form-check-input flex-shrink-0 text-lg" type="radio"
                                    name="projecy-privacy">
                                <div class="pt-1 form-checked-content">
                                    <h6 class="mb-1 lh-relaxed">Make it public</h6><span
                                        class="d-block text-muted text-sm"><i class="bi bi-people-fill me-1"></i>
                                        Everyone in this workspace will be able to see this project</span>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="row gx-4">
                            <div class="col-md">
                                <div><label class="form-label">Client</label> <select class="form-select">
                                        <option>Webpixels</option>
                                        <option>Apple</option>
                                        <option>Elrond</option>
                                    </select></div>
                            </div>
                            <div class="col-auto align-self-end"><span
                                    class="d-inline-block py-3 font-semibold text-muted">or</span></div>
                            <div class="col-md-auto align-self-end"><button type="button" class="btn btn-neutral"><i
                                        class="bi bi-plus-lg me-2"></i>New client</button></div>
                        </div>
                        <div class="row gx-4">
                            <div class="col-md-6">
                                <div><label class="form-label">Start date</label>
                                    <div class="input-group input-group-inline datepicker"><span
                                            class="input-group-text pe-2"><i class="bi bi-calendar"></i> </span><input
                                            type="text" class="form-control" placeholder="Select date" data-input></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div><label class="form-label">Due date</label>
                                    <div class="input-group input-group-inline datepicker"><span
                                            class="input-group-text pe-2"><i class="bi bi-calendar"></i> </span><input
                                            type="text" class="form-control" placeholder="Select date" data-input></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer py-2 bg-surface-secondary"><button type="button"
                            class="btn btn-sm btn-neutral" data-bs-dismiss="offcanvas">Close</button> <button
                            type="button" class="btn btn-sm btn-primary">Save</button></div>
                </div>
                <div class="modal fade" id="modalExport" tabindex="-1" aria-labelledby="modalExport" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content shadow-3">
                            <div class="modal-header">
                                <div class="icon icon-shape rounded-3 bg-soft-primary text-primary text-lg me-4"><i
                                        class="bi bi-globe"></i></div>
                                <div>
                                    <h5 class="mb-1">Share to web</h5><small class="d-block text-xs text-muted">Publish
                                        and share link with anyone</small>
                                </div>
                                <div class="ms-auto">
                                    <div class="form-check form-switch me-n2"><input class="form-check-input"
                                            type="checkbox" id="flexSwitchCheckChecked" checked="checked"> <label
                                            class="form-check-label" for="flexSwitchCheckChecked"></label></div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center mb-5">
                                    <div>
                                        <p class="text-sm">Anyone with this link <span
                                                class="font-bold text-heading">can view</span></p>
                                    </div>
                                    <div class="ms-auto"><a href="#" class="text-sm font-semibold">Settings</a></div>
                                </div>
                                <div>
                                    <div class="input-group input-group-inline"><input type="email" class="form-control"
                                            placeholder="username" value="https://webpixels.io/your-amazing-link"> <span
                                            class="input-group-text"><i class="bi bi-clipboard"></i></span></div><span
                                        class="mt-2 valid-feedback">Looks good!</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="me-auto"><a href="#" class="text-sm font-semibold"><i
                                            class="bi bi-clipboard me-2"></i>Copy link</a></div><button type="button"
                                    class="btn btn-sm btn-neutral" data-bs-dismiss="modal">Close</button> <button
                                    type="button" class="btn btn-sm btn-success">Share file</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row g-6 mb-6">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <h5 class="mb-0">Orders</h5><button
                                        class="btn btn-sm btn-neutral ms-auto">Export</button>
                                </div>
                                <div class="px-4">
                                    <div id="chart-line" data-height="300"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card h-full">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-center">
                                        <h5 class="mb-0">Top Performance</h5>
                                        <div class="ms-auto text-end"><a href="#" class="text-sm font-semibold">See
                                                all</a></div>
                                    </div>
                                    <div class="list-group gap-4">
                                        <div class="list-group-item d-flex align-items-center border rounded">
                                            <div class="me-4">
                                                <div class="avatar rounded-circle"><img alt="..."
                                                        src="img/people/img-1.jpg"></div>
                                            </div>
                                            <div class="flex-fill"><a href="#"
                                                    class="d-block h6 font-semibold mb-1">Norman Mohrbacher</a><span
                                                    class="d-block text-sm text-muted">UI Designer</span></div>
                                            <div class="ms-auto text-end">
                                                <div class="dropdown"><a class="text-muted" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><i
                                                            class="bi bi-three-dots-vertical"></i></a>
                                                    <div class="dropdown-menu"><a href="#!" class="dropdown-item">Action
                                                        </a><a href="#!" class="dropdown-item">Another action </a><a
                                                            href="#!" class="dropdown-item">Something else here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center border rounded">
                                            <div class="me-4">
                                                <div class="avatar rounded-circle"><img alt="..."
                                                        src="img/people/img-2.jpg"></div>
                                            </div>
                                            <div class="flex-fill"><a href="#"
                                                    class="d-block h6 font-semibold mb-1">Leeann Monnet</a><span
                                                    class="d-block text-sm text-muted">Web Developer</span></div>
                                            <div class="ms-auto text-end">
                                                <div class="dropdown"><a class="text-muted" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><i
                                                            class="bi bi-three-dots-vertical"></i></a>
                                                    <div class="dropdown-menu"><a href="#!" class="dropdown-item">Action
                                                        </a><a href="#!" class="dropdown-item">Another action </a><a
                                                            href="#!" class="dropdown-item">Something else here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center border rounded">
                                            <div class="me-4">
                                                <div class="avatar rounded-circle"><img alt="..."
                                                        src="img/people/img-3.jpg"></div>
                                            </div>
                                            <div class="flex-fill"><a href="#"
                                                    class="d-block h6 font-semibold mb-1">Kathe Rahimi</a><span
                                                    class="d-block text-sm text-muted">Marketing Team</span></div>
                                            <div class="ms-auto text-end">
                                                <div class="dropdown"><a class="text-muted" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><i
                                                            class="bi bi-three-dots-vertical"></i></a>
                                                    <div class="dropdown-menu"><a href="#!" class="dropdown-item">Action
                                                        </a><a href="#!" class="dropdown-item">Another action </a><a
                                                            href="#!" class="dropdown-item">Something else here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-6 mb-6">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Budget</span>
                                            <span class="h3 font-bold mb-0">$750.90</span></div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                <i class="bi bi-credit-card"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm"><span
                                            class="badge badge-pill bg-soft-success text-success me-2"><i
                                                class="bi bi-arrow-up me-1"></i>30% </span><span
                                            class="text-nowrap text-xs text-muted">Since last month</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">New
                                                projects</span> <span class="h3 font-bold mb-0">215</span></div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle"><i
                                                    class="bi bi-people"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm"><span
                                            class="badge badge-pill bg-soft-success text-success me-2"><i
                                                class="bi bi-arrow-up me-1"></i>23% </span><span
                                            class="text-nowrap text-xs text-muted">Since last week</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Total
                                                hours</span> <span class="h3 font-bold mb-0">1.400</span></div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle"><i
                                                    class="bi bi-clock-history"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm"><span
                                            class="badge badge-pill bg-soft-danger text-danger me-2"><i
                                                class="bi bi-arrow-down me-1"></i>-10% </span><span
                                            class="text-nowrap text-xs text-muted">Since last month</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Work
                                                load</span> <span class="h3 font-bold mb-0">95%</span></div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white text-lg rounded-circle"><i
                                                    class="bi bi-minecart-loaded"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm"><span
                                            class="badge badge-pill bg-soft-success text-success me-2"><i
                                                class="bi bi-arrow-up me-1"></i>15% </span><span
                                            class="text-nowrap text-xs text-muted">Since yestearday</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h5 class="mb-0">Latest projects</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Team</th>
                                        <th scope="col">Completion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img alt="..." src="img/social/airbnb.svg"
                                                class="avatar avatar-sm rounded-circle me-2"> <a
                                                class="text-heading font-semibold" href="#">Website Redesign</a></td>
                                        <td>23-01-2022</td>
                                        <td><span class="badge badge-lg badge-dot"><i class="bg-warning"></i>In
                                                progress</span></td>
                                        <td>
                                            <div class="avatar-group"><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-1.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-3.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-4.jpg"></a></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><span class="me-2">38%</span>
                                                <div>
                                                    <div class="progress" style="width:100px">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"
                                                            style="width:38%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button
                                                type="button"
                                                class="btn btn-sm btn-square btn-neutral text-danger-hover"><i
                                                    class="bi bi-trash"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><img alt="..." src="img/social/amazon.svg"
                                                class="avatar avatar-sm rounded-circle me-2"> <a
                                                class="text-heading font-semibold" href="#">E-commerce App</a></td>
                                        <td>23-01-2022</td>
                                        <td><span class="badge badge-lg badge-dot"><i class="bg-success"></i>Done</span>
                                        </td>
                                        <td>
                                            <div class="avatar-group"><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-1.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-3.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-4.jpg"></a></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><span class="me-2">83%</span>
                                                <div>
                                                    <div class="progress" style="width:100px">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"
                                                            style="width:83%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button
                                                type="button"
                                                class="btn btn-sm btn-square btn-neutral text-danger-hover"><i
                                                    class="bi bi-trash"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><img alt="..." src="img/social/bootstrap.svg"
                                                class="avatar avatar-sm rounded-circle me-2"> <a
                                                class="text-heading font-semibold" href="#">Learning Platform</a></td>
                                        <td>23-01-2022</td>
                                        <td><span class="badge badge-lg badge-dot"><i class="bg-danger"></i>Project at
                                                risk</span></td>
                                        <td>
                                            <div class="avatar-group"><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-1.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-3.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-4.jpg"></a></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><span class="me-2">4%</span>
                                                <div>
                                                    <div class="progress" style="width:100px">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"
                                                            style="width:4%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button
                                                type="button"
                                                class="btn btn-sm btn-square btn-neutral text-danger-hover"><i
                                                    class="bi bi-trash"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><img alt="..." src="img/social/dribbble.svg"
                                                class="avatar avatar-sm rounded-circle me-2"> <a
                                                class="text-heading font-semibold" href="#">Design Portfolio</a></td>
                                        <td>23-01-2022</td>
                                        <td><span class="badge badge-lg badge-dot"><i class="bg-warning"></i>In
                                                progress</span></td>
                                        <td>
                                            <div class="avatar-group"><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-1.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-3.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-4.jpg"></a></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><span class="me-2">10%</span>
                                                <div>
                                                    <div class="progress" style="width:100px">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"
                                                            style="width:10%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button
                                                type="button"
                                                class="btn btn-sm btn-square btn-neutral text-danger-hover"><i
                                                    class="bi bi-trash"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><img alt="..." src="img/social/spotify.svg"
                                                class="avatar avatar-sm rounded-circle me-2"> <a
                                                class="text-heading font-semibold" href="#">Our team&#39;s playlist</a>
                                        </td>
                                        <td>23-01-2022</td>
                                        <td><span class="badge badge-lg badge-dot"><i class="bg-warning"></i>In
                                                progress</span></td>
                                        <td>
                                            <div class="avatar-group"><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-1.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-3.jpg"> </a><a href="#"
                                                    class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img
                                                        alt="..." src="img/people/img-4.jpg"></a></div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center"><span class="me-2">83%</span>
                                                <div>
                                                    <div class="progress" style="width:100px">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"
                                                            style="width:83%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button
                                                type="button"
                                                class="btn btn-sm btn-square btn-neutral text-danger-hover"><i
                                                    class="bi bi-trash"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
<!-- Mirrored from clever-dashboard.webpixels.work/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:06:53 GMT -->

</html>