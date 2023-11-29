@extends('layouts.dashboard')
@section('title', 'Create Channel')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Create Channel</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="row" action="{{ url('transaction/post') }}" method="post">
            @csrf
            <div class="col-md-6 mb-2">
                <label for="name">Name</label>
                <input type="text" name="PaymentMethod" id="name" placeholder="Mpesa,Cash,Pdq"
                    class="form-control @error('PaymentMethod') is-invalid @enderror" value="{{ old('PaymentMethod') }}">
                @error('PaymentMethod')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Channel</label>
                <select name="Channel" class="form-control">
                    <option value="">Select</option>
                    <?php
                    $channels=\App\Models\Channel::all();
                    ?>
                    @foreach($channels as $channel)
                    <option value="{{$channel->channel_name}}">{{$channel->channel_name}}</option>
                    @endforeach
                </select>
                @error('Channel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-6 mb-2">
                <label for="name">Member</label>
                <select name="Member" class="form-control">
                    <option value="">Select</option>
                    <?php
                    $members=\App\Models\Member::all();
                    ?>
                    @foreach($members as $member)
                    <option value="{{$member->id}}">{{$member->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Transaction code</label>
                <input type="text" name="Transactioncode" id="Transactioncode" placeholder="Transaction code "
                    class="form-control @error('Transactioncode') is-invalid @enderror" value="{{ old('Transactioncode') }}">
                @error('Transactioncode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
             <div class="col-md-6 mb-2">
                <label for="name">Amount</label>
                <input type="text" name="amount" id="amount" placeholder="Amount"
                    class="form-control @error('Transactioncode') is-invalid @enderror" value="{{ old('amount') }}">
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Paid at</label>
                <input type="datetime-local" name="paidat" id="paidat" placeholder="Paid at "
                    class="form-control @error('paidat') is-invalid @enderror" value="{{ old('paidat') }}">
                @error('paidat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('channels.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    $('input[name="expiry"]').daterangepicker();
</script>
    <!-- /.card-body -->
@endsection