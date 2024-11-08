
@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit revenue  - {{ $data['student']->student->student_name }} </h3>
            <a href="{{ url('revenue') }}" class="btn btn-sm btn-primary"> Back</a>
        </div>
        <div class="card-body">
            <form action=" {{ url('revenue/'.$data['student']->rev_id) }} " method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="party_id">Party</label>
                            <select name="party_id" class="form-select @error('party_id') {{ 'is-invalid' }} @enderror" id="partyId">
                                <option value="">Select Party</option>
                                @foreach ($data['party'] as $p)
                                    <option value="{{ $p->party_id }}">{{ ucfirst($p->party_name) }} </option>
                                @endforeach
                            </select>
                            <small>
                                @error('party_id')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="student_id">Select Student</label>
                            <select id="student" name="student_id" class="form-select @error('student_id') {{ 'is-invalid' }} @enderror">
                                <option value="">Select Student</option>
                                @foreach ($data['student'] as $c)
                                    <option value="{{ $c->student_id }}">{{ ucfirst($c->student_name) }} </option>
                                @endforeach
                            </select>
                            <small>
                                @error('student_id')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div> --}}
                    <input type="hidden" name="editId" id="editId" value="{{ $data['student']->rev_id }}">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="paid_type">Paid Type</label>
                            <select name="paid_type" class="form-select" id="paid_type_edit">
                                <option value="">Select</option>
                                <option value="monthly_fees">Monthly</option>
                                <option value="yearly_fees">Yearly</option>
                            </select>
                            <small>
                                @error('paid_type')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="total_amount">Total Amount</label>
                            <input type="text" readonly name="total_amount" id="total_amount" class="form-control @error('total_amount') {{ 'is-invalid' }} @enderror" value="" placeholder="Enter amount">
                            <small>
                                @error('total_amount')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="paid_amount">Paid Amount</label>
                            <input type="text" id="paidAmount" name="paid_amount" class="form-control @error('paid_amount') {{ 'is-invalid' }} @enderror" placeholder="Enter paid amount">
                            <small>
                                @error('paid_amount')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="month">Month</label>
                            <input type="month" name="month" id="month" class="form-control @error('month') {{ 'is-invalid' }} @enderror">
                            <small>
                                @error('month')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="addRow">
                            
                        </div>
                    </div>
                </div>
                <input type="submit" id="submitButton" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
@endsection