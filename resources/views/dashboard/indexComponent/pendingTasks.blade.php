<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0"> Pending Tasks</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="pending-tasks" class="table table-bordered table-striped text-nowrap">
                <thead class="thead-danger">
                    <tr class="table-pending">
                        <th>ID</th>
                        <th>Station</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingTasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($task->main_task->station_id)
                            <div> {{ $task->main_task->station->SSNAME }}</div>
                            @else
                            <div>-</div>
                            @endif
                        </td>
                        <td>
                            @foreach($task->main_task->sharedDepartments as $dep)
                            @if($dep->id != Auth::user()->department_id)
                            <p><strong>Department : {{$dep->name}}</strong></p>
                            @endif
                            @endforeach
                            <!-- Station -->

                            <!-- Main Alarm -->
                            @if(isset($task->main_task->main_alarm_id))
                            <div><strong>Main Alarm:</strong> {{ $task->main_task->main_alarm->name }}</div>
                            @else
                            <div><strong>Main Alarm:</strong> -</div>
                            @endif

                            <!-- Engineer -->
                            @if($task->eng_id)
                            <div class="mt-2"><strong>Engineer:</strong>
                                <a href="{{ route('dashboard.engineerProfile',['eng_id'=>$task->eng_id]) }}">
                                    {{ $task->engineer->name }} - {{ $task->engineer->department->name }}
                                </a>
                                <br> <strong>Viewed:</strong>
                                @if($task->isSeen)
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </div>
                            @else
                            <div><strong>Engineer:</strong> -</div>
                            @endif

                            <!-- Status -->
                            <div class="mt-2"><strong>Status:</strong>
                                <span class="badge bg-danger">{{ $task->status }}</span>
                            </div>
                            @foreach($task->main_task->section_tasks as $sectionTask)
                            @if($sectionTask->department_id == $task->department_id)
                            <div class="engineer-note">
                                <p class="px-2 mb-0">
                                    <strong>Engineer Note</strong><br>
                                    Eng.{{ $sectionTask->engineer->name }}: {!!
                                    strip_tags($sectionTask->action_take) !!}
                                </p>
                            </div>
                            @endif
                            @endforeach

                        </td>


                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-danger btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fe fe-settings me-2"></i> Actions
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('dashboard.viewTask', ['id' => $task->id]) }}">
                                            <i class="fas fa-eye me-2"></i> View
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                            <i class="fas fa-history me-2"></i> History
                                        </a>
                                    </li>
                                    @if(Auth::user()->department_id == $task->department_id)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('dashboard.editTask', $task->main_tasks_id) }}">
                                            <i class="fas fa-edit me-2"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form method="post"
                                            action="{{ route('task.destroy', ['id' => $task->main_task->id]) }}"
                                            id="delete-form-{{ $task->main_task->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="deleteRecord({{ $task->main_task->id }})"
                                                class="dropdown-item text-danger">
                                                <i class="fas fa-trash me-2"></i> Delete Task
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form id="resendTaskForm" method="post"
                                            action="{{ route('resendTask', ['id' => $task->main_task->id]) }}">
                                            @csrf
                                            <button type="button" class="dropdown-item" onclick="confirmResend()">
                                                <i class="fas fa-paper-plane me-2"></i> Resend Task
                                            </button>
                                        </form>
                                    </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item " data-bs-target="#moveTask-{{ $task->id }}"
                                            data-bs-toggle="modal" href="#">
                                            <i class="fas fa-exchange-alt me-2"></i> Move to Another Department
                                        </a>
                                    </li>

                                </ul>
                            </div>



                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="moveTask-{{ $task->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="moveTaskLabel-{{ $task->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Move this task</h6>
                                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('dashboard.convertTask', $task->main_tasks_id) }}"
                                        method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="departmentSelect">Select Department</label>
                                            <input type="hidden" name="main_task" value="{{ $task->main_tasks_id }}">
                                            <select id="departmentSelect" name="departmentSelect" class="form-select">
                                                <option value="{{ Auth::user()->department_id }}">
                                                    {{ Auth::user()->department->name }}
                                                </option>
                                                @foreach ($departments as $department)
                                                @if ($department->id !== Auth::user()->department_id)
                                                <option value="{{ $department->id }}">{{ $department->name }}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="notes">Notes</label>
                                            <textarea id="notes" name="notes" class="form-control"></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary" type="submit">Save changes</button>
                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                        type="button">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>







        </div>
    </div>
</div>