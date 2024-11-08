@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Attendence </h3>
            <a href="{{ url('attendence/create') }}" class="btn btn-sm btn-primary"> Add New</a>
        </div>
        <div class="card-body">
            <div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Party</th>
                            <th>Class</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sr_no = 1;
                        @endphp
                        @foreach ($attendence as $c)
                        <tr>
                            <td> {{ $sr_no }} </td>
                            <td>
                                @foreach ($c->daily_attendance as $id=>$name)
                                    {{ $name }}
                                @endforeach
                            </td>
                            <td> {{ $c->party->party_name }} </td>
                            <td> {{ ucfirst($c->class->class_name) }} </td>
                            <td>
                                @php
                                    $date = new DateTime($c->date);
                                    $formattedDate = $date->format('d - M - Y');
                                    echo $formattedDate;
                                @endphp
                            </td>
                            <td class="d-flex justify-content-center" style="gap: 5px;">
                                {{-- <a href=" {{ url('attendence/'.$c->attendance_id) }} " class="btn btn-sm btn-primary">View</a> --}}
                                <a href="{{ url('attendence/'.$c->attendance_id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ url('attendence/'.$c->attendance_id) }}" method="POST">
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
                    {{-- {{ $class->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection