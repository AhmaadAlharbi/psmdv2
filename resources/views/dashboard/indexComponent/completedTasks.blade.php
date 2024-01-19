<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0"> Completed Tasks</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="completed-tasks" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr class="table-completed">
                        <th>#</th>
                        <th>Station</th>
                        <th>Work Type</th>
                        <th>Details</th>
                        <th>Action Take</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($completedTasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->main_task->station->SSNAME }}</td>
                        <td>
                            <div>{{$task->main_task->work_type}}</div>
                        </td>
                        <td>
                            @isset($task->main_alarm_id)
                            <div>
                                <strong>Main Alarm:</strong> {{ $task->main_task->main_alarm->name }}
                            </div>
                            @endisset

                            <div>
                                <strong>Alarm Date:</strong> {{ $task->main_task->created_at->format('M d, Y h:i A') }}
                            </div>

                            <div class="additional-details mt-3">
                                <strong>Status:</strong>
                                <span class="badge bg-success">{{ $task->status }}</span>
                                <br>
                                <strong>Report Added:</strong> {{ $task->created_at->format('M d, Y h:i A') }}
                            </div>
                        </td>

                        <td>
                            <div class="action_take">
                                <div class="engineer-details">
                                    <strong>Engineer:</strong>
                                    <a href="{{ route('dashboard.engineerProfile',['eng_id'=>$task->eng_id]) }}">
                                        {{ $task->engineer->name }} - {{ $task->engineer->department->name }}
                                    </a>
                                </div>
                                <strong>Action Take:</strong>
                                {!! $task->action_take !!}
                            </div>
                        </td>
                        <td>
                            <div class="actions-dropdown">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('dashboard.reportPage',['id'=>$task->id]) }}">
                                        View Report
                                    </a>

                                    <a class="dropdown-item"
                                        href="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}">
                                        <i class="fas fa-file-alt me-2"></i> Add Task Note
                                    </a>


                                    <a class="dropdown-item"
                                        href="{{ route('dashboard.editTask', $task->main_tasks_id) }}">
                                        Edit
                                    </a>
                                    <a class="dropdown-item"
                                        href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                        History
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="btn btn-secondary btn-sm"
                                        data-bs-target="#modaldemo{{$task->main_tasks_id}}" data-bs-toggle="modal"
                                        href="#">
                                        Update Department
                                    </a>
                                </div>

                            </div>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="modaldemo{{$task->main_tasks_id}}" tabindex="-1" role="dialog"
                        aria-labelledby="modaldemoLabel{{$task->main_tasks_id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Task</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('dashboard.convertTask', $task->main_tasks_id) }}"
                                        method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="departmentSelect" class="form-label">Select Department</label>
                                            <input type="hidden" name="main_task" value="{{ $task->main_tasks_id }}">
                                            <select class="form-select" id="departmentSelect" name="departmentSelect">
                                                <option value="{{ Auth::user()->department_id }}">
                                                    {{ Auth::user()->department->name }}
                                                </option>
                                                @foreach($departments as $department)
                                                @if($department->id !== Auth::user()->department_id)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="notes" class="form-label">Notes</label>
                                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>