@extends('layouts.dashboard')

@section('title', 'Transactions')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title m-0">Search Transaction</h5>
            </div>
            <div class="card-body">
                <form class="row" method="GET">
                <div class="col-md-2 mb-2">
                <label for="date">Channel<label>
                    <select name="channel" class="form-control">
                        <option value="s">Select channel</option>
                        @foreach($channels as $channel)
                        <option value="{{$channel->channel_name}}">{{$channel->channel_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="col-md-2 mb-2">
                    <label for="district">District<label>
                    <select name="district" class="form-control">
                        <option value="d">Select District</option>
                        @foreach($districts as $district)
                        <option value="{{$district->name}}">{{$district->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                    <div class="col-md-2 mb-2">
                        <label for="date">From<label>
                        <input type="date" class="form-control" name="from" placeholder="From">
                    </div>
                    <div class="col-md-2 mb-2">
                    <label for="date">To<label>
                        <input type="date" class="form-control" name="to" placeholder="To">
                    </div>
                    
                    
                    <div class="col-md-2 mb-2">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.card -->

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title m-0">Transactions</h5>
                <div class="card-tools">
                        <a href="{{ route('transactions.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                            Transaction
                        </a>
                    </div>
            </div>
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                           
                                <th>TransactionType</th>
                                <th>TransID</th>
                                <th>TransAmount</th>
                                <th>BillRefNumber</th>
                                <th>MSISDN</th>
                                <th>FirstName</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $totalTransAmount = 0; // Initialize the total variable
                        @endphp

                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->TransactionType }}</td>
                                    <td>{{ $transaction->TransID }}</td>
                                    <td>{{ $transaction->TransAmount }}</td>
                                    <td>{{ $transaction->BillRefNumber }}</td>
                                    <td>{{ $transaction->MSISDN }}</td>
                                    <td>{{ $transaction->FirstName }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                </tr>
                                @php
                                    // Increment the totalTransAmount variable
                                    $totalTransAmount += $transaction->TransAmount;
                                @endphp
                            @endforeach
                            @if (count($transactions) == 0)
                                <tr>
                                    <td colspan="8">No transactions found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    Total: {{$totalTransAmount}}
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
