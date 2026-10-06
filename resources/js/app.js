import './bootstrap';
import './toast';

// Hamburger: toggle sidebar on mobile when #toggleSidebar is checked
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('toggleSidebar');
    const sidebar = document.querySelector('.sidebar');
    if (!toggle || !sidebar) return;

    toggle.addEventListener('change', function () {
        sidebar.classList.toggle('show', this.checked);
        document.body.classList.toggle('sidebar-open', this.checked);
    });

    sidebar.querySelectorAll('.sidebar-link').forEach(function (link) {
        link.addEventListener('click', function () {
            toggle.checked = false;
            sidebar.classList.remove('show');
            document.body.classList.remove('sidebar-open');
        });
    });

    document.addEventListener('click', function (e) {
        if (toggle.checked && !sidebar.contains(e.target) && !toggle.contains(e.target) && !e.target.closest('.hamburger')) {
            toggle.checked = false;
            sidebar.classList.remove('show');
            document.body.classList.remove('sidebar-open');
        }
    });
});