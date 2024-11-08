
@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Attendence of date @php
                $date = new DateTime($data['attendence']->date);
                $formattedDate = $date->format('d - M - Y')
                @endphp 
                {{ $formattedDate }}
            </h3>
            <a href="{{ url('attendence') }}" class="btn btn-sm btn-primary"> Back</a>
        </div>
        <div class="card-body">
            <form action=" {{ url('attendence/'.$data['attendence']->attendance_id) }} " method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date">Date</label> --}}
                            <input type="hidden" name="date" id="date" class="form-control" value="{{ $data['attendence']->date }}">
                            {{-- <small>
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                    @foreach ($data['student_mapping'] as $single_student)
                                        <tr>
                                            <td>{{ $single_student->student_one->student_name }}</td>
                                            <td><input type='checkbox' @if (in_array($single_student->student_one->student_id,$data['key'])) {{ 'checked' }} @endif value="{{ $single_student->student_one->student_id }}" name='attend_student[]'></td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <input type="submit"  class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
@endsection