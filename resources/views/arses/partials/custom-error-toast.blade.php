@if(session('custom_error'))
    <div class="notif notifBox errorNotif">
        <p>{{ session('custom_error') }}</p>
    </div>
@endif
