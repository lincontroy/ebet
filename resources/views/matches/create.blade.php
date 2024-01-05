@extends('layouts.dashboard')
@section('title', 'Create Match')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">Create Match </h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form class="row" action="{{ route('matches.store') }}" method="post">
            @csrf
            <div class="col-md-6 mb-2">
                <label for="name">League</label>
                <select name="league" class="form-control">
                    {{$leagues=App\Models\Leagues::all()}}
                    @foreach($leagues as $league)
                        <option value="{{$league->league_name}}">{{$league->league_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-2">
                <label for="name">Type</label>
                <select name="type" class="form-control" required>
                  
                        <option value="ds">Daily sure tips</option>
                        <option value="ft">Football tips</option>
                        <option value="ou">Over-under</option>
                        <option value="st">Single tips</option>
                        <option value="dt">Daily 20+ odds</option>
                        <option value="bs">Bonus-surprise</option>
                   
                </select>
            </div>

            <div class="col-md-6 mb-2">
                <label for="name">Home team</label>
                <select name="homeTeam" class="form-control" required>
                    {{$leagues=App\Models\Teams::all()}}
                    @foreach($leagues as $league)
                        <option value="{{$league->team_name}}">{{$league->team_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Away team</label>
                <select name="awayTeam" class="form-control" required>
                    {{$leagues=App\Models\Teams::all()}}
                    @foreach($leagues as $league)
                        <option value="{{$league->team_name}}">{{$league->team_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-2">
                <label for="name">Time</label>
                <input type="time" name="time" class="form-control" required>
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Results</label>
                <input type="text" name="result" class="form-control" placeholder="Chelsea wins" required>
            </div>
            <div class="col-md-6 mb-2">
                <label for="name">Total Odds</label>
                <input type="text" name="odds" class="form-control" required>
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