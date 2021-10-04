// LANGUAGE: Javascript
// ENV: Node.js
// AUTHOR: milanmdev

function getRandom(array, amount) {
  var result = new Array(amount),
    len = array.length,
    taken = new Array(len);
  if (amount > len) amount = len;
  while (amount--) {
    var x = Math.floor(Math.random() * len);
    result[amount] = array[x in taken ? taken[x] : x];
    taken[x] = --len in taken ? taken[len] : len;
  }
  return result;
}

// Testing
const array = [{ id: 1 }, { id: 2 }, { id: 3 }, { id: 4 }, { id: 5 }];
const amount = 2;

let random = getRandom(array, amount);
console.log(random);
