@extends('layouts.app')

@section('page-content')
    
    <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="display-8">SECTORS</h2>
                                

                                <table id="sectors-table" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Transid</th>
                                            <th>Sector Code</th>
                                            <th>Description</th>
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
    
@endsection

@push('scripts')
    <script>
        // GET ITEM
        var sectorsTable = $('#sectors-table').DataTable({
            dom: "Bfrtip",
            ajax: {
             
                url: `${APP_URL}/api/sectors`,
                type: "GET",
                
            },
            serverSide: false,
            ordering:true,
            processing: true,
            columns: [
                {
                    data: "transid"
                },
                {
                    data:"code"
                },
                {
                    data: "description"
                },
                {
                    data: null,
                    'render': function(data, type, full, meta) {
                        var html = '';
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
    
            
            $("#admin-products-table").on("click", ".edit-btn", function() {
                let data = adminProductTable.row($(this).parents('tr')).data();
               
                $("#update-product-modal").modal("show");
                $("#update-product-id").val(data.code);
                $("#update-product-itemname").val(data.itemname);
                $("#update-product-price").val(data.price);
             
    
                $("#update-product-category").val(data.category_id).trigger("change");
                $("#update-product-desc").val(data.desc);
                $("#update-product-shop").val(data.shopcode).trigger("change");
               
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