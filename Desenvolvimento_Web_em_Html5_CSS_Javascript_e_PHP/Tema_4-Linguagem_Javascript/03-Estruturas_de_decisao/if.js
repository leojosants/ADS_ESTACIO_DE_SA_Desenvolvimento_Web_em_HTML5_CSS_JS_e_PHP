// 
console.log('Estrutura de decisão if de maneira simples, contendo apenas uma única condição:')

var a = 10;
var b = 3;

console.log("if com uma única condição:");
if (a > b) {
    console.log("a é maior que b");
}
if (a == b) {
    console.log("a é igual a b");
}
if (a < b) {
    console.log("a é menor que b");
}
if (b < a) {
    console.log("b é menor que a");
}

//

console.log('\nEstrutura de decisão if é implementada com duas condições, além dos operadores lógicos AND ( && ) e OR ( || ):');
var c = 5;
var d = -1;

console.log("if com duas condições, onde ambas precisam ser verdadeiras:");
if (c > d && d > 0) {
    console.log("c é maior que d E d é um número positivo");
}
if (c > d && d <= 0) {
    console.log("c é maior que d E d não é um número positivo");
}
console.log("if com duas condições, onde pelo menos uma precisa ser verdadeira:");
if (c < d || d > 0) {
    console.log("c é menor que d OU d é um número positivo");
}
if (c < d || d <= 0) {
    console.log("c é menor que d OU d não é um número positivo");
}

//

console.log('\nEstrutura if sendo usada de uma maneira mais elaborada, com mais de duas condições, combinação dos operadores && e II, assim como o uso do operador lógico de negação NOT ( ! ):');

var c = 5;
var d = -1;
var e = false; // valores possíveis -> True, False

console.log("if com mais de duas condições e combinação de && e ||:");
if ((c > d && d > 0) || (c > d && d <= 0)) {
    console.log("c é maior que d E d é um número positivo");
    console.log("OU");
    console.log("c é maior que d E d não é um número positivo");
}
console.log("if com condição não verdadeira:");
if (!e) {
    console.log("e tem valor false");
}