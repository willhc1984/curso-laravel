@if(session('success'))
{{-- <div class="alert alert-success" role="alert">
    {{ session('success') }}
</div> --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            title: 'Pronto!',
            html: '{{ session('success') }}',
            icon: 'success'
        });
    });
</script>
@endif

@if(session('error'))
{{-- <div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div> --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            title: 'Erro:',
            html: '{{ session('error') }}',
            icon: 'error'
        });
    });
</script>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif  