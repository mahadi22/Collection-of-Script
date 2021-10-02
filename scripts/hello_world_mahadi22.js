// LANGUAGE: Javascript
// ENV: Node.js
// AUTHOR: mahadi22

var Person = function(name,location){
  this.name = (name) ? name : "Anyonymous";
  this.place = (location) ? location : "Indonesia";
}

Person.prototype.greeting = function(name){
  name = (name) ? name : this.name;
  var str = "Hello, World! by " + name;
  console.log(str);
  return str;
}

// Javascript ES6
class Person {
  constructor (name='Anyonymous', location='Indonesia') {
    this.name = name;
    this.place = location;
  }
  greeting (name=this.name) {
    let str = "Hello, World! by " + name;
    console.log(str);
    return str;
  }
}

var myself = new Person('Mahadi22','Jakarta');
myself.greeting();
