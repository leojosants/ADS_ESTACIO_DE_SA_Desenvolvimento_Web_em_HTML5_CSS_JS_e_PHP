// Criando Vetor
var alunos = [];

// Atribuindo elementos
alunos = ['Alex', 'Anna', 'João'];

// Adicinando elemento
alunos.push('Helena', 'Maria');

// Adicionar ou substituir elementos
alunos.splice(3, 0, 'Leonardo');

// Adicionar ou substituir elementos
alunos.splice(1, 1, 'Leo');

// Capturando elementos
let removed = alunos.splice(2, 2, 'Dalva', 'Jenny');
console.log(removed);

// Tamanho do vetor
console.log(alunos.length);

// Eleimina o elemento porém mantém o índice
delete alunos[0];

// Elimina o ultimo elemento
alunos.pop();

// Remove um elemento do início do array
alunos.shift();

// Remove tod os elemento acima do tamanho indicado
alunos.length = 2;

// Exibindo elemento
console.log(alunos);