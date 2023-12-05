@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                    {{\App\Models\Member::where('status','Active')->count();}}
                    </h3>

                    <p>Total members</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>KES <?php
                    $currentMonth = now()->format('m');

                    // Use Eloquent to get the sum
                    $sum = \App\Models\Transaction::whereMonth('created_at', $currentMonth)
                        ->sum('TransAmount');
                        echo $sum;
                    ?></h3>

                    <p>Collection this month</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>
                    KES 
                    <?php
                     $firstDayOfCurrentMonth = now()->firstOfMonth();

                     // Get the last day of the previous month
                     $lastDayOfLastMonth = $firstDayOfCurrentMonth->subDay();
             
                     // Use Eloquent to get the sum
                     $sum = \App\Models\Transaction::whereBetween('created_at', [
                         $lastDayOfLastMonth->startOfMonth(),
                         $lastDayOfLastMonth->endOfMonth(),
                     ])->sum('TransAmount');

                     echo $sum;
                    ?>
                    </h3>

                    <p>Collection last month</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>0</h3>

                    <p>Expenses</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title m-0">Search Transaction</h5>
            </div>
            <div class="card-body">
                <form class="row" method="GET">
                    <div class="col-md-2 mb-2">
                        <input type="text" class="form-control" name="TransID" placeholder="Transaction ID">
                    </div>
                    <div class="col-md-2 mb-2">
                        <input type="text" class="form-control" name="BillRefNumber" placeholder="Account number">
                    </div>
                    <div class="col-md-2 mb-2">
                        <input type="text" class="form-control" name="MSISDN" placeholder="Phone number">
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
                                <th>Member</th>
                                <th>Channel</th>
                                <th>Phone</th>
                                <th>FirstName</th>
                                <th>created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->TransactionType }}</td>
                                    <td>{{ $transaction->TransID }}</td>
                                    <td>{{ $transaction->TransAmount }}</td>
                                    <td><?php

                                    $part1;
                                    
                                
                                     $parts = explode('#', $transaction->BillRefNumber);
                                     if (count($parts) == 2) {
                                         $part1=$parts[0]; // This will output '4'
                                         $part2= $parts[1]; // This will output 'offering'
                                         echo $part1;
                                     } else {
                                         // Handle the case where the string doesn't contain exactly one '#'
                                         echo $transaction->BillRefNumber; // Output the original string
                                     }
                            
                                    ?></td>
                                    <td>{{$part2}}</td>
                                    <td>{{ $transaction->MSISDN }}</td>
                                    <td>{{ $transaction->FirstName }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                </tr>
                            @endforeach
                            @if (count($transactions) == 0)
                                <tr>
                                    <td colspan="8">No transactions found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    
    <script>
        $(function() {

        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this member!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteRecord' + id).submit();
                }
            })
        }
    </script>
@endsection
