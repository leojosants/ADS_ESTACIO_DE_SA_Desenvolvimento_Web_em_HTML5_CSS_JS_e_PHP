// 
const a = [12, 54, 23];
console.log('a = ', a);

const b = [99, 30, 45];
console.log('b = ', b);

let c = a.concat(b);
console.log('c = ', c);

c.sort();
console.log('c.sort = ', c);

c.reverse();
console.log('c.reverse = ', c);

c = c.filter((x) => (x > 20 && x < 90));
console.log('c.filter = ', c);

console.log('c.join = ', c.join('::'));