@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                    {{\App\Models\Leagues::count();}}
                    </h3>

                    <p>Total Leagues</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Models\Teams::count();}}</h3>

                    <p>Total Teams</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>
                    {{\App\Models\Matches::count();}}
                    </h3>

                    <p>Total matches</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{\App\Models\Matches::where('created_at',Carbon\Carbon::today())->count()}}</h3>

                    <p>Matches today</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

   
  
    <div class="row">
    <div class="col-lg-12">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title m-0">Matches</h5>
                <div class="card-tools">
                    <a href="{{ route('matches.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Match
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>League</th>
                                <th>Home team</th>
                                <th>Away team</th>
                                <th>Time</th>
                                <th>Odds</th>
                                <th class="d-none d-md-table-cell">Created at</th> <!-- Hide on smaller screens -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matches as $key=>$match)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $match->league }}</td>
                                    <td>{{ $match->homeTeam }}</td>
                                    <td>{{ $match->awayTeam }}</td>
                                    <td>{{ $match->time }}</td>
                                    <td>{{ $match->odds }}</td>
                                    <td class="d-none d-md-table-cell">{{ $match->created_at }}</td> <!-- Hide on smaller screens -->
                                </tr>
                            @endforeach
                            @if (count($matches) == 0)
                                <tr>
                                    <td colspan="6">No Match found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $matches->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
    
    <script>
        $(function() {

        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this member!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteRecord' + id).submit();
                }
            })
        }
    </script>
@endsection
