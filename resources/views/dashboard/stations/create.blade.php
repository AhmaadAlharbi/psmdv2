@extends('layouts.app')

@section('styles')

@endsection

@section('content')


<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Add station</h4>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="card box-shadow-0">
        <div class="card-header">
            <h4 class="card-title mb-1">Add New Station</h4>
        </div>
        <div class="card-body pt-0">
            <form method="POST" action="{{ route('stations.store') }}">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" id="SSNAME" name="SSNAME" placeholder="SSNAME"
                        value="{{ old('SSNAME') }}" required>
                    @error('SSNAME')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="COMPANY_MAKE" name="COMPANY_MAKE"
                        placeholder="Company Make" value="{{ old('COMPANY_MAKE') }}">
                    @error('COMPANY_MAKE')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="Voltage_Level_KV" name="Voltage_Level_KV"
                        placeholder="Voltage Level (KV)" value="{{ old('Voltage_Level_KV') }}">
                    @error('Voltage_Level_KV')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="Contract_No" name="Contract_No"
                        placeholder="Contract No" value="{{ old('Contract_No') }}">
                    @error('Contract_No')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="COMMISIONING_DATE" name="COMMISIONING_DATE"
                        placeholder="Commissioning Date" value="{{ old('COMMISIONING_DATE') }}">
                    @error('COMMISIONING_DATE')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="control" name="control" placeholder="Control"
                        value="{{ old('control') }}">
                    @error('control')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="FULLNAME" name="FULLNAME" placeholder="FULLNAME"
                        value="{{ old('FULLNAME') }}">
                    @error('FULLNAME')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="pm" name="pm" placeholder="PM" value="{{ old('pm') }}">
                    @error('pm')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Station</button>
            </form>
        </div>
    </div>

</div>
<!-- row closed -->

@endsection

@section('scripts')



@endsection