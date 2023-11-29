@extends('layouts.dashboard')
@section('title', 'Member')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Member</h5>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                               
                                <th>TransID</th>
                    
                                <th>Amount</th>
                                <th>Account</th>
                                <th>Created at</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $key=>$transaction)
                                <tr>
                                   
                                    <td>{{ $transaction->TransID }}</td>
                                    <td>{{ $transaction->TransAmount }}</td>
                                    <td>
                                    <?php
                                    $billRefNumber = $transaction->BillRefNumber;

                                    // Explode the string based on the '#' character
                                    $parts = explode('#', $billRefNumber);
                                    
                                    // Get the second part of the exploded array
                                    $stringAfterHash = isset($parts[1]) ? $parts[1] : null;
                                    
                                    echo $stringAfterHash;
                                    ?>
                                    </td>
                                    <td>{{ $transaction->created_at }}</td>
                                  
                                  
                                </tr>
                            @endforeach
                            @if (count($transactions) == 0)
                                <tr>
                                    <td colspan="6">No Contribution found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
               <div class="d-flex justify-content-center">
                {{ $transactions->links() }}
            </div>
            </div>
        </div>
    </div>
@endsection
