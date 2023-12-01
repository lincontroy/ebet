@extends('layouts.dashboard')
@section('title', 'District')

@section('content')


<div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">

                 <div><b>Name: </b> {{$district->name}}</div><br>
                <div><b>Elder: </b>{{$district->elder_name}}</div><br>
                <div><b>Elder Phone: </b>{{$district->elder_phone}}</div><br>
                <div><b>Elder Email: </b>{{$district->elder_email}}</div><br>
                <div><b>Total Members: </b>{{count($districtMembers)}}</div>

</div>
</div>
</div>
</div>



    <div class="row">
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">District</h5>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                               
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Created at</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($districtMembers as $key=>$districtMember)
                                <tr>
                                   
                                    <td>{{ $districtMember->name }}</td>
                                    <td>{{ $districtMember->phone }}</td>
                                    <td>{{ $districtMember->status }}</td>
                                    <td>{{ $districtMember->created_at }}</td>
                                  
                                  
                                </tr>
                            @endforeach
                            @if (count($districtMembers) == 0)
                                <tr>
                                    <td colspan="6">No Members found for this district</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
               <div class="d-flex justify-content-center">
                {{ $districtMembers->links() }}
            </div>
            </div>
        </div>
    </div>
@endsection
