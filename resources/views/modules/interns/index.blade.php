@extends('layouts.app')

@section('page-content')
    
    <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="display-7">INTERNS</h2>
                                

                                <table id="interns-table" class="table table-striped table-hover dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>School</th>
                                            <th>Qualification</th>
                                            <th>Programme</th>
                                            <th>Level</th>
                                            <th>Email</th>
                                            <th>Actions</th>
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
    
        {{-- modals start --}}
            @include("modules.interns.modals.info")
        
        {{-- modals end --}}
    
@endsection
@push('scripts')
    <script>
        // GET ITEM
        var internsTable = $('#interns-table').DataTable({
            dom: "Bfrtip",
            ajax: {
             
                url: `${APP_URL}/api/interns`,
                type: "GET",
                
            },
            serverSide: false,
            ordering:true,
            processing: true,
            columns: [
                {
                    data:"code"
                },
                {
                    data: "fullname"
                },
                {
                    data: "school_name",
                },
                {
                    data: "qual_desc"
                },
                {
                    data: "prog_desc"
                },
                {
                    data:"level_desc"
                },
                {
                    data: "email"
                },
                {
                    data: null,
                    'render': function(data, type, full, meta) {
                        var html = '';
                          html += `<button type='button' data-row-transid='$this->transid'
                                                    rel='tooltip' class='btn  btn-primary btn-sm view-btn'>
                                                       <i class='fas fa-eye'></i>
                                                    </button>`;
                                                    
                            html += `<button type='button' data-row-transid='$this->transid'
                                                    rel='tooltip' class='btn m-2 btn-success btn-sm edit-btn'>
                                                       <i class='fas fa-edit'></i>
                                                    </button>`;
                        

                      
                            html += `<button type='button' data-row-transid='$this->transid'
                                                    rel='tooltip' class='btn btn-danger btn-sm delete-btn'>
                                                       <i class='fas fa-trash'></i>
                                                    </button>`
                        
                        return html;
                    },
                    className: "text-center",
                },
            ],
            responsive: true,
            buttons: [{
                    extend: 'print',
                    attr: {
                        class: "btn btn-sm btn-info mr-2 text-white"
                    },
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'copy',
                    attr: {
                        class: "btn btn-sm btn-info mr-2 text-white"
                    },
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'excel',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right mr-2 text-white"
                    },
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'pdf',
                    attr: {
                        class: "btn btn-sm btn-info rounded-right mr-2 text-white"
                    },
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    text: "Refresh",
                    attr: {
                        class: "ml-2 btn-warning btn btn-sm rounded  text-white"
                    },
                    action: function(e, dt, node, config) {
                        dt.ajax.reload(false, null);
                    }
                },
            ]
        });
    
            
            $("#interns-table").on("click", ".view-btn", function() {
                let data = internsTable.row($(this).parents('tr')).data();
               console.log(data);
                $("#info-intern-modal").modal("show");
                document.getElementById("info-intern-code").innerText =data.code;
                document.getElementById("info-intern-name").innerText =data.fullname;
                document.getElementById("info-intern-gender").innerText =data.gender;
                document.getElementById("info-intern-school").innerText =data.school_name;
                document.getElementById("info-intern-program").innerText =data.prog_desc;
                document.getElementById("info-intern-qual").innerText =data.qual_desc;
                document.getElementById("info-intern-level").innerText =data.level_desc;
                document.getElementById("info-intern-experience").innerText =data.experience;
                document.getElementById("info-intern-email").innerText =data.email;
                document.getElementById("info-intern-phone").innerText =data.phone;
                document.getElementById("info-intern-whatsapp").innerText =data.whatsapp;
                
                let cities = "";
                data.cities.forEach(city => cities += city.city_desc +" ,\n");
                document.getElementById("info-intern-cities").innerText = cities;
                
                let districts = "";
                data.districts.forEach(district => districts += district.district +" ,\n");
                document.getElementById("info-intern-districts").innerText = districts;
                
                let regions = "";
                data.regions.forEach(region => regions += region.description +" ,\n");
                document.getElementById("info-intern-regions").innerText = regions;
                
                let sectors = "";
                data.sectors.forEach(sector => sectors += sector.description +" ,\n");
                document.getElementById("info-intern-sectors").innerText = sectors;
               
            });
    
            
             $("#admin-products-table").on("click", ".delete-btn", function() {
                var data = adminProductTable.row($(this).parents("tr")).data();
                
                Swal.fire({
                    title: "",
                    text: "Are you sure you want to remove this record?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Delete"
    
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            text: "Deleting...",
                            showConfirmButton: false,
                            allowEscapeKey: false,
                            allowOutsideClick: false
                        });
                        $.ajax({
                            url: `${APP_URL}/api/products/delete/${data.code+':'+CREATEUSER}`,
                            method: "POST",
                        }).done(function(data) {
                            if (!data.ok) {
                                Swal.fire({
                                    text: data.msg,
                                    icon: "error"
                                });
                                return;
                            }
                            Swal.fire({
                                text: "Record Deleted Successfully",
                                icon: "success"
                            });
                            adminProductTable.ajax.reload(false, null);
                        }).fail((err) => {
                            console.log(err)
                            Swal.fire({
                                text: "Operation Failed",
                                icon: "error"
                            });
                        })
                    }
                })
    
            });
    
          
    
    </script>
@endpush