{{-- @extends('layouts.app')

@section('content')

<main class="py-6 bg-surface-secondary">
    <div class="container-fluid max-w-screen-md vstack gap-6"><div>
        <form>
            <div class="row g-5">
                
                <div class="col-md-6">
                    <div>
                        <label class="form-label">First name</label> 
                        <input type="text" class="form-control" id="first_name">
                    </div>
                </div>
            <div class="col-md-6">
                <div>
                    <label class="form-label">Last name</label> 
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label class="form-label" for="email">Email</label> 
                    <input type="email" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label class="form-label">Phone number</label> 
                    <input type="tel" class="form-control">
                </div>
            </div>
           
    
           
            <div class="col-12 text-end">
                
                <button type="submit" class="btn btn-md btn-primary">Save</button>
            </div>
        </div>
        </form>
        </div>
    
    </div>
</main>

@endsection --}}


@extends('layouts.app')

@section('content')
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid max-w-screen-md vstack gap-6">
            <div>
                <form action="{{ url('register_user') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <h3 class="text-danger">{{ session('status') }}</h3>
                    </div>
                    <div class="mb-5">
                        <h4>Personal Details</h4>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-6">
                            <div>
                                <input type="hidden" name="user_code" class="form-control" value="{{ auth()->user()->user_code }}">
                                
                                <label class="form-label">First name <span class="text-danger">*</span></label>
                                <input type="text" name="fname" class="form-control" id="first_name"
                                    value="{{ old('fname') }}">
                                @error('fname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Last name <span class="text-danger">*</span></label>
                                <input type="text" name="lname" class="form-control" value="{{ old('lname') }}">
                                @error('lname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="email">Middle Name</label>
                                <input type="text" name="mname" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Gender<span class="text-danger">*</span></label>
                                <select name="gender" id="" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Contact Details  --}}
                    <div class="my-5">
                        <h4>Contact Details</h4>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('fname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="email">Whatsapp Number<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp') }}"> 
                                @error('whatsapp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Academic --}}
                    <div class="my-5">
                        <h4>Academic Details</h4>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">School <span class="text-danger">*</span></label>
                                <select name="school_code" class="form-control s2 w-full">
                                    <option value="">--Select--</option>
                                    @foreach ($schools as $item)
                                        <option value="{{ $item->sch_code }}">{{ $item->sch_desc }}</option>
                                    @endforeach
                                </select>
                                @error('school_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Qualification<span class="text-danger">*</span></label>
                                <select name="qual_code" class="form-control s2 w-full">
                                    <option value="">--Select--</option>
                                    @foreach ($qualifications as $item)
                                        <option value="{{ $item->qual_code }}">{{ $item->qual_desc }}</option>
                                    @endforeach
                                </select>
                                @error('qual_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Select Programme<span class="text-danger">*</span></label>
                                <select name="prog_code" class="form-control s2 w-full">
                                    <option value="">--Select--</option>
                                    @foreach ($programmes as $item)
                                        <option value="{{ $item->prog_code }}">{{ $item->prog_desc }}</option>
                                    @endforeach
                                </select>
                                @error('prog_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Select level<span class="text-danger">*</span></label>
                                <select name="level_code" class="form-control s2 w-full">
                                    <option value="">--Select--</option>
                                    @foreach ($levels as $item)
                                        <option value="{{ $item->level_code }}">{{ $item->level_desc }}</option>
                                    @endforeach
                                </select>
                                @error('level_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Internship details  --}}
                    <div class="my-5">
                        <h4>Internship Details</h4>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Preferred Sectors(Choose Multiple) <span
                                        class="text-danger">*</span></label>
                                <select name="sectors[]" class="form-control s2 w-full" multiple>
                                    <option>--Select--</option>
                                    @foreach ($sectors as $item)
                                        <option value="{{ $item->sector_code }}">{{ $item->sector_desc }}</option>
                                    @endforeach
                                </select>
                                @error('sectors')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label">Prefferred Regions(Choose Mutiple) <span
                                        class="text-danger">*</span></label>
                                <select name="regions[]" class="form-control s2 w-full" multiple>
                                    <option>--Select--</option>
                                    @foreach ($regions as $item)
                                        <option value="{{ $item->code }}">{{ $item->description }}</option>
                                    @endforeach
                                </select>
                                @error('regions')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="districts">Preffered Districts(Choose Multiple)<span
                                        class="text-danger">*</span></label>
                                <select name="districts[]" class="form-control s2 w-full" multiple>
                                    <option>--Select--</option>
                                    @foreach ($districts as $item)
                                        <option value="{{ $item->code }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('districts')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="cities">Preffered Cities(Type multiple cities separated
                                    by ,)<span class="text-danger">*</span></label>
                                <input type="text" name="cities" class="form-control" placeholder="eg... Accra" value="{{ old('cities') }}">
                                @error('cities')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Experience --}}
                    <div class="my-5">
                        <h4>Experience</h4>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="experience">Work Experience <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="experience" class="form-control" placeholder="eg.2 years" value="{{ old('experience') }}">
                                @error('experience')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="job_roles">Preffered Job Roles(Choose Multiple) <span
                                        class="text-danger">*</span></label>
                                <select name="job_roles[]" class="form-control s2 w-full" multiple>
                                    <option value="">--Select--</option>
                                    @foreach ($jobroles as $item)
                                        <option value="{{ $item->role_code }}">{{ $item->role_desc }}</option>
                                    @endforeach
                                </select>
                                @error('job_roles')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- date  --}}
                    <div class="my-5">
                        <h4>Internship Duration</h4>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="start_date">Start Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                                @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="end_date">End Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Internship Type --}}
                    <div class="my-5">
                        <h4>Internship type</h4>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-6">
                            <div>
                                <label class="form-label" for="internship_type">Internship Type<span
                                        class="text-danger">*</span></label>
                                <select name="internship_type" class="form-control s2 w-full" value="{{ old('internship_type') }}">
                                    <option value="">--Select--</option>
                                    @foreach ($internship_type as $item)
                                        <option value="{{ $item->type_code }}">{{ $item->type_desc }}</option>
                                    @endforeach
                                </select>
                                @error('internship_type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="row g-5">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </main>
@endsection
