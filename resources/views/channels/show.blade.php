@extends('layouts.dashboard')
@section('title', 'Channel')

@section('content')


<div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">

                 <div><b>Name: </b> {{$channel->channel_name}}</div><br>
                 <div><b>Created At: </b> {{$channel->created_at}}</div><br>
                

</div>
</div>
</div>
</div>



    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Channel contributions</h5>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                               
                                <th>TransactionType</th>
                                <th>TransID</th>
                                <th>TransAmount</th>
                                <th>MSISDN</th>
                                <th>Created at</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $key=>$transaction)
                                <tr>
                                   
                                    <td>{{ $transaction->TransactionType }}</td>
                                    <td>{{ $transaction->TransID }}</td>
                                    <td>{{ $transaction->TransAmount }}</td>
                                    <td>{{ $transaction->MSISDN }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                  
                                  
                                </tr>
                            @endforeach
                            @if (count($transactions) == 0)
                                <tr>
                                    <td colspan="6">No Transactions found for this channel</td>
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
