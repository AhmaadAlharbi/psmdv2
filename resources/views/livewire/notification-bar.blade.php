<div class="mt-1">
    @if ($usersNotificationsCount > 0)
    <a href="{{route('dashboard.pendingUsers')}}" class="d-flex p-3 border-bottom" href="javascript:void(0);">
        <div class="notifyimg bg-purple ht-40">
            <i class="la la-user-check text-white"></i>
        </div>
        <div class="ms-3">
            <h5 class="notification-label mb-1">Users approval</h5>
            <div class="notification-subtext">{{ $usersNotificationsCount }} new</div>
        </div>
        <div class="ms-auto">
            <i class="las la-angle-right text-end text-muted"></i>
        </div>
    </a>
    @endif
    @if ($reportsNotificationsCount > 0)
    <a href="{{route('dashboard.pendingReports')}}" class="d-flex p-3 border-bottom" href="javascript:void(0);">
        <div class="notifyimg bg-warning ht-40">
            <i class="la la-file-alt text-white"></i>
        </div>
        <div class="ms-3">
            <h5 class="notification-label mb-1">Reports Approval</h5>
            <div class="notification-subtext">{{ $reportsNotificationsCount }} new</div>
        </div>
        <div class="ms-auto">
            <i class="las la-angle-right text-end text-muted"></i>
        </div>
    </a>
    @endif
    @if ($incomingTasksNotificationsCount > 0)

    {{-- <a href="{{ route('dashboard.showTasks', ['status' => 'mutual-tasks']) }}" class="d-flex p-3 border-bottom"
        href="javascript:void(0);">
        <div class="notifyimg bg-success ht-40">
            <i class="la la-refresh text-white"></i>
        </div>
        <div class="ms-3">
            <h5 class="notification-label mb-1">Incoming Tasks</h5>
            <div class="notification-subtext">{{ $incomingTasksNotificationsCount }} new</div>
        </div>
        <div class="ms-auto">
            <i class="las la-angle-right text-end text-muted"></i>
        </div>
    </a> --}}

    <div class="notification-list">
        @foreach ($incomingTasksConvertedNotifications as $notification)
        <div class="notification-item border-bottom mb-3 pb-3">
            <div class="d-flex align-items-center">
                <i class="{{ $notification['icon'] }} text-primary me-3" style="font-size: 24px;"></i>
                <div>
                    <a href="{{ route('dashboard.viewTask', ['id' => $notification['department_task_id'] ]) }}"
                        wire:click="markAsRead({{ $notification['id'] }})" class="text-decoration-none">

                        <span class="fw-bold">{{ $notification['label'] }}</span>
                        <p class="notification-subtext mb-0">{{ $notification['subtext'] }}</p>
                    </a>

                </div>
            </div>
        </div>
        @endforeach

    </div>

    @endif


</div>


{{-- <div class="mt-1">
    @if (count($usersNotifications) > 0 || count($reportsNotifications) > 0 ||
    count($incomingTasksConvertedNotifications) > 0)


    <a class="d-flex p-3 border-bottom" href="javascript:void(0);">
        <div class="notifyimg bg-purple ht-40">
            <i class="la la-gem text-white"></i>
        </div>
        <div class="ms-3">
            <h5 class="notification-label mb-1">Users approval</h5>
            <div class="notification-subtext">2 days ago</div>
        </div>
        <div class="ms-auto">
            <i class="las la-angle-right text-end text-muted"></i>
        </div>
    </a>


    <a class="d-flex p-3 border-bottom" href="javascript:void(0);">
        <div class="notifyimg bg-purple ht-40">
            <i class="la la-gem text-white"></i>
        </div>
        <div class="ms-3">
            <h5 class="notification-label mb-1">Reports Approval</h5>
            <div class="notification-subtext">2 days ago</div>
        </div>
        <div class="ms-auto">
            <i class="las la-angle-right text-end text-muted"></i>
        </div>
    </a>

    <a class="d-flex p-3 border-bottom" href="javascript:void(0);">
        <div class="notifyimg bg-purple ht-40">
            <i class="la la-gem text-white"></i>
        </div>
        <div class="ms-3">
            <h5 class="notification-label mb-1">Incoming Tasks</h5>
            <div class="notification-subtext">2 days ago</div>
        </div>
        <div class="ms-auto">
            <i class="las la-angle-right text-end text-muted"></i>
        </div>
    </a>
    @endif
</div> --}}