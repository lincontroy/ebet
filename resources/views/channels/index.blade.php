@extends('layouts.dashboard')
@section('title', 'Channels')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Channels</h5>
                    <div class="card-tools">
                        <a href="{{ route('channels.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                            Channel
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                    
                                <th>Expiry</th>
                                <th>Created at</th>
                                <th>Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($channels as $key=>$channel)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $channel->channel_name }}</td>
                                    <td>{{ $channel->expiry }}</td>
                                    <td>{{ $channel->created_at }}</td>
                                  
                                    <td>
                                        <form action="{{ route('channels.destroy', $channel->id) }}" method="POST"
                                            id="deleteRecord{{ $channel->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('channels.show', $channel->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('channels.edit', $channel->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $channel->id }})"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            @if (count($channels) == 0)
                                <tr>
                                    <td colspan="6">No Channel found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
                <div class="d-flex justify-content-center">
                  {{ $channels->links() }}
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