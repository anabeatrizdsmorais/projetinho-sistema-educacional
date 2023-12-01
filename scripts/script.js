document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)
        
        // Validate that all variables exist
        if(toggle && nav && bodypd && headerpd){
            toggle.addEventListener('click', ()=>{
                // show navbar
                nav.classList.toggle('show')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
        if(linkColor){
            linkColor.forEach(l=> l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
});

function backPage() {
    window.history.back();
}


document.getElementById('form_user').addEventListener('submit', function(e) {
  
    var senha = document.getElementById('senha').value;
    var confirmarSenha = document.getElementById('confirmar_senha').value;
    
    if(senha && (confirmarSenha === undefined || confirmarSenha === '' || confirmarSenha !== senha)) {
        document.querySelector('.info-confirmar-senha').removeAttribute('hidden');
        e.preventDefault();
        return false;
    } else {
        document.querySelector('.info-confirmar-senha').setAttribute('hidden', true);
        return true;
    }

});

// Função para pesquisar um dado em uma tabela
function searchField () {
    
    var input = document.getElementById('buscar');
    var filter = input.value.toUpperCase();

    var tableBody = document.querySelector('tbody');

    var rows = tableBody.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.getElementsByTagName('td');

        var rowText = '';
        for (var j = 0; j < cells.length; j++) {
            rowText += cells[j].textContent || cells[j].innerText;
        }

        rowText = rowText.toUpperCase();

        if (rowText.indexOf(filter) > -1) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}