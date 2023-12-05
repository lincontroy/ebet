@extends('layouts.dashboard')
@section('title', 'Districts')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Districts</h5>
                    <div class="card-tools">
                        <a href="{{ route('districts.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                            District
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Elder Name</th>
                                    <th>Elder Phone</th>
                                    <th>Elder Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($districts as $key=>$district)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $district->name }}</td>
                                        <td>{{ $district->elder_name }}</td>
                                        <td>{{ $district->elder_phone }}</td>
                                        <td>{{ $district->elder_email }}</td>
                                        <td>
                                            <form action="{{ route('districts.destroy', $district->id) }}" method="POST"
                                                id="deleteRecord{{ $district->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('districts.show', $district->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('districts.edit', $district->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete({{ $district->id }})"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($districts) == 0)
                                    <tr>
                                        <td colspan="6">No district found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $districts->links() }}
                </div>
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
                text: "You want to delete this district!",
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