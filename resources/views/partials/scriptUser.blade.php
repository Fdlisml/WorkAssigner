{{-- =========== Scripts ========= --}}

@if (session('error'))
    <script>
        alert("{{ session('error') }}")
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var statusDivs = document.querySelectorAll('.status #status-div');

        statusDivs.forEach(function(statusDiv) {
            var statusValue = parseInt(statusDiv.innerText);
            statusDiv.innerText = '';
            switch (statusValue) {
                case 1:
                    statusDiv.style.backgroundColor = '#ff0019';
                    break;
                case 2:
                    statusDiv.style.backgroundColor = '#fcbd00';
                    break;
                case 3:
                    statusDiv.style.backgroundColor = '#11d87b';
                    break;
                default:
                    break;
            }
        });
    });
</script>
<script src="{{ asset('js/navigation.js') }}"></script>
<script src="{{ asset('js/dropdown.js') }}"></script>
<script src="{{ asset('js/nightMode.js') }}"></script>
<script src="{{ asset('js/modalBoxUser.js') }}"></script>
<script src="{{ asset('js/range.js') }}"></script>
<script src="{{ asset('js/say.js') }}"></script>
<script src="{{ asset('js/jam.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script>

{{--  ====== ionicons ======= --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

{{-- Data tables --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table').dataTable({
         "pageLength": 5
        });
    });
</script>
