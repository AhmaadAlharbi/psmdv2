<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0"><i class="fas fa-tasks"></i> Tasks need to be assigned to engineers</h4>
        </div>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table id="unassigned-tasks" class="border-top-0  table table-bordered text-nowrap border-bottom">
                <thead>
                    <tr class="bg-secondary-gradient">
                        <th class="text-lg">ID</th>
                        <th class="text-lg">Department</th>
                        <th class="text-lg">STATION</th>
                        <th class="text-lg">Departments Notes</th>
                        <th class="text-lg">Engineer Notes</th>
                        <th class="text-lg d-none d-md-table-cell">Main Alarm</th>
                        <th class="text-lg d-none d-md-table-cell">DATE</th>
                        <th class="text-lg">OPERATION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unAssignedTasks as $task)
                    <tr>
                        <th scope="row" class="text-lg">{{ $loop->iteration }}</th>
                        <td>
                            @foreach($task->main_task->sharedDepartments as $dep)
                            @if($dep->id != Auth::user()->department_id)
                            <p><strong> {{$dep->name}}</strong></p>
                            @endif
                            @endforeach
                        </td>
                        <td class="text-lg">

                            @if($task->main_task->station_id)
                            {{$task->main_task->station->SSNAME}}
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            {{$task->main_task->notes}}
                        </td>
                        <td>
                            @if(count($task->main_task->section_tasks) > 0)
                            @foreach($task->main_task->section_tasks as $sectionTask)
                            <div class="engineer-note">
                                <p class="px-2 mb-0">
                                    <strong> Eng.{{ $sectionTask->engineer->name }}:</strong><br>
                                    {!!
                                    strip_tags($sectionTask->action_take) !!}
                                </p>
                            </div>
                            @endforeach
                            @endif
                        </td>

                        <td class="text-lg d-none d-md-table-cell">

                            @if(isset($task->main_task->main_alarm_id))
                            {{$task->main_task->main_alarm->name}}
                            @else
                            -

                        </td>
                        @endif
                        <td class="text-lg d-none d-md-table-cell">{{$task->created_at}}</td>
                        <td>
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fe fe-settings"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('dashboard.viewTask', ['id' => $task->id]) }}">
                                        <i class="fas fa-eye"></i> View</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('dashboard.editTask', $task->main_tasks_id) }}">
                                        <i class="fas fa-edit"></i> Edit</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                        <i class="fas fa-history"></i> History</a></li>
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#moveTask-{{ $task->id }}">
                                        <i class="fas fa-exchange-alt"></i> Move to Another Department
                                    </a>
                                </li>
                                <li>
                                    <form method="post"
                                        action="{{ route('task.destroy', ['id' => $task->main_task->id]) }}"
                                        id="delete-form-{{ $task->main_task->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteRecord({{ $task->main_task->id }})"
                                            class="dropdown-item"> <i class="fas fa-trash "></i> Delete
                                            Task</button>
                                    </form>
                                </li>






                            </ul>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal" id="moveTask-{{ $task->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="moveTaskLabel-{{ $task->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Update this task</h6>
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
                                                @if ($department->id !==
                                                Auth::user()->department_id)
                                                <option value="{{ $department->id }}">{{
                                                    $department->name }}</option>
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
                                    <button class="btn ripple btn-primary" type="submit">Save
                                        changes</button>
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