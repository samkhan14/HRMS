@if (session()->has('success'))
<div id="alertmsg" class="alert alert-success">
    @if(is_array(session('success')))
    <ul>
        @foreach (session('success') as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    @else
    {{ session('success') }}
    @endif
</div>
@endif

<script>
    setTimeout(() => {
        var alertId = document.getElementById('alertmsg')
        alertId.classList.add('modal')
    }, 3000);
</script>
