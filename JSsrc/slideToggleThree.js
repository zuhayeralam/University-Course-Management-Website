let threecontainer = document.getElementById('toggleMeThree');
let buttonthreeinitialtext = document.getElementById('toggleButtonThree').textContent;
document.getElementById('toggleButtonThree').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('toggleButtonThree').textContent ="Close";//on click style change
    document.getElementById('toggleButtonThree').style.backgroundColor = "var(--dark-secondary-color)";//on click style change
    if (!threecontainer.classList.contains('active')) {
        threecontainer.classList.add('active');
        threecontainer.style.height = 'auto';

       let height = threecontainer.clientHeight + "px";
       threecontainer.style.height = '0px';

        setTimeout(function () {
            threecontainer.style.height = height;
        }, 100);
    } else {
      document.getElementById('toggleButtonThree').textContent =buttonthreeinitialtext;//on click style change
      document.getElementById('toggleButtonThree').style.backgroundColor = "var(--primary-color)";//on click style change
        threecontainer.style.height = '0px';

        threecontainer.addEventListener('transitionend', function () {
            threecontainer.classList.remove('active');
        }, {
            once: true
        });
    }
});