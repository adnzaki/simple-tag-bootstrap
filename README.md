# SimpleTagBootstrap

## A PHP Functional Bootstrap v5 Components written with SimpleTag library.

### What is SimpleTagBootstrap?
SimpleTagBootstrap is a functional Bootstrap v5 components wrapper written with [SimpleTag](https://github.com/adnzaki/simple-tag) library. Its goal is to simplify usage of Bootstrap components while working with a lot of PHP codes. Just like <strong>SimpleTag</strong> that aims to make HTML programmable, this library aims to make Bootstrap usage easier and of course; programmable via PHP.

### How it works?
SimpleTagBootstrap comes with a lot of functions contain most of Bootstrap components. It is SimpleTag-based function that simplifies Bootstrap components writing by converting them into SimpleTag format. So, you only have to call any component with the function that has been provided.

### Should I learn SimpleTag as well?
No, you have two options to pass your HTML elements into SimpleTagBootstrap functions; with SimpleTag format or separate HTML file. But it will be a good practice if you learn some basic usage of SimpleTag, while it allows you to fully write your Bootstrap components without writing any HTML code.

### Where is the example?
Just open up `components` directory in this repository, and dive into each component that has been provided. There you will see an example for each component.

### The "Wrapper" file
The important thing to activate SimpleTagBootstrap is calling the wrapper file on top of your PHP codes. Check out `index.php` file to see the complete code sample to start using SimpleTagBootstrap. Remember that we do not include Bootstrap files in this repository, so you have to download the same Bootstrap version as in SimpleTagBootstrap.