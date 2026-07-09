import 'bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    // Sidebar toggle functionality
    const sidebarCollapse = document.getElementById('sidebarCollapse');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');

    if (sidebarCollapse && sidebar) {
        sidebarCollapse.addEventListener('click', function (e) {
            e.stopPropagation();
            if (window.innerWidth <= 992) {
                sidebar.classList.toggle('active');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });
    }

    // Auto-close sidebar on mobile when clicking on main content
    if (mainContent && sidebar) {
        mainContent.addEventListener('click', function (e) {
            if (window.innerWidth <= 992 && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
    }

    // Sticky navbar effect on scroll
    const navbar = document.querySelector('.sticky-navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.style.padding = '0.5rem 1rem';
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 10px 30px rgba(11, 78, 162, 0.08)';
            } else {
                navbar.style.padding = '0.8rem 1rem';
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.02)';
            }
        });
    }

    // Avatar preview for profile edit page
    const avatarInput = document.getElementById('avatar-input');
    const avatarPreview = document.getElementById('avatar-preview');
    if (avatarInput && avatarPreview) {
        avatarInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarPreview.setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    }

    // Theme toggle (Dark Mode)
    const themeToggle = document.getElementById('theme-toggle');
    const themeToggleIcon = document.getElementById('theme-toggle-icon');

    // Check localStorage theme state immediately on page load
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'dark') {
        document.body.classList.add('dark-mode');
        if (themeToggleIcon) {
            themeToggleIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
        }
    }

    if (themeToggle && themeToggleIcon) {
        themeToggle.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
            
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
                themeToggleIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
            } else {
                localStorage.setItem('theme', 'light');
                themeToggleIcon.classList.replace('bi-sun-fill', 'bi-moon-fill');
            }
        });
    }
});
