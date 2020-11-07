let container = document.getElementById('toggleMe');

document.getElementById('toggleButton').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('toggleButton').style.color ="var(--dark-secondary-color)";//on click style change
    if (!container.classList.contains('active')) {
        container.classList.add('active');
        container.style.height = 'auto';

       let height = container.clientHeight + "px";
       container.style.height = '0px';

        setTimeout(function () {
            container.style.height = height;
        }, 100);
    } else {
      document.getElementById('toggleButton').style.color ="var(--secondary-color)";//on click style change
        container.style.height = '0px';

        container.addEventListener('transitionend', function () {
            container.classList.remove('active');
        }, {
            once: true
        });
    }
});