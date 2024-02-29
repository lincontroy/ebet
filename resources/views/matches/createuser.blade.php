@extends('layouts.dashboard')
@section('title', 'Create League')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Create User (enables user to see games behind a paywall)</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="row" action="{{ route('createUserPost') }}" method="post">
            @csrf
            <div class="col-md-12 mb-2">
                <label for="name">Name</label>
                <input type="text" name="phone" id="name" placeholder="Name/phone/email"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('league_name') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-2">
                <label for="name">Game</label>
                <select class="form-control" name="game">
                    <option value="cs">Correct score</option>
                    <option value="htft">Half/time Full time</option>
                </select>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-2">
                <label for="name">Duration</label>
                <select class="form-control" name="duration">
                    <option value="3">3 months</option>
                    <option value="6">6 months</option>
                    <option value="12">12 months</option>

                </select>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('createUser') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>


<script>
    $('input[name="expiry"]').daterangepicker();

</script>
<!-- /.card-body -->
@endsection
