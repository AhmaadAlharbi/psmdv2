<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0">Pending Tasks</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="pending-tasks-files" class="table table-bordered table-striped text-nowrap">
                <thead class="thead-danger">
                    <tr class="table-pending">
                        <th>ID</th>
                        <th>Station</th>
                        <th>Work Type</th>
                        <th>Details</th>
                        <th>Engineer</th>
                        <th class="d-none">Eng Engineer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingTasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($task->main_task->station_id)
                            {{ $task->main_task->station->SSNAME }}
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ $task->main_task->work_type }}</td>
                        <td>
                            @foreach($task->main_task->sharedDepartments as $dep)
                            @if($dep->id != Auth::user()->department_id)
                            <p><strong>Department: {{ $dep->name }}</strong></p>
                            @endif
                            @endforeach
                            <div><strong>Date:</strong> {{ $task->created_at->format('M d, Y H:i A') }}</div>

                            @if ($task->updated_at != $task->created_at)
                            <div><strong>Updated at:</strong> {{ $task->updated_at->format('M d, Y H:i A') }}</div>
                            @endif

                            @if(isset($task->main_task->main_alarm_id))
                            <div><strong>Main Alarm:</strong> {{ $task->main_task->main_alarm->name }}</div>
                            @else
                            <div><strong>Main Alarm:</strong> -</div>
                            @endif
                            <div class="mt-2"><strong>Status:</strong> <span class="badge bg-danger">{{ $task->status
                                    }}</span></div>
                        </td>
                        <td class="d-none">
                            @if($task->eng_id)
                            <div class="mt-2">
                                <a href="{{ route('dashboard.engineerProfile',['eng_id'=>$task->eng_id]) }}"
                                    class="text-decoration-none">
                                    <span>{{ $task->engineer->name }}</span>

                                    @if($task->isSeen)
                                    <i class="fas fa-check-circle text-success" data-bs-toggle="tooltip"
                                        title="Task Viewed"></i>
                                    @else
                                    <i class="fas fa-times-circle text-danger" data-bs-toggle="tooltip"
                                        title="Task Not Viewed"></i>
                                    @endif
                                </a>
                                <div class="mt-2">
                                    @if($task->task_note()->where('department_task_assignment_id', $task->id)->exists())
                                    <a href="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}"
                                        class="btn btn-dark btn-sm view-notes-button">
                                        <i class="fas fa-clipboard-list"></i> View Task Notes
                                    </a>

                                    @endif
                                </div>

                            </div>
                            @else
                            <div><strong>Engineer:</strong> -</div>
                            @endif
                            @if(now() <= \Carbon\Carbon::parse($task->due_date . ' ' . $task->due_time))
                                <p class="alert-warning p-1">Scheduled for Completion on Date {{$task->due_date}} -
                                    {{$task->due_time}}</p>
                                @endif


                        </td>
                        {{--arabic name td --}}
                        <td>
                            @if($task->eng_id)
                            <div class="mt-2">
                                <a href="{{ route('dashboard.engineerProfile',['eng_id'=>$task->eng_id]) }}"
                                    class="text-decoration-none">
                                    <span>{{ $task->engineer->arabic_name }}</span>

                                    @if($task->isSeen)
                                    <i class="fas fa-check-circle text-success" data-bs-toggle="tooltip"
                                        title="Task Viewed"></i>
                                    @else
                                    <i class="fas fa-times-circle text-danger" data-bs-toggle="tooltip"
                                        title="Task Not Viewed"></i>
                                    @endif
                                </a>
                                <div class="mt-2">
                                    @if($task->task_note()->where('department_task_assignment_id', $task->id)->exists())
                                    <a href="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}"
                                        class="btn btn-dark btn-sm view-notes-button">
                                        <i class="fas fa-clipboard-list"></i> View Task Notes
                                    </a>
                                    @endif
                                </div>

                            </div>
                            @else
                            <div><strong>Engineer:</strong> -</div>
                            @endif
                            @if(now() <= $task->due_date && $task->due_time)
                                <p class="scheduled-completion">
                                    <i class="fas fa-clock mr-2"></i>
                                    Scheduled for Completion on Date {{ $task->due_date }} - {{
                                    \Carbon\Carbon::parse($task->due_time)->format('h:i A') }}
                                </p>
                                @endif



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
                                            href="{{ route('taskNote.show', ['department_task_id' => $task->main_tasks_id]) }}">
                                            <i class="fas fa-file-alt me-2"></i> Add Task Note
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
                                    {{-- <li>
                                        <form id="resendTaskForm{{ $task->main_task->id }}" method="post"
                                            action="{{ route('resendTask', ['id' => $task->main_task->id]) }}">
                                            @csrf
                                            <button type="button" class="dropdown-item"
                                                onclick="confirmResend('{{ $task->main_task->id }}')">
                                                <i class="fas fa-paper-plane me-2"></i> Resend Task
                                            </button>
                                        </form>
                                        <script>
                                            function confirmResend(taskId) {
                                                // You can add a confirmation dialog here if needed
                                                document.getElementById('resendTaskForm' + taskId).submit();
                                            }
                                        </script>
                                    </li> --}}
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
                                                <option value="{{ Auth::user()->department_id }}">{{
                                                    Auth::user()->department->name }}</option>
                                                @foreach ($departments as $department)
                                                @if ($department->id !== Auth::user()->department_id)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Check if there's a SweetAlert message in the session
        let successMessage = "{{ session('success') }}";
        let errorMessage = "{{ session('error') }}";

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: successMessage,
            });
        }

        if (errorMessage) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: errorMessage,
            });
        }
    });
</script>