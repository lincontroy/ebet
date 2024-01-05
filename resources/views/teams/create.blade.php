@extends('layouts.dashboard')
@section('title', 'Create League')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Create Team</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="row" action="{{ route('teams.store') }}" method="post">
            @csrf
            <div class="col-md-6 mb-2">
                <label for="name">Name</label>
                <input type="text" name="team_name" id="name" placeholder="Team Name"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('league_name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
           
           
           
            
            
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('teams.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>


<script>
    $('input[name="expiry"]').daterangepicker();
</script>
    <!-- /.card-body -->
@endsection