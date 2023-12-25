{{--engineers --}}
<div class="col-xl-4 col-lg-6 col-md-6">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <a href="{{ route('dashboard.engineersList') }}">
        <div class="card bg-primary-gradient">
            <div class="card-body">
                <div class="counter-status d-flex md-mb-0">
                    <div class="counter-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="ms-auto">
                        <h5 class="tx-18 tx-white-8 mb-3">Engineers</h5>
                        <h2 class="counter mb-0 text-white">{{ $engineersCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

{{--pending tasks--}}
<div class="col-xl-4 col-lg-6 col-md-6">
    <a href="{{ route('dashboard.showTasks', ['status' => 'pending']) }}">
        <div class="card bg-danger-gradient">
            <div class="card-body">
                <div class="counter-status d-flex md-mb-0">
                    <div class="counter-icon text-warning">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="ms-auto">
                        <h5 class="tx-18 tx-white-8 mb-3">Pending Tasks</h5>
                        <h2 class="counter mb-0 text-white">{{ $pendingTasksCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

{{-- completed tasks --}}
<div class="col-xl-4 col-lg-6 col-md-6">
    <a href="{{ route('dashboard.showTasks', ['status' => 'completed']) }}">
        <div class="card bg-success-gradient">
            <div class="card-body">
                <div class="counter-status d-flex md-mb-0">
                    <div class="counter-icon text-primary">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="ms-auto">
                        <h5 class="tx-18 tx-white-8 mb-3">Completed Tasks</h5>
                        <h2 class="counter mb-0 text-white">{{ $completedTasksCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>


{{-- Shared Department Tasks --}}
<div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="card-order">
                <a href="{{ route('dashboard.showTasks', ['status' => 'mutual-tasks']) }}">
                    <h6 class="mb-2">Shared Department Tasks</h6>
                    <h2 class="text-end">
                        <i class="fas fa-share-square icon-size float-start text-primary"></i>
                        <span>{{ $mutualTasksCount }}</span>
                    </h2>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Reports Archive --}}
<div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="card-order">
                <a href="{{ route('dashboard.archive') }}">
                    <h6 class="mb-2">Reports Archive</h6>
                    <h2 class="text-end">
                        <i class="fas fa-archive icon-size float-start text-primary"></i>
                        <span>{{ $completedTasksCount }}</span>
                    </h2>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- substations --}}
<div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="card-order">
                <a href="{{ route('stations.index') }}">
                    <h6 class="mb-2">Substations</h6>
                    <h2 class="text-end">
                        <i class="fas fa-bolt icon-size float-start text-primary"></i>
                        <span>{{ $stationsCount }}</span>
                    </h2>
                </a>
            </div>
        </div>
    </div>
</div>