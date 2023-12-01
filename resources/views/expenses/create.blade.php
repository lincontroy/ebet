@extends('layouts.dashboard')
@section('title', 'Create Expense')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Create Expense</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="row" action="{{ route('expenses.store') }}" method="post">
            @csrf
            <div class="col-md-6 mb-2">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Category</label>
                <select name="category" class="form-control">
                    <option value="">Select</option>
                   @foreach($expenseCategorys as $expenseCategory)
                   <option value="{{$expenseCategory->id}}">{{$expenseCategory->name}}</option>
                   @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-2">
                <label for="name">Expense date</label>
                <input type="date" name="date" id="name" placeholder="Date of expense"
                    class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Amount</label>
                <input type="text" name="amount" id="amount" placeholder="Amount"
                    class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}">
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-2">
                <label for="name">Description</label>
                <input type="text" name="description" id="amount" placeholder="Description"
                    class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>


<script>
    $('input[name="expiry"]').daterangepicker();
</script>
    <!-- /.card-body -->
@endsection