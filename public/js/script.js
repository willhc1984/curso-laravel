//Script de mascara para campos preço

//Receber o seletor do campo preço
let inputPrice = document.getElementById('price');

//Aguardar o usuario digitar no campo
inputPrice.addEventListener('input', function(){

    //Obter o valor atual removendo qualquer caracter
    let valuePrice = this.value.replace(/[^\d]/g, '');

    //Adcionar os separadores de milhares
    var formatedPrice = (valuePrice.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + valuePrice.slice(-2);

    //Adicionar virgula a ate dois digitos se houver centavos
    if(formatedPrice.length > 2){
        formatedPrice = formatedPrice.slice(0, -2) + ',' + formatedPrice.slice(-2);
    }

    //Atualizar o valor no campo
    this.value = formatedPrice;

})