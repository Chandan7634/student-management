
@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Students </h3>
            <a href="{{ url('students') }}" class="btn btn-sm btn-primary"> Back</a>
        </div>
        <div class="card-body">
            <form action=" {{ url('students/'.$students['student']->student_id) }} " method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="student_name">Student Name</label>
                            <input type="text" name="student_name" id="student_name" value="{{ $students['student']->student_name }}" class="form-control @error('student_name') {{ 'is-invalid' }} @enderror" placeholder="Enter student name">
                            <small>
                                @error('student_name')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="school">School Name</label>
                            <input type="text" name="school" id="school" class="form-control @error('school') {{ 'is-invalid' }} @enderror" value="{{ $students['student']->school }}" placeholder="Enter school name">
                            <small>
                                @error('school')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                     <div class="col-md-6 ">
                        <button type="button" class="fee_toggle btn-outline-warning @if(!empty($students['student']->monthly_fees)) {{ 'btn btn-warning' }} @endif px-3 py-2 rounded-pill border-0">
                            Monthly Fee
                        </button>
                        <button type="button" class="fee_toggle btn-outline-warning rounded-pill border-0 @if(!empty($students['student']->yearly_fees))  {{ 'btn btn-warning' }}  @endif px-3 py-2">
                            Yearly Fee
                        </button>
                        <div class="mb-3 mt-2 monthly_fees">
                            <label for="monthly_fees">Monthly Fee</label>
                            <input type="text" name="monthly_fees" id="monthly_fees" class="form-control @error('monthly_fees') {{ 'is-invalid' }} @enderror" value="{{ $students['student']->monthly_fees }}" placeholder="Enter monthly fees">
                            <small>
                                @error('monthly_fees')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="yearly_fees">
                             <div class="mb-3">
                            <label for="yearly_fees">Yearly Fee</label>
                        <input type="text" name="yearly_fees" id="yearly_fees" class="form-control @error('yearly_fees') {{ 'is-invalid' }} @enderror" value="{{ $students['student']->yearly_fees }}" placeholder="Enter yearly fee">
                        <small>
                            @error('yearly_fees')
                                {{ $message }}
                            @enderror
                        </small>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="mb-3">
                            <label for="joining_date">Joining Date</label>
                            <input type="date" name="joining_date" id="joining_date" class="form-control @error('joining_date') {{ 'is-invalid' }} @enderror" value="{{ $students['student']->joining_date }}" placeholder="Enter joining date">
                            <small>
                                @error('joining_date')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    @if (Auth::user()->role == 2)
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label for="party_id">Party</label>
                            <select name="party_id" class="form-select @error('party_id') {{ 'is-invalid' }} @enderror" id="">
                                <option value="">Select Party</option>
                                @foreach ($students['party'] as $p)
                                <option @if ($students['student']->party_id == $p->party_id) {{'selected'}}  @endif value="{{ $p->party_id }}">{{ ucfirst($p->party_name) }} </option>
                                @endforeach
                            </select>
                            <small>
                                @error('party_id')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="class_id">Class</label>
                            <select name="class_id" class="form-select @error('class_id') {{ 'is-invalid' }} @enderror" id="">
                                @php
                                    $index = 0;
                                @endphp
                                @foreach ($students['class'] as $c)
                                <option @if ($students['student_class']->class_id == $students['class'][$index]->class_id) {{ 'selected' }} @endif value="{{ $c->class_id }}">{{ ucfirst($c->class_name) }} </option>
                                @php
                                    $index++;
                                @endphp
                                @endforeach
                            </select>
                            <small>
                                @error('class_id')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                </div>
                <input type="submit"  class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
@endsection