<div id="alerts">
    @if(Session::has('message'))
        <div class="alert alert-info" role="alert">
            <div class="text-muted">{{Session('message')}}</div>
        </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <div class="text-muted">{{Session('success')}}</div>
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <div class="text-muted">{{Session('error')}}</div>
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <div class="text-muted">{{$error}}</div>
            </div>
        @endforeach
    @endif
</div>


<script>
    window.addEventListener('alert', event => {
        const detail = Array.isArray(event.detail) ? event.detail[0] : event.detail;

        const type = detail.type || 'info'; // Tipo di messaggio (info, success, error)
        const message = detail.message || '';

        const alertContainer = document.getElementById('alerts');
        const alert = document.createElement('div');
        alert.className = `alert alert-${type}`;
        alert.role = 'alert';
        alert.innerHTML = `<div class="text-muted">${message}</div>`;

        alertContainer.appendChild(alert);

        setTimeout(() => {
            alert.remove();
        }, 3000);
    });
</script>