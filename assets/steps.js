/*
let isVoted = localStorage.getItem("voto");

if(isVoted) {

    // window.location.replace("https://localhost:8000/consulta/resultados");
    const  alertContainer = document.getElementById("alertContainer");
    const parentDiv = document.getElementById("alertContainer").parentNode;

/!*    <div className="alert alert-warning" role="alert">
        A simple warning alert—check it out!
    </div>*!/

    let alert = document.createElement("div");
    alert.setAttribute('class', 'alert alert-warning');
    alert.setAttribute('role', 'alert');
    let alertContent = document.createTextNode('Ya está registrado el voto en la encuesta.');
    alert.appendChild(alertContent);

    parentDiv.insertBefore(alert, alertContainer);
}
else {
    localStorage.setItem('voto', 'true');
}
*/

let currentTab = 0;
document.getElementsByClassName("tab")[0].style.display = "block";
let input = document.getElementsByClassName("js-input");

let btnNext = document.getElementById('btn-next');
btnNext.addEventListener("click", nextTab);

for(let i = 0; i < input.length; i++) {

    input[i].addEventListener("click", event => {

        let btn = input[i].parentElement.getElementsByClassName('js-button')[0];

        let tab = input[i].closest(".tab");

      //  if(btn.classList.contains("btn-outline-secondary")){
            if(btn.innerHTML === 'Sí'){
                btn.classList.replace('btn-outline-secondary', 'btn-success');

                // ID must be unique
                // ElementsByClass return Collection
                let btnNo = tab.getElementsByClassName("js-btn-no");
                if(btnNo[0].classList.contains("btn-danger")){
                    btnNo[0].classList.replace('btn-danger', 'btn-outline-secondary');
                    btnNo[0].disabled = true;
                }
            }
            else if(btn.innerHTML === 'No'){
                btn.classList.replace('btn-outline-secondary', 'btn-danger');

                let btnYes = tab.getElementsByClassName("js-btn-si");
                if(btnYes[0].classList.contains("btn-success")){
                    btnYes[0].classList.replace('btn-success', 'btn-outline-secondary');
                    btnYes[0].disabled = true;
                }
            }

            btn.disabled = false;
            document.getElementById('btn-next').classList.remove('d-none');
      //  }
    });
}

function nextTab() {

    let x = document.getElementsByClassName("tab");
    let progress = "";

    currentTab = currentTab + 1;

    if(currentTab > 0) {
        // last tab
        if(currentTab === (x.length - 1)) {
            btnNext.innerHTML = "Submit";
        }

        if(currentTab === x.length) {
            document.getElementById("consulta-form").submit();
        }

        x[(currentTab - 1)].style.display = "none";
        x[currentTab].style.display = "block";
        document.getElementById('btn-next').classList.add('d-none');
    }

    if(currentTab > 0 && currentTab < (x.length - 1)) {
        x[currentTab].style.display =  "block";
    }

    progress = ((currentTab + 1)/4)*100;
    document.getElementById('progress-bar').style.width = progress.toString().concat("%");
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    let i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}
