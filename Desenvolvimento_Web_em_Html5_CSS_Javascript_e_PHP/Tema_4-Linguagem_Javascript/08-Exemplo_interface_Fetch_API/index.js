// 
function alterar() {
    getText('http://localhost:4200/assets/teste.txt');
};

async function getText(endereco) {
    let x = await fetch(endereco);
    let y = await x.text();
    console.log(y);
};