// 
const numbers = [65, 44, 12, 4];
console.log('numbers = ', numbers);

// Map - Aplica a multiplicação a cada elemento
const newArr = numbers.map((x) => x * 5);
console.log('newArr = ', newArr);

// Reduce - Aplica soma de todos os elementos
const soma = numbers.reduce((x, y) => x + y);
console.log('soma = ', soma);