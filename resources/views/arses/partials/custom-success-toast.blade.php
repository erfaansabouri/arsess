@if(session('custom_success'))
    <div class="notif notifBox successNotif">
        <img src="{{ asset('arses/asset/img/white-tick.svg') }}" alt="icon" />
        <p>{{ session('custom_success') }}</p>
    </div>
@endif
