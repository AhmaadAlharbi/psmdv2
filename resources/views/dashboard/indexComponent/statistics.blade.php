<div class="card-body">
    {{-- <div class="main-content-label mg-b-5">
        Basic Style2 Tabs
    </div>
    <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
    </p> --}}
    <div class="text-wrap">
        <div class="example">
            <div class="panel panel-primary tabs-style-2">
                <div class=" tab-menu-heading">
                    <div class="tabs-menu1">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs main-nav-line">
                            <li><a href="#tab4" class="nav-link me-1 active" data-bs-toggle="tab">Tasks
                                    Statistics</a>
                            </li>
                            <li><a href="#tab6" class="nav-link" data-bs-toggle="tab">Engineers Statistics</a>
                            </li>
                            <li><a href="#tab5" class="nav-link me-1" data-bs-toggle="tab">Reports & User
                                    Approvals</a></li>


                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body main-content-body-right border">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab4">
                            <div class="col-md-12 card">
                                <div class="card-header pb-0">
                                    <div class="card-title pb-0 mb-2">Tasks Statistics</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 text-center">
                                            <div class="fw-bold tx-20">
                                                <div class="text-primary"> Today Tasks</div>
                                                <div>{{ $totalTasksInDay }}</div>
                                                <div class="text-muted">Completed</div>
                                                <div>{{ $completedTasksInDay }}</div>
                                            </div>
                                            <div class="progress ht-20 mt-4">

                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary ht-20"
                                                    style="width: {{ $totalTasksInDay > 0 ? ($completedTasksInDay / $totalTasksInDay) * 100 : 0 }}%;">
                                                    <span class="tx-18">
                                                        {{ number_format($totalTasksInDay > 0 ?
                                                        ($completedTasksInDay /
                                                        $totalTasksInDay) * 100 : 0, 2) }}%
                                                    </span>
                                                </div>
                                            </div>

                                        </div><!-- col -->
                                        <div class="col-sm-12 col-md-6 border-start text-center">
                                            <div class="fw-bold tx-20">
                                                <div class="text-warning">This Week Tasks</div>
                                                <div>{{ $totalTasksInWeek }}</div>
                                                <div class="text-muted">Completed</div>
                                                <div>{{ $completedTasksInWeek }}</div>
                                            </div>
                                            <div class="progress ht-20 mt-4">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning ht-20"
                                                    style="width: {{ $totalTasksInWeek > 0 ? min(100, ($completedTasksInWeek / $totalTasksInWeek) * 100) : 0 }}%;">
                                                    <span class="tx-18">
                                                        {{ $totalTasksInWeek > 0 ? number_format(min(100,
                                                        ($completedTasksInWeek /
                                                        $totalTasksInWeek) * 100), 2) : 0 }}%
                                                    </span>
                                                </div>

                                            </div>
                                        </div><!-- col -->
                                        <div class="col-sm-12 col-md-6 border-start text-center">
                                            <div class="fw-bold tx-20">
                                                <div class="text-danger"> This Month Tasks</div>
                                                <div>{{ $totalTasksInMonth }}</div>
                                                <div class="text-muted">Completed</div>
                                                <div>{{ $completedTasksInMonth }}</div>
                                            </div>
                                            <div class="progress ht-20 mt-4">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger ht-20"
                                                    style="width: {{ $totalTasksInMonth > 0 ? ($completedTasksInMonth / $totalTasksInMonth) * 100 : 0 }}%;">
                                                    <span class="tx-18">
                                                        {{ number_format($totalTasksInMonth > 0 ?
                                                        ($completedTasksInMonth /
                                                        $totalTasksInMonth) * 100 : 0, 2) }}%
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- col -->
                                    </div><!-- row -->
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="tab5">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 text-center">
                                    <h3>Reports Ready for Approval ({{$pendingReportsCount}}) </h3>
                                    <a href="{{route('dashboard.pendingReports')}}" class="btn btn-dark">Check
                                        Pending
                                        Reports</a>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <li class="icons-list-item"><i class="fa fa-hourglass-end text-danger"></i></li>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-md-6 text-center">
                                    <h3>Users Ready for Approval ({{$usersPendingCount}}) </h3>
                                    <a href="{{route('dashboard.pendingUsers')}}" class="btn btn-warning">Check
                                        Users
                                    </a>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <li class="icons-list-item"><i class="fa fa-hourglass-end text-danger"></i></li>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab6">
                            <p>Explore the table below to view a detailed summary of engineers, highlighting
                                completed and pending tasks.</p>


                            <div class="table-responsive">
                                <table class="table border-top-0 table-bordered text-nowrap border-bottom"
                                    id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0"><i class="fas fa-user"></i> Name
                                            </th>
                                            <th class="wd-15p border-bottom-0"><i class="fas fa-tasks"></i>
                                                Assigned Tasks</th>
                                            <th class="wd-20p border-bottom-0"><i class="fas fa-check-circle"></i>
                                                Completed
                                                Tasks</th>
                                            <th class="wd-15p border-bottom-0"><i class="fas fa-clock"></i>
                                                Pending Tasks</th>
                                            <th class="wd-15p border-bottom-0"><i class="fas fa-percent"></i>
                                                Completion Percentage</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($engineerData as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $data['name'] }}</td>
                                            <td>{{ $data['assigned_tasks'] }}</td>
                                            <td class=" bg-light">
                                                {{
                                                $data['completed_tasks'] }}</td>
                                            <td class="bg-secondary">{{
                                                $data['pending_tasks']}}
                                            </td>
                                            <td>
                                                @if (array_key_exists('completion_percentage', $data))
                                                {{ $data['completion_percentage'] }}%
                                                @else
                                                N/A
                                                @endif
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>