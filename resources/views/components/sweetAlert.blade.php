<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            text: "{{ session('success') }}",
            confirmButtonColor: '#0d6efd',
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            text: "{{ session('error') }}",
            confirmButtonColor: '#dc3545',
        });
    @endif

    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            html: `
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            `,
            confirmButtonColor: '#dc3545',
        });
    @endif
</script>
