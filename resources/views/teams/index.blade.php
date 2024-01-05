@extends('layouts.dashboard')
@section('title', 'Teams')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Teams</h5>
                    <div class="card-tools">
                        <a href="{{ route('teams.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                            Team(chelsea,Manchester united)
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created at</th> 
                                      
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $key=>$team)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $team->team_name }}</td>
                                    <td>{{ $team->created_at }}</td>
                                </tr>
                            @endforeach
                            @if (count($teams) == 0)
                                <tr>
                                    <td colspan="6">No League found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
                <div class="d-flex justify-content-center">
                  {{ $teams->links() }}
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