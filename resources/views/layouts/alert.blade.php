@if (session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            gravity: "top",
            close: true,
            stopOnFocus: true,
            position: "right",
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
        }).showToast();
    </script>
@endif

@if(session('error'))
    <script>
        Toastify({
            text: "{{ session('error') }}",
            duration: 3000,
            gravity: "top",
            close: true,
            stopOnFocus: true,
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff4d4f, #ff9966)",
        }).showToast();
    </script>
@endif