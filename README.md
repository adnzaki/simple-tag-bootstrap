# SimpleTagBootstrap

## A PHP Bootstrap v5 Components.

### What is SimpleTagBootstrap?
SimpleTagBootstrap is an object-oriented Bootstrap v5 components wrapper written with [SimpleTag](https://github.com/adnzaki/simple-tag) library. Its goal is to simplify usage of Bootstrap components when working with a lot of PHP codes. Just like <strong>SimpleTag</strong> that aims to make HTML programmable, this library aims to make Bootstrap usage easier and of course; programmable via PHP.

### How it works?
SimpleTagBootstrap comes with a lot of classes contain most of Bootstrap components. It is SimpleTag-based library that simplifies Bootstrap components writing by converting them into SimpleTag format. So, you only have to call any component with the classes that has been provided.

### Should I learn SimpleTag as well?
No, you have two options to pass your HTML elements into SimpleTagBootstrap class methods; with SimpleTag format or separate HTML file. But it will be a good practice if you learn some basic usage of SimpleTag, while it allows you to fully write your Bootstrap components without writing any HTML code.

### Where is the example?
Just open up `components` directory in this repository, and dive into each component that has been provided. There you will see an example for each component.

### The "Wrapper" file
The important thing to activate SimpleTagBootstrap is calling the wrapper file on top of your PHP codes. Check out `index.php` file to see the complete code sample to start using SimpleTagBootstrap. Remember that we do not include Bootstrap files in this repository, so you have to download the same Bootstrap version as in SimpleTagBootstrap. But you can still see the complete directory structure below:
```
\bootstrap
    \css
    \icons
    \js
\components
    .... the components folder 
\custom-slots
\simple-tag
    .... SimpleTag library located here
\test
wrapper.php
index.php
.... and so on.
```

### Initiator Function
Every component in SimpleTagBootstrap defined in a class, but you do not have to initiate an object for each of them since we have "Initiator Function" that have done it for you. This function has the same name as its component class, for example `Accordion` class has initiator function called `accordion()`. So you can call the methods in that class directly without initiate an object first, like `accordion()->open()` to create accordion open tag. Those functions located on their class file and have been wrapped together in Wrapper file.

### The `BaseClass` class
SimpleTagBootstrap has a class called `BaseClass` that shares commonly-used features on HTML element. It has the following methods to be used on all components:
- `BaseClass::slot(string|array $slots)` to insert slot into component, it can be a string or array and should be in SimpleTag's accepted format.
- `BaseClass::addClass(string|array $class)` to add a custom class to component
- `BaseClass::id(string $id)` to create an ID to component
- `BaseClass::attrs(array $attributes = [])` to store additional attributes for your element. Additional attributes mostly used to define event handling, but in other case it can be used for any advanced HTML options like Vue's custom HTML attributes, eg. `v-model`, `v-bind`, `v-if`, etc.<br>
Check out each of component's example to see how to use them.
- `BaseClass::preventBrowserOutput()` to prevent SimpleTag `render()` function from directly send the output to the browser. By running this method, you have to use `echo` statement when calling component's render method.
- `BaseClass::position(string $positionStart, string $positionEnd, string $translate = '')` to set position of an element. Click [here](https://getbootstrap.com/docs/5.1/utilities/position/) for more detail explanation.
- `BaseClass::positionType(string $value)` to set position value like static, relative, absolute, fixed, and sticky.