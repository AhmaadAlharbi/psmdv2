{{-- incoming table--}}
{{-- @if (!$incomingTasks->isEmpty())
<div class="card d-none d-xl-block">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0">Incoming Tasks</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="incoming-tasks" class="border-top-0  table table-bordered text-nowrap border-bottom">
                <thead>
                    <tr class="bg-info-gradient">
                        <th>ID</th>
                        <th>STATION</th>
                        <th>FROM</th>
                        <th>TO</th>
                        <th>Date</th>
                        <th>OPERATION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incomingTasks as $task)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$task->main_task->station->SSNAME}}</td>
                        <td>{{$task->department->name}}</td>
                        <td>{{$task->toDepartment->name}}</td>
                        <td>{{$task->created_at}}</td>
                        <td>
                            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fe fe-settings"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    @if($task->status =='completed')
                                    <a href="{{route('dashboard.editTask',$task->main_tasks_id)}}"
                                        class="dropdown-item">View</a>
                                    @endif
                                </li>

                                <li><a class="dropdown-item"
                                        href="{{ route('dashboard.editTask', $task->main_tasks_id) }}">
                                        <i class="fas fa-edit"></i> Edit</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                        <i class="fas fa-history"></i> History</a></li>
                            </ul>



                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endif --}}
{{-- outgoing tasks--}}
@if (!$outgoingTasks->isEmpty())
<div class="card d-none d-xl-block">
    <div class="card-header pb-0">
        <h4 class="card-title mg-b-0">Outgoing Tasks</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="outgoing-tasks" class="border-top-0  table table-bordered text-nowrap border-bottom">
                <thead>
                    <tr class="bg-pink-gradient">
                        <th>ID</th>
                        <th>STATION</th>
                        <th>FROM</th>
                        <th>TO</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>OPERATION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outgoingTasks as $task)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$task->main_task->station->SSNAME}}</td>
                        <td>{{$task->department->name}}</td>
                        <td>{{$task->toDepartment->name}}</td>
                        <td>{{$task->created_at}}</td>
                        @if($task->status === 'pending')
                        <td> <span class="badge bg-danger me-1">Pendng</span></td>
                        @else
                        <td> <span class="badge bg-success me-1">{{$task->status}}</span>
                        </td>
                        @endif
                        <td>

                            <button type="button" class="btn btn-outline-danger dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fe fe-settings"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    @if($task->status =='completed')
                                    <a href="{{route('dashboard.getAllReportsForAtask',$task->main_tasks_id)}}"
                                        class="dropdown-item">View Report</a>
                                    <a href="{{route('dashboard.editTask',$task->main_tasks_id)}}"
                                        class="dropdown-item">Edit</a>
                                    @endif
                                </li>

                                {{-- <li><a class="dropdown-item"
                                        href="{{ route('dashboard.viewTask', $task->main_tasks_id) }}">
                                        <i class="fas fa-eye"></i> View</a></li> --}}
                                <li><a class="dropdown-item"
                                        href="{{ route('dashboard.timeline', ['id' => $task->main_tasks_id]) }}">
                                        <i class="fas fa-history"></i> History</a></li>
                                <li>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal-{{ $task->id }}">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#cancelConfirmationModal-{{ $task->id }}">
                                        <i class="fas fa-times"></i> Cancel Tracking
                                    </a>
                                </li>
                            </ul>



                        </td>


                    </tr>
                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteConfirmationModal-{{ $task->id }}" tabindex="-1"
                        aria-labelledby="deleteConfirmationModalLabel-{{ $task->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel-{{ $task->id }}">
                                        Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this converted task?
                                    <form action="{{ route('dashboard.deleteConvertedTask', ['id' => $task->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value="{{$task->id}}" name="task_id">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    {{-- <button type="submit" class="btn btn-danger" id="confirmDelete">Delete</button>
                                    --}}
                                    <button class="btn btn-outline-danger" id="deleteTask" data-id="{{ $task->id }}">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- cancel Confirmation Modal -->
                    <div class="modal fade" id="cancelConfirmationModal-{{ $task->id }}" tabindex="-1"
                        aria-labelledby="cancelConfirmationModal-{{ $task->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cancelConfirmationModal-{{ $task->id }}">
                                        Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to cancel this converted task?
                                    <form action="{{ route('dashboard.cancelConvertedTask', ['id' => $task->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value="{{$task->id}}" name="task_id">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    {{-- <button type="submit" class="btn btn-danger" id="confirmDelete">Delete</button>
                                    --}}
                                    <button class="btn btn-outline-danger" id="deleteTask" data-id="{{ $task->id }}">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>

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
@endif