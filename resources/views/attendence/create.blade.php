
@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Attendence </h3>
            <a href="{{ url('attendence') }}" class="btn btn-sm btn-primary"> Back</a>
        </div>
        <div class="card-body">
            <input type="hidden" name="" value="" id="roason_id">
            <form action=" {{ url('attendence') }} " method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="date" id="date" class="form-control @error('date') {{ 'is-invalid' }} @enderror" value="{{ now()->format('Y-m-d') }}">
                    @if (Auth::user()->role == 2)
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label for="party_id">Party</label>
                            <select name="party_id" id="partyId" class="form-select @error('party_id') {{ 'is-invalid' }} @enderror" id="">
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
                    @endif
                    @if (Auth::user()->role == 1)
                    <input type="hidden" value="{{ Auth::user()->party_id }}" name="party_id">
                    @endif
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="class">Class</label>
                            <select name="class_id" class="form-select @error('class_id') {{ 'is-invalid' }} @enderror" id="classId">
                                <option value="">Select Class</option>
                                @foreach ($data['class'] as $p)
                                    <option value="{{ $p->class_id }}">{{ ucfirst($p->class_name) }} </option>
                                @endforeach
                            </select>
                            <small>
                                @error('class_id')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6" id="students">
                        {{-- dynamic students data  --}}
                    </div>
                </div>
                <input type="submit"  class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
@endsection