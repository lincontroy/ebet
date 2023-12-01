@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Search Members</h5>
                </div>
                <div class="card-body">
                    <form class="row" method="GET">
                        <div class="col-md-2 mb-2">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-2 mb-2">
                            <select class="form-control" name="district_id" id="district_id">
                                <option value="">Select District</option>
                                @foreach (getDistricts() as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Status</option>
                                @foreach (getMemberStatuses() as $status)
                                    <option value="{{ $status['name'] }}">{{ $status['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i>
                                Search</button>
                    </form>
                </div>
            </div><!-- /.card -->
        </div>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Members</h5>
                    <div class="card-tools">
                        <a href="{{ route('members.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add
                            Member
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
                                <th>Phone</th>
                                <th>Email</th>
                                <th>District</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th>Total contributions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->district ? $member->district->name : '' }}</td>
                                    <td>{{ $member->remarks }}</td>
                                    <td>{{ $member->status }}</td>
                                    <td>
                                        {{ \App\Models\Transaction::where('BillRefNumber', 'LIKE', $member->id . '#%')->sum('TransAmount') }}
                                        
                                        </td>
                                    <td>
                                        <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                                            id="deleteRecord{{ $member->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('members.show', $member->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('members.edit', $member->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $member->id }})"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            @if (count($members) == 0)
                                <tr>
                                    <td colspan="8">No members found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                  {{ $members->links() }}
                  </div>
            </div>
        </div>
    <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
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
