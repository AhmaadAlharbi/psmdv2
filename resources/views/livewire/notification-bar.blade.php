<div class="mt-1">
    @if (count($usersNotifications) > 0 || count($reportsNotifications) > 0)

    <!-- Users Notifications -->
    @foreach($usersNotifications as $notification)

    <a wire:click.prevent="markNotificationAsRead('{{ $notification['type'] }}', {{ $notification['id'] }})"
        class="d-flex p-3 border-bottom" href="javascript:void(0);">
        <div class="notifyimg bg-danger ht-40">
            <i class="{{ $notification['icon'] }} text-white"></i>
        </div>
        <div class="ms-3">
            <h5 class="notification-label mb-1">{{ $notification['label'] }}</h5>
            @if ($notification['subtext'])
            <div class="notification-subtext">{{ $notification['subtext'] }}</div>
            @endif
        </div>
        <div class="ms-auto">
            <i class="las la-angle-right text-end text-muted"></i>
        </div>
    </a>
    @endforeach

    <!-- Reports Notifications -->
    @foreach($reportsNotifications as $notification)
    <a class="d-flex p-3 border-bottom" href="javascript:void(0);">
        <div class="notifyimg bg-danger ht-40">
            <i class="{{ $notification['icon'] }} text-white"></i>
        </div>
        <div class="ms-3">
            <h5 class="notification-label mb-1">{{ $notification['label'] }}</h5>
            @if ($notification['subtext'])
            <div class="notification-subtext">{{ $notification['subtext'] }}</div>
            @endif
        </div>
        <div class="ms-auto">
            <i class="las la-angle-right text-end text-muted"></i>
        </div>
    </a>
    @endforeach

    @endif
</div>