let fourcontainer = document.getElementById('toggleMeFour');
let buttonfourinitialtext = document.getElementById('toggleButtonFour').textContent;
document.getElementById('toggleButtonFour').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('toggleButtonFour').textContent ="Close";//on click style change
    document.getElementById('toggleButtonFour').style.backgroundColor = "var(--dark-secondary-color)";//on click style change
    if (!fourcontainer.classList.contains('active')) {
        fourcontainer.classList.add('active');
        fourcontainer.style.height = 'auto';

       let height = fourcontainer.clientHeight + "px";
       fourcontainer.style.height = '0px';

        setTimeout(function () {
            fourcontainer.style.height = height;
        }, 100);
    } else {
      document.getElementById('toggleButtonFour').textContent =buttonfourinitialtext;//on click style change
      document.getElementById('toggleButtonFour').style.backgroundColor = "var(--primary-color)";//on click style change
        fourcontainer.style.height = '0px';

        fourcontainer.addEventListener('transitionend', function () {
            fourcontainer.classList.remove('active');
        }, {
            once: true
        });
    }
});