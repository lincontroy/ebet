<!-- Create member form -->
@extends('layouts.dashboard')
@section('title', 'Create Member')
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title">Edit Member</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form class="row" action="{{ route('members.update', $member->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $member->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <label for="name">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone"
                        class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $member->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $member->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name">District</label>
                    <select class="form-control @error('district_id') is-invalid @enderror" name="district_id" id="district_id">
                        <option value="">Select District</option>
                        @foreach (getDistricts() as $district)
                            <option value="{{ $district->id }}" {{ old('district', $member->district)==$district->name ? 'selected' : '' }}>{{ $district->name }}</option>
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
                            <option value="{{ $status['name'] }}" {{ old('status', $member->status)==$status['name'] ? 'selected' : '' }}>{{ $status['name'] }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name">Remarks</label>
                    <input type="text" name="remarks" id="remarks" placeholder="Remarks"
                        class="form-control @error('remarks') is-invalid @enderror" value="{{ old('remarks', $member->remarks) }}">
                    @error('remarks')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Update Member</button>
                </div>
            </form>
        </div>

    </div>
@endsection
