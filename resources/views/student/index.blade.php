@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Students </h3>
            {{-- <div class="d-flex">
                <form action="" method="GET">
                    <div class="d-flex justify-content-between">
                        <input type="search" name="student_search" value="{{ Request::get('student_search') }}" id="student_search" class="form-control" placeholder="Search">
                    </div>
                </form>
                <button type="button" class="btn btn-warning mx-1" onclick="window.location.href='{{ url('students') }}'">All</button>
            </div> --}}
            <a href="{{ url('students/create') }}" class="btn btn-sm btn-primary"> Add New</a>
        </div>
        <div class="card-body">
            <div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>School</th>
                            <th>Monthly Fee </th>
                            <th>Yearly Fee</th>
                            <th>Joinig Date</th>
                            <th>Party Name</th>
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
                            <td> {{ $student->student_name }} </td>
                            <td> {{ $student->school }} </td>
                            <td> {{ $student->monthly_fees }} </td>
                            <td> {{ $student->yearly_fees }} </td>
                            <td> {{ $student->joining_date }} </td>
                            <td> {{ $student->party->party_name }} </td>
                            <td class="d-flex justify-content-center" style="gap: 5px;">
                                <a href=" {{ url('students/'.$student->student_id) }} " class="btn btn-sm btn-primary">View</a>
                                <a href="{{ url('students/'.$student->student_id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ url('students/'.$student->student_id) }}" method="POST">
                                    {!! csrf_field() !!}
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
                </div>
            </div>
        </div>
    </div>
@endsection