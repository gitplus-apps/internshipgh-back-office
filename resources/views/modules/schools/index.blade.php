@extends('layouts.app')

@section('page-content')
    
    <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="display-7">INTERNS</h2>
                                

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    {{-- Data is displayed here using ajax --}}
                                    <tbody>
                                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                

            </div>
            <!-- container-fluid -->
        </div>
    
@endsection