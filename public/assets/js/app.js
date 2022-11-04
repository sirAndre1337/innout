(() => {
     const menuToggle = document.querySelector('.menu-toggle');
     menuToggle.onclick = () => {
     document.querySelector('body').classList.toggle('hide-sidebar')
     }
})();

(() => {
          const activeClock = document.querySelector('[active-clock]');
          if(!activeClock) return;
     
          const addOneSecond = (hours,minutes,seconds) => {
               // pega a hora passada e add 1 secondo
               const d = new Date();
               d.setHours(parseInt(hours));
               d.setMinutes(parseInt(minutes));
               d.setSeconds(parseInt(seconds) + 1);
     
               // transforma a hora (objeto date) para string;
               const h = `${d.getHours()}`.padStart(2,0);
               const m = `${d.getMinutes()}`.padStart(2,0);
               const s = `${d.getSeconds()}`.padStart(2,0);
     
               return `${h}:${m}:${s}`;
          }
     
          setInterval(() => {
               const parts = activeClock.innerHTML.split(':');
               activeClock.innerHTML = addOneSecond(...parts);
          }, 1000);
})();