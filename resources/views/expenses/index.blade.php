@extends('layouts.dashboard')
@section('title', 'Expenses')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Expenses</h5>
                    <div class="card-tools">
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>
                            Add category
                        </button>
                        <a href="{{ route('expenses.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                            Expense
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                             
                                <th>Name</th>
                                <th>Category</th>
                                <th>Date created</th>
                                <th>Amount</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $key=>$expense)
                                <tr>
                                 
                                    <td>{{ $expense->name }}</td>
                                    <td>{{ \App\Models\ExpenseCategory::where('id', $expense->category)->value('name') }}</td>
                                    <td>{{ $expense->date }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->description }}</td>
                                   
                                </tr>
                            @endforeach
                            @if (count($expenses) == 0)
                                <tr>
                                    <td colspan="6">No expenses found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
                <div class="d-flex justify-content-center">
                  {{ $expenses->links() }}
                  </div>
            </div>
        </div>
        
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add expense category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ url('expense/category') }}" method="post">
                @csrf
            <!-- Modal Body -->
            <div class="modal-body">
                
                <!-- Name Input -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
                </div>

                

                <!-- Submit Button -->
               
               
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>  
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>
    </div>

  
@endsection
