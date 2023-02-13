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
                                <button type="button" class="btn btn-primary" href="{{route('table.production.create')}}" data-bs-toggle="modal" data-bs-target="#exampleModal" style = "float:right">
                                    Add Egg
                                </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Egg</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('table.production.store')}}" method="POST">
        
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
    
                                                         <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                         --}}
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <input type="text" name="type" class="form-control" id="egg_type" placeholder="Enter Egg Type">
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label>Quantity</label>
                                                                <input type="text" name="quantity" class="form-control" id="egg_quantity" placeholder="Enter Quantity">
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
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                        </tr>
                                        <tbody>
                                            @foreach ($eggproductions as $eg )
                                                <tr>
                                                    <td>{{$eg['id']}}</td>
                                                    <td>{{$eg['type']}}</td>
                                                    <td>{{$eg['date']}}</td>
                                                    <td>{{$eg['quantity']}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td>Total:</td>
                                        </tr>
                                      </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
        
        
@endsection
