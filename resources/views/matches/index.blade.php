@extends('layouts.dashboard')
@section('title', 'Matches')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Matches</h5>
                    <div class="card-tools">
                        <a href="{{ route('matches.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                            Match(chelsea,Manchester united)
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>League</th>
                                <th>Home team</th>
                                <th>Away team</th>
                                <th>Time</th>
                                <th>Odds</th>
                                <th>Created at</th> 
                                      
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
                                    <td>{{ $match->created_at }}</td>
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
                text: "You want to delete this channel!",
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