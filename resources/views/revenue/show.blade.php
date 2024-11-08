@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $students->student_name }} Details </h3>
        </div>
        <div class="card-body">
            <h4 class="mb-2">Name : <strong> {{ $students->student_name }}  </h4>
            <h4 class="mb-2">School : <strong> {{ $students->school }}  </h4>
            <h4 class="mb-2">Monthly Fee : <strong> {{ $students->monthly_fees }}  </h4>
            <h4 class="mb-2">Yearly Fee : <strong> {{ $students->yearly_fees }}  </h4>
            <h4 class="mb-2">Joining date : <strong> {{ $students->joining_date }}  </h4>
        </div>
    </div>
@endsection