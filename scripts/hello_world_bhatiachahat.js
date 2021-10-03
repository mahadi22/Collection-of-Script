// LANGUAGE: Javascript
// ENV: Node.js
// AUTHOR: Chahat Bhatia
// GITHUB: https://github.com/bhatiachahat
console.log("Hello World!")

function greet(name) {
  return "Happy Hacking " + name + "!";
}

// Returns "Good morning Adam!"
greet("Everyone");
const greet1 = function(name, timeOfDay){
  return "Happy Hacking "+ timeOfDay + " "+ name + "!";
};
greet1("Everyone","cheers");
