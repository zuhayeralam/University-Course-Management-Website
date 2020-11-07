let onecontainer = document.getElementById('toggleMeOne');
let buttononeinitialtext = document.getElementById('toggleButtonOne').textContent;
document.getElementById('toggleButtonOne').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('toggleButtonOne').textContent ="Close";//on click style change
    document.getElementById('toggleButtonOne').style.backgroundColor = "var(--dark-secondary-color)";//on click style change
    if (!onecontainer.classList.contains('active')) {
        onecontainer.classList.add('active');
        onecontainer.style.height = 'auto';

       let height = onecontainer.clientHeight + "px";
       onecontainer.style.height = '0px';

        setTimeout(function () {
            onecontainer.style.height = height;
        }, 100);
    } else {
      document.getElementById('toggleButtonOne').textContent =buttononeinitialtext;//on click style change
      document.getElementById('toggleButtonOne').style.backgroundColor = "var(--primary-color)";//on click style change
        onecontainer.style.height = '0px';

        onecontainer.addEventListener('transitionend', function () {
            onecontainer.classList.remove('active');
        }, {
            once: true
        });
    }
});