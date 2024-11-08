@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Party </h3>
            {{-- <div class="d-flex">
                <form action="" method="GET">
                    <div class="d-flex justify-content-between">
                        <input type="search" name="party_search" value="{{ Request::get('party_search') }}" id="party_search" class="form-control" placeholder="Search">
                    </div>
                </form>
                <button type="button" class="btn btn-warning mx-1" onclick="window.location.href='{{ url('parties') }}'">All</button>
            </div> --}}
            <a href="{{ url('parties/create') }}" class="btn btn-sm btn-primary"> Add New</a>
        </div>
        <div class="card-body">
            <div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Party Name</th>
                            {{-- <th>Email</th> --}}
                            <th>Phone</th>
                            <th>Address</th>
                            {{-- <th>City</th>
                            <th>District</th> --}}
                            <th>State</th>
                            {{-- <th>GST</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sr_no = 1;
                        @endphp
                        @foreach ($students as $student)
                        <tr>
                            <td> {{ $sr_no }} </td>
                            <td> {{ $student->party_name }} </td>
                            {{-- <td> {{ $student->email }} </td> --}}
                            <td> {{ $student->phone }} </td>
                            <td> {{ $student->address }} </td>
                            {{-- <td> {{ $student->city }} </td>
                            <td> {{ $student->district }} </td> --}}
                            <td> {{ $student->state }} </td>
                            {{-- <td> {{ $student->gst }} </td> --}}
                            <td class="d-flex justify-content-center" style="gap: 5px;">
                                <a href=" {{ url('parties/'.$student->party_id) }} " class="btn btn-sm btn-primary">View</a>
                                <a href="{{ url('parties/'.$student->party_id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ url('parties/'.$student->party_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $sr_no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection