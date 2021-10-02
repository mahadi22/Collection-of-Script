// LANGUAGE: Javascript
// ENV: Node.js
// AUTHOR: HackMEAny

var Person = function (name, location) {
  this.name = name ? name : "Anyonymous";
  this.place = location ? location : "Indonesia";
};

Person.prototype.greeting = function (name) {
  name = name ? name : this.name;
  var str = "Hello, World! by " + name;
  console.log(str);
  return str;
};

var myself = new Person("HackMEAny");
myself.greeting();
