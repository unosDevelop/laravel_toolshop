@extends('admin.layout.main')
@section('container')
<h1>Halaman Sedang proses pembuatan</h1>
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 mr-auto">{{ $user_profile->name }}</h5>
            <i class="fa fa-circle user-status-icon user-icon-{{ $user_profile->id }} ml-2" title="away"></i>
        </div>
        <hr>
        <h6>active user list</h6>
        <ul class="list-group list-chat-item">
            @if($users->count())
                @foreach($users as $user)
                    <li class="list-group-item d-flex align-items-center">
                        <div class="chat-image mr-3">
                            {{-- {!! makeImageFromName($user->name) !!} --}}
                        </div>
                        <div class="chat-name font-weight-bold">{{ $user->name }}</div>
                        {{-- <a href="{{ route('message.conversation', $user->id) }}"> --}}
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let user_id = "{{ auth()->user()->id }}";
            let ip_address = '127.0.0.1';
            let socket_port = '3000';
            let socket = io(`http://${ip_address}:${socket_port}`);

            socket.on('connect', function() {
                socket.emit('user_connected', user_id);
            });

            socket.on('updateUserStatus', (data) => {
                let userStatusIcons = document.querySelectorAll('.user-status-icon');
                userStatusIcons.forEach(icon => {
                    icon.classList.remove('text-success');
                    icon.setAttribute('title', 'Away');
                });

                Object.entries(data).forEach(([key, val]) => {
                    if (val !== null && val !== 0) {
                        let userIcon = document.querySelector(".user-icon-" + key);
                        if (userIcon) {
                            userIcon.classList.add('text-success');
                            userIcon.setAttribute('title', 'Online');
                        }
                    }
                });
            });
        });
    </script>
    @endpush
@endsection
