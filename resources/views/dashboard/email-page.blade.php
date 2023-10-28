@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Contact us</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                {{Auth::user()->department->name}}</span>
        </div>
    </div>

</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card-header">
            <h3 class="card-title">Compose a New Message</h3>
            <p>If you have any suggestions or encounter any issues, please do not hesitate to contact us.</p>
        </div>

        <div class="card-body">
            <form action="{{route('sendEmail')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row align-items-center d-none">
                        <label class="col-sm-2">From</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" value="azaalharbi@mew.gov.kw" readonly>
                        </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="row align-items-center">
                        <label class="col-sm-2">Subject</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="subject">
                        </div>
                        @error('subject')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <label class="col-sm-2">Message</label>
                        <div class="col-sm-10">
                            <textarea rows="10" class="form-control" name="message"></textarea>
                        </div>
                        @error('message')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
        </div>
        <div class="card-footer d-sm-flex">
            {{-- <div class="mt-2 mb-2">
                <a href="javascript:void(0);" class="me-3" data-bs-toggle="tooltip" title="" data-bs-placement="top"
                    data-bs-original-title="attach"><i class="bx bx-paperclip text-muted tx-22"></i></a>
                <a href="javascript:void(0);" class="me-3" data-bs-toggle="tooltip" title="" data-bs-placement="top"
                    data-bs-original-title="Link"><i class="bx bx-link text-muted tx-22"></i></a>
                <a href="javascript:void(0);" class="me-3" data-bs-toggle="tooltip" title="" data-bs-placement="top"
                    data-bs-original-title="Photos"><i class="bx bx-image text-muted tx-22"></i></a>
                <a href="javascript:void(0);" class="me-3" data-bs-toggle="tooltip" title="" data-bs-placement="top"
                    data-bs-original-title="Delete"><i class="bx bx-trash text-muted tx-22"></i></a>
            </div> --}}
            <div class="btn-list ms-auto">
                {{-- <button type="button" class="btn btn-success btn-space">Discard</button>
                <button type="button" class="btn btn-primary btn-space">Save</button> --}}
                <button type="submit" class="btn btn-danger btn-space">Send</button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('scripts')



@endsection