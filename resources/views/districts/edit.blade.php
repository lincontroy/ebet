@extends('layouts.dashboard')
@section('title', 'Edit District')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Edit District</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="row" action="{{ route('districts.update', $district->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-6 mb-2">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $district->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Elder Name</label>
                <input type="text" name="elder_name" id="elder_name" placeholder="Elder Name"
                    class="form-control @error('elder_name') is-invalid @enderror" value="{{ old('elder_name', $district->elder_name) }}">
                @error('elder_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Elder Phone</label>
                <input type="text" name="elder_phone" id="elder_phone" placeholder="Elder Phone"
                    class="form-control @error('elder_phone') is-invalid @enderror" value="{{ old('elder_phone', $district->elder_phone) }}">
                @error('elder_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Elder Email</label>
                <input type="text" name="elder_email" id="elder_email" placeholder="Elder Email"
                    class="form-control @error('elder_email') is-invalid @enderror" value="{{ old('elder_email', $district->elder_email) }}">
                @error('elder_email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('districts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
    <!-- /.card-body -->
@endsection