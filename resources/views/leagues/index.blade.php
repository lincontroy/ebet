@extends('layouts.dashboard')
@section('title', 'Leagues')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Leagues</h5>
                    <div class="card-tools">
                        <a href="{{ route('leagues.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                            League(epl,uefa)
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
                            @foreach ($leagues as $key=>$league)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $league->league_name }}</td>
                                    <td>{{ $league->created_at }}</td>
                                </tr>
                            @endforeach
                            @if (count($leagues) == 0)
                                <tr>
                                    <td colspan="6">No League found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
                <div class="d-flex justify-content-center">
                  {{ $leagues->links() }}
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