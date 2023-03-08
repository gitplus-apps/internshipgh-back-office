@extends('layouts.app')

@section('content')

<main class="py-6 bg-surface-secondary">
    <div class="container-fluid max-w-screen-md vstack gap-6"><div>
        <div class="mb-5">
            <h4>Contact Information</h4>
        </div>
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

@endsection