@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                Empty</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-info btn-icon me-2 btn-b"><i
                    class="mdi mdi-filter-variant"></i></button>
        </div>
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-danger btn-icon me-2"><i class="mdi mdi-star"></i></button>
        </div>
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon me-2"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="mb-xl-0">
            <div class="btn-group dropdown">
                <button type="button" class="btn btn-primary">14 Aug 2019</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                    id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDate"
                    x-placement="bottom-end">
                    <a class="dropdown-item" href="javascript:void(0);">2015</a>
                    <a class="dropdown-item" href="javascript:void(0);">2016</a>
                    <a class="dropdown-item" href="javascript:void(0);">2017</a>
                    <a class="dropdown-item" href="javascript:void(0);">2018</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="card box-shadow-0">
        <div class="card-header">
            <h4 class="card-title mb-1">Edit Station</h4>
        </div>
        <div class="card-body pt-0">
            <form method="POST" action="{{ route('stations.update', $station->id) }}">
                @csrf
                @method('PUT')
                <!-- Use the PUT method for updating -->

                <div class="form-group">
                    <label for="inputSSNAME">Name</label>
                    <input type="text" class="form-control" id="inputSSNAME" name="SSNAME"
                        value="{{ $station->SSNAME }}" required>
                </div>

                <div class="form-group">
                    <label for="inputCompanyMake">Company Make</label>
                    <input type="text" class="form-control" id="inputCompanyMake" name="COMPANY_MAKE"
                        value="{{ $station->COMPANY_MAKE }}">
                </div>

                <div class="form-group">
                    <label for="inputVoltageLevel">Voltage Level (KV)</label>
                    <input type="text" class="form-control" id="inputVoltageLevel" name="Voltage_Level_KV"
                        value="{{ $station->Voltage_Level_KV }}">
                </div>

                <div class="form-group">
                    <label for="inputContractNo">Contract No</label>
                    <input type="text" class="form-control" id="inputContractNo" name="Contract_No"
                        value="{{ $station->Contract_No }}">
                </div>

                <div class="form-group">
                    <label for="inputCommisioningDate">Commisioning Date</label>
                    <input type="date" class="form-control" id="inputCommisioningDate" name="COMMISIONING_DATE"
                        value="{{ $station->COMMISIONING_DATE }}">
                </div>
                <div class="form-group">
                    <label for="inputCommisioningDate">Control</label>

                    <select name="control" class="form-select" id="controlSelect">
                        <option value="{{ $station->control }}">{{ $station->control }}</option>
                        <option value="JAHRA CONTROL CENTER">JAHRA CONTROL CENTER</option>
                        <option value="SHUAIBA CONTROL CENTER">SHUAIBA CONTROL CENTER</option>
                        <option value="TOWN CONTROL CENTER">TOWN CONTROL CENTER</option>
                        <option value="NATIONAL CONTROL CENTER">NATIONAL CONTROL CENTER</option>
                        <option value="JABRIYA CONTROL CENTER">JABRIYA CONTROL CENTER</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputCommisioningDate">Full Name</label>
                    <input type="text" class="form-control" id="inputCommisioningDate" name="fullName"
                        value="{{ $station->FULLNAME }}">
                </div>
                <div class="form-group">
                    <label for="inputCommisioningDate">pm</label>
                    <input type="text" class="form-control" id="inputCommisioningDate" name="pm"
                        value="{{ $station->pm }}">
                </div>

                <!-- Add more fields as needed -->

                <div class="form-group mb-0 justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('stations.index') }}" class="btn btn-secondary ms-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the current value of the 'control' attribute
        var currentControl = "{{ $station->control }}";

        // Get the select element
        var controlSelect = document.getElementById('controlSelect');

        // Iterate through options and hide the one with the current value
        for (var i = 0; i < controlSelect.options.length; i++) {
            if (controlSelect.options[i].value === currentControl) {
                controlSelect.options[i].style.display = 'none';
                break; // Exit the loop once found
            }
        }
    });
</script>

@endsection