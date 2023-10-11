@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{Auth::user()->department->name}}</h4><span
                class="text-muted mt-1 tx-13 ms-2 mb-0">/
                Pending users list</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="card">
        <div class="card-body">
            <div>
                <h6 class="card-title mb-1">Pending users</h6>
                <p class="text-muted card-sub-title">Select users from the list to activate thir account</p>
            </div>
            <div class="mb-4">
                <p class="mg-b-10">Please select users from the list below:</p>
                <form action="{{ route('update.users') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select multiple="multiple" name="users[]" class="selectsum1">
                        @foreach($pendingUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Activate Users</button>
                </form>


            </div>

        </div>
    </div>
</div>
<!-- row closed -->

@endsection

@section('scripts')


<!-- Internal Select2 js-->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

<!--Internal Sumoselect js-->
<script src="{{asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
>



@endsection