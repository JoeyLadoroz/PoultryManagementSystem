@extends('layouts.admin')


@section('content')
        @livewireStyles
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Egg Sales
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style = "float:right">
                                    Add Sales
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sales</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('table.sales.store')}}" method="POST">

                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="text" name="quantity" class="form-control" id="egg_quantity" placeholder="Enter Egg Type">
                                                </div>

                                                <div class="form-group">
                                                    <label>Revenue</label>
                                                    <input type="text" name="revenue" class="form-control" id="egg_revenue" placeholder="Enter Revenue">
                                                </div>


                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" name="date" class="form-control" id="date" >
                                                </div>          

                                                <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
                                                <br>
                                                <br>
                                            </div>
                                     </form>

                                    </div>
                                    </div>
                                </div>
                                </div>
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
                                            <th>Quantity</th>
                                            <th>Revenue</th>
                                            <th>Date</th>
                                        </tr>
                                        <tbody>
                                            @foreach ($eggsales as $es )
                                                <tr>
                                                    <td>{{$es['id']}}</td>
                                                    <td>{{$es['quantity']}}</td>
                                                    <td>{{$es['revenue']}}</td>
                                                    <td>{{$es['date']}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
        </div>  
   
@endsection
