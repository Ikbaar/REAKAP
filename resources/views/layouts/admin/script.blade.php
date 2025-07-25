<!-- resources/views/layouts/admin/script.blade.php -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<script>
    // Aktifkan tooltip Bootstrap
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const darkModeSwitch = document.getElementById('darkModeSwitch');
    const themeIcon = document.getElementById('themeIcon');
    const body = document.body;

    function updateIcon(isDark) {
        if (isDark) {
            themeIcon.classList.remove('bi-sun');
            themeIcon.classList.add('bi-moon');
        } else {
            themeIcon.classList.remove('bi-moon');
            themeIcon.classList.add('bi-sun');
        }
    }

    // Inisialisasi
    const isDark = localStorage.getItem('theme') === 'dark';
    if (isDark) {
        body.classList.add('dark-mode');
        darkModeSwitch.checked = true;
    }
    updateIcon(isDark);

    darkModeSwitch.addEventListener('change', function () {
        if (this.checked) {
            body.classList.add('dark-mode');
            localStorage.setItem('theme', 'dark');
            updateIcon(true);
        } else {
            body.classList.remove('dark-mode');
            localStorage.setItem('theme', 'light');
            updateIcon(false);
        }
    });
});
</script>

<script></script>






