let form = document.querySelector('#footer > form');
let einput = document.querySelector('#pseudo');
let etextarea = document.querySelector('#commentaire');

form.addEventListener('submit', function(event){
    event.preventDefault();

    clearErrors();
    let data = new FormData();
    data.append('pseudo', einput.value);
    data.append('commentaire',etextarea.value);
    data.append('avis', '1');

    var xhr = new XMLHttpRequest();
    xhr.responseType = 'json';
    xhr.open("POST", "/avis", true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {

            let response = xhr.response;
            if(response['message']) {
                afficheMessage(response['message']);
                clearData();
            }
            if(response['errors']) afficheErrors(response['errors'])
        }
    };
    xhr.send(data);
});

function afficheMessage(data)
{
    let footer = document.querySelector('footer');
    let div = document.createElement('div');
    div.className = "text-center alert alert-success alert-dismissible fade show";
    div.setAttribute('role', 'alert');
    div.innerHTML=`<strong> Avis : ${data} </strong>
        votre avis à bien était envoyer
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>`;
    footer.prepend(div);
}
function afficheErrors(errors)
{
    for(let champs in errors) {
        if(errors.hasOwnProperty(champs)) {
            let lstErreur = errors[champs].join(" </br> ");
            let element = document.getElementById(champs);
            element.classList.add('is-invalid');

            let div = document.createElement('div');
            div.setAttribute('errors','error');
            div.className ='invalid-feedback text-warning ps-2';
            div.innerHTML= lstErreur;
            element.parentNode.append(div);

        }
    }
}
function clearErrors()
{
    einput.classList.remove('is-invalid');
    etextarea.classList.remove('is-invalid');
    form.querySelectorAll('[errors]').forEach((element)=>{
        element.remove();
    });
}
function clearData()
{
    einput.value = '';
    etextarea.value = '';
}