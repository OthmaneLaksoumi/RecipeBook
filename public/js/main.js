let menu_list = document.getElementById('menu-list');

let burgger_menu = document.getElementById('burgger');

burgger_menu.addEventListener('click', function () {
    if(menu_list.className !== 'hidden') {
        menu_list.className = 'hidden';
    } else {
        menu_list.className = '';
    }
});