@extends('layouts.dashboard')
@section('title', 'Edit Channel')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Edit Channel</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="row" action="{{ route('channels.update', $channel->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-6 mb-2">
                <label for="name">Channel Name</label>
                <input type="text" name="channel_name" id="channel_name" placeholder="Channel Name"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $channel->channel_name) }}">
                @error('channel_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Expiry Date</label>
                <input type="text" name="expiry" id="expiry" placeholder="Expiry Date"
                    class="form-control @error('expiry') is-invalid @enderror" value="{{ old('expiry', $channel->expiry) }}">
                @error('elder_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('channels.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
    <!-- /.card-body -->
@endsection