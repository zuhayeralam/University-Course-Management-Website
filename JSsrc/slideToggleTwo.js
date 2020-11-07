let twocontainer = document.getElementById('toggleMeTwo');
let buttontwoinitialtext = document.getElementById('toggleButtonTwo').textContent;
document.getElementById('toggleButtonTwo').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('toggleButtonTwo').textContent ="Close";//on click style change
    document.getElementById('toggleButtonTwo').style.backgroundColor = "var(--dark-secondary-color)";//on click style change
    if (!twocontainer.classList.contains('active')) {
        twocontainer.classList.add('active');
        twocontainer.style.height = 'auto';

       let height = twocontainer.clientHeight + "px";
       twocontainer.style.height = '0px';

        setTimeout(function () {
            twocontainer.style.height = height;
        }, 100);
    } else {
      document.getElementById('toggleButtonTwo').textContent = buttontwoinitialtext;//on click style change
      document.getElementById('toggleButtonTwo').style.backgroundColor = "var(--primary-color)";//on click style change
      twocontainer.style.height = '0px';

        twocontainer.addEventListener('transitionend', function () {
            twocontainer.classList.remove('active');
        }, {
            once: true
        });
    }
});