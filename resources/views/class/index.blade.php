@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Classes </h3>
            {{-- <div class="d-flex">
                <form action="" method="GET">
                    <div class="d-flex justify-content-between">
                        <input type="search" name="class_search" value="{{ Request::get('class_search') }}" id="class_search" class="form-control" placeholder="Search">
                    </div>
                </form>
                <button type="button" class="btn btn-warning mx-1" onclick="window.location.href='{{ url('classes') }}'">All</button>
            </div> --}}
            <a href="{{ url('classes/create') }}" class="btn btn-sm btn-primary"> Add New</a>
        </div>
        <div class="card-body">
            <div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Class Name</th>
                            <th>Party</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sr_no = 1;
                        @endphp
                        @foreach ($class as $c)
                        <tr>
                            <td> {{ $sr_no }} </td>
                            <td> {{ ucfirst($c->class_name) }} </td>
                            <td> {{ ucfirst($c->party->party_name) }} </td>
                            <td class="d-flex justify-content-center" style="gap: 5px;">
                                {{-- <a href=" {{ url('classes/'.$c->class_id) }} " class="btn btn-sm btn-primary">View</a> --}}
                                <a href="{{ url('classes/'.$c->class_id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ url('classes/'.$c->class_id) }}" method="POST">
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
                    {{-- {{ $class->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection