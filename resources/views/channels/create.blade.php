@extends('layouts.dashboard')
@section('title', 'Create Transaction')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Create Transaction</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="row" action="{{ route('channels.store') }}" method="post">
            @csrf
            <div class="col-md-6 mb-2">
                <label for="name">Name</label>
                <input type="text" name="channel_name" id="name" placeholder="Channel Name"
                    class="form-control @error('channel_name') is-invalid @enderror" value="{{ old('channel_name') }}">
                @error('channel_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Expiry</label>
                <input type="text" name="expiry" id="elder_name" placeholder="Channel expiry"
                    class="form-control @error('expiry') is-invalid @enderror" value="{{ old('elder_name') }}">
                @error('expiry')
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