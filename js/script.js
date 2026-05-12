const handleOpenSidebar = (e) => {
    const sidebar = document.getElementById('sidebar');
    const wraper = document.querySelector('.wrapper');
    const div = document.createElement('div');
    div.id = 'overlay';
    div.style.position = 'fixed';
    div.style.inset = '0';
    div.style.zIndex = '20';
    div.style.background = 'rgba(0, 0, 0, 0.5)';
    if(sidebar.classList.contains('active-aside')) {
        sidebar.classList.remove('active-aside');
        wraper.removeChild(div);
    } else {
        sidebar.classList.add('active-aside');
        wraper.appendChild(div);
    }
}

window.addEventListener('click', (e) => {
    const sidebar = document.getElementById('sidebar');
    const btnSidebar = document.getElementById('btn-sidebar');
    const overlay = document.getElementById('overlay');
    const trigerBtn = btnSidebar.querySelector('i');
    if(e.target !== sidebar && !sidebar.contains(e.target) && trigerBtn !== e.target && overlay) {
        sidebar.classList.remove('active-aside');
        overlay.remove();
    }
});