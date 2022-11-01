(() => {
     const menuToggle = document.querySelector('.menu-toggle');
     menuToggle.onclick = () => {
     document.querySelector('body').classList.toggle('hide-sidebar')
     }
})()