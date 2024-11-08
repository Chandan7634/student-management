@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Revenue</h3>
            <a href="{{ url('revenue/create') }}" class="btn btn-sm btn-primary"> Add New</a>
        </div>
        <div class="card-body">
            <div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Party</th>
                            <th>Student Name</th>
                            <th>Due Amount</th>
                            <th>Due Reason</th>
                            <th>Installment Complete</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sr_no = 1;
                        @endphp
                        @foreach ($data as $d)
                        @php
                            $disable = false;
                        @endphp
                        <tr>
                            <td> {{ $sr_no }} </td>
                            <td> {{ $d->party->party_name }} </td>
                            <td> {{ $d->student->student_name }} </td>
                            <td> 
                                @if ($d->due_amount == 0)
                                @php
                                    $disable = true
                                @endphp
                                @endif 
                            {{ $d->due_amount }} </td>
                            <td> 
                                <p class="reason">{{ $d->reason }}</p>
                            </td>
                            <td> 
                                <p class="reason">    
                                    {{-- @if ($d->installment_count == 12)
                                        Payment Completed
                                    @else --}}
                                    {{ $d->installment_count }}
                                    {{-- @endif --}}
                                </p>

                            </td>
                            <td class="d-flex justify-content-center" style="gap: 5px;">
                                <a href="{{ url('revenue/'.$d->rev_id.'/edit') }}"  class="btn btn-sm btn-warning @if($disable) {{ 'disabled' }} @endif">Edit</a>
                                <form action="{{ url('revenue/'.$d->rev_id) }}" method="POST">
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
                    {{-- {{ $students->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection