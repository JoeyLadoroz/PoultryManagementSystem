@extends('layouts.admin')


@section('content')

        @livewireStyles
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Egg Production
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" href="{{route('table.production.create')}}" data-bs-toggle="modal" data-bs-target="#addModal" style = "float:right">
                                    Add Egg
                                </button>
                                        <!-- Add Modal -->
                                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true" >
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="addModal">Add Egg</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('table.production.store')}}" method="POST">
        
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <input type="text" name="type" class="form-control"  placeholder="Enter Egg Type">
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label>Quantity</label>
                                                                <input type="text" name="quantity" class="form-control"  placeholder="Enter Quantity">
                                                            </div>
        
        
                                                            <div class="form-group">
                                                                <label>Date</label>
                                                                <input type="date" name="date" class="form-control"  >
                                                            </div>          
        
                                                            <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
                                                            <br>
                                                            <br>
                                                    </div>
                                             </form>
        
                                            </div>
                                            </div>
                                        </div>
                                        <!-- End Add Modal -->


                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true" >
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="">Edit</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="#" method="POST" id = "editprod" enctype="multipart/form-data">

                                                    @csrf
                                                    <input type="hidden" name="emp_id" id="emp_id">
                                                    <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <input type="text" name="type" id="type" class="form-control" id="egg_type" placeholder="Enter Egg Type">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Date</label>
                                                                <input type="date" name="date"  class="form-control" id="date" >
                                                            </div>     
                                                            
                                                            <div class="form-group">
                                                                <label>Quantity</label>
                                                                <input type="text" name="quantity" id="quantity" class="form-control" id="egg_quantity" placeholder="Enter Quantity">
                                                            </div>

                                                            <button type="submit" class="btn btn-success" id="sub-btn" style="float:right">Submit</button>
                                                            <br>
                                                            <br>
                                                    </div>
                                                </form>

                                            </div>
                                            </div>
                                        </div>
                                        <!-- End Edit Modal -->

                                         <!-- View Modal -->
                                         <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModal" aria-hidden="true" >
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="">view</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="#" method="POST" id = "editprod" enctype="multipart/form-data">

                                                    @csrf
                                                    <input type="hidden" name="emps_id" id="emps_id">
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label>Id</label>
                                                            <div class="col-md-10">
                                                                <label id="id"></label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Type</label>
                                                            <input type="text" name="type" id="type" class="form-control"  disabled>
                                                        </div>

                                                            <div class="form-group">
                                                                <label>Date</label>
                                                                <div class="col-md-10">
                                                                    <label id="date"></label>
                                                                </div>
                                                            </div>  
                                                            
                                                            <div class="form-group">
                                                                <label>quantity</label>
                                                                <div class="col-md-10">
                                                                    <label id="quantity"></label>
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-success" id="sub-btn" style="float:right">Submit</button>
                                                            <br>
                                                            <br>
                                                    </div>
                                                </form>

                                            </div>
                                            </div>
                                        </div>
                                        <!-- End View Modal -->

                            </h4>

                            @if (count($errors) > 0)
                                <div class = "alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error )
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{\Session::get('success')}}</p>

                                </div>
                                
                            @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id = "data-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                        <tbody>
                                            <?php $total = 0 ?>
                                            @foreach ($eggproductions as $eg )
                                                <tr>
                                                    <td>{{$eg['id']}}</td>
                                                    <td>{{$eg['type']}}</td>
                                                    <td>{{$eg['date']}}</td>
                                                    <td>{{$eg['quantity']}}</td>
                                                    <td>
                                                    <button class="btn-outline-primary edit" data-bs-toggle="modal" data-bs-target="#editModal" id="{{$eg['id']}}"><i class="fa fa-edit"></i>    Edit</button>                                                                        
                                                    <button class="btn-outline-success view" data-bs-toggle="modal" data-bs-target="#viewModal" id="{{$eg['id']}}"><i class="fa fa-eye"></i>     View</i></button>
                                                    <button class="btn-outline-danger" data-bs-toggle="modal" href="{{$eg['id']}}"><i class="fa fa-eye"></i>     Delete</i></button>
                                                    </td>
                                                </tr>
                                                <?php $total += $eg['quantity']?>
                                            @endforeach

                                        </tbody>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td>Total:{{$total}}</td>
                                        </tr>
                                      </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
        </div>  
@endsection

@push('scripts')
    
       <script>

                $(function(){

                    // edit product ajax request

                    $(document).on('click', '.edit', function(e) {
                            e.preventDefault();
                            let id = $(this).attr('id');
                            $.ajax({
                            url: '{{ route('table.production.edit') }}',
                            method: 'get',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                $("#type").val(response.type);
                                $("#date").val(response.date);
                                $("#quantity").val(response.quantity);

                                $("#emp_id").val(response.id);
                            }
                            });
                        });

                        // view product ajax request

                        $(document).on('click', '.view', function(e) {
                            e.preventDefault();
                            let id = $(this).attr('id');
                            $.ajax({
                            url: '{{ route('table.production.show') }}',
                            method: 'get',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                $("#id").val(response.id);
                                $("#type").val(response.type);
                                $("#date").val(response.date);
                                $("#quantity").val(response.quantity);

                                $("#emps_id").val(response.id);
                            }
                            });
                        });

                          // update employee ajax request

                    $("#editprod").submit(function(e) {
                            e.preventDefault();
                            const fd = new FormData(this);
                            $("#sub-btn").text('Updating...');
                            $.ajax({
                            url: '{{ route('table.production.update') }}',
                            method: 'post',
                            data: fd,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == 200) {
                                Swal.fire(
                                    'Updated!',
                                    'Product Updated Successfully!',
                                    'success'
                                )
                                fetchProducts();
                                }
                                $("#sub-btn").text('Update Products');
                                $("#editprod")[0].reset();
                                $("#editModal").modal('hide');

                                setTimeout(function() {
                                    location.href = '{{route('table.production.show')}}'
                                }, 1000);
                        }
                        });
                    });

                    fetchProducts();

                            function fetchProducts() {
                                $.ajax({
                                url: '{{ route('table.production.show') }}',
                                method: 'get',
                                success: function(response) {
                                }
                                });
                            }

                });

       </script>

@endpush


