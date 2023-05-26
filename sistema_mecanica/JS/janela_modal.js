
/*FUNÇÃO PROFESSOR */
function abrirModal(carregarModal) {
 
        let modal = document.getElementById(carregarModal);

        modal.style.display = 'block'; 

}


function fecharModal(fecharModal){

    let modal = document.getElementById(fecharModal);

    modal.style.display = 'none';
    
}

function abrir(id_registro){
    let dc = document.querySelector('.descc[data-modal-id="'+ id_registro +'"]')
    dc.style.display = 'block';
    
}

function fechar(id_fechar){
    
    let modal = document.querySelector('.descc[data-modal-id="'+ id_fechar +'"]')

    modal.style.display = 'none';
}