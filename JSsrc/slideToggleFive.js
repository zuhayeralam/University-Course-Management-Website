let fivecontainer = document.getElementById('toggleMeFive');
let buttonfiveinitialtext = document.getElementById('toggleButtonFive').textContent;
document.getElementById('toggleButtonFive').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('toggleButtonFive').textContent ="Close";//on click style change
    document.getElementById('toggleButtonFive').style.backgroundColor = "var(--dark-secondary-color)";//on click style change
    if (!fivecontainer.classList.contains('active')) {
        fivecontainer.classList.add('active');
        fivecontainer.style.height = 'auto';

       let height = fivecontainer.clientHeight + "px";
       fivecontainer.style.height = '0px';

        setTimeout(function () {
            fivecontainer.style.height = height;
        }, 100);
    } else {
      document.getElementById('toggleButtonFive').textContent =buttonfiveinitialtext;//on click style change
      document.getElementById('toggleButtonFive').style.backgroundColor = "var(--primary-color)";//on click style change
        fivecontainer.style.height = '0px';

        fivecontainer.addEventListener('transitionend', function () {
            fivecontainer.classList.remove('active');
        }, {
            once: true
        });
    }
});