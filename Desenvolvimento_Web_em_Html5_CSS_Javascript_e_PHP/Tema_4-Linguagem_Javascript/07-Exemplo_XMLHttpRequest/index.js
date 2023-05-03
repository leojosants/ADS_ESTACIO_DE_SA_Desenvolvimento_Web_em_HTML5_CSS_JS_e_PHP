// 
function alterar() {

    // Configurando objeto
    const request = new XMLHttpRequest();

    // Abrindo a conexão
    request.open(
        'GET',
        'http://localhost:4200/assets/teste.txt'
    );

    // Como será a reposta
    request.onload = () => { console.log(request.responseText); };

    // Enviando a requisção
    request.send();
};