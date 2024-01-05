@extends('layouts.dashboard')
@section('title', 'Create Notification')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Create Notification</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="row" action="{{ route('notifications.store') }}" method="post">
            @csrf
            <div class="col-md-6 mb-2">
                <label for="name">Subject</label>
                <input type="text" name="subject" id="name" placeholder="Enter subject" required
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('league_name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-2">
                <label for="name">Body</label>
                <Textarea rows="5" class="form-control" name="body" required></Textarea>
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