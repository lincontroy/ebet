<!-- Create member form -->
@extends('layouts.dashboard')
@section('title', 'Create Member')
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title">Create Member</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form class="row" action="{{ route('members.store') }}" method="post">
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
                    <label for="name">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone"
                        class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name">District</label>
                    <select class="form-control @error('district_id') is-invalid @enderror" name="district_id" id="district_id">
                        <option value="">Select District</option>
                        @foreach (getDistricts() as $district)
                            <option value="{{ $district->id }}" {{ old('district')==$district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                        @endforeach
                    </select>
                    @error('district_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="">Select Status</option>
                        @foreach (getMemberStatuses() as $status)
                            <option value="{{ $status['name'] }}" {{ old('status')==$status['name'] ? 'selected' : '' }}>{{ $status['name'] }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name">Remarks</label>
                    <input type="text" name="remarks" id="remarks" placeholder="Remarks"
                        class="form-control @error('remarks') is-invalid @enderror" value="{{ old('remarks') }}">
                    @error('remarks')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </div>
            </form>
        </div>

    </div>
@endsection
