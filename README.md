# SimpleTagBootstrap

## A Bootstrap v5 Components Adapter for PHP

### What is SimpleTagBootstrap?
SimpleTagBootstrap is an object-oriented Bootstrap v5 components adapter written with [SimpleTag](https://github.com/adnzaki/simple-tag) library. Its goal is to simplify usage of Bootstrap components when working with a lot of PHP codes. Just like <strong>SimpleTag</strong> that aims to make HTML programmable, this library aims to make Bootstrap usage easier and of course; programmable via PHP.

### Installation
#### Composer
We recommend you to install SimpleTagBootstrap via [Composer](https://getcomposer.org/), since it will ease you to update it. Other than that, if you have other libraries installed from composer, you will get advantages of autoloading that will not require you to include "wrapper.php" each time. Just type the command below to install:
```
composer require adnzaki/simple-tag-bootstrap
```
Or if you have a `composer.json` file, simply add requirement pointed to the package name:
```
"require": {
    "adnzaki/simple-tag-bootstrap": "^0.1.0",
}
```
If you consider to get the latest source code, change "^0.1.0" into "dev-master", so it will download unreleased version of SimpleTagBootstrap.<br>
Then simply run `composer update` to install it.
#### Manual Download
You can manually download SimpleTagBootstrap directly from this repository. Just point to "Code" menu and choose "Download ZIP" to download the latest source code or go to "Release" menu and find the latest stable version.

### Ability
With SimpleTagBootstrap, we try to cover everything that Bootstrap components can do. For example in `<input>` element, Bootstrap has many options needed by developer to build an input form, so we have adopted those options to be used in SimpleTagBootstrap as well.

### How it works?
SimpleTagBootstrap comes with a lot of classes contain most of Bootstrap components. It is SimpleTag-based library that simplifies Bootstrap components writing by converting them into SimpleTag format. So, you only have to call any component with the classes that has been provided.

### Should I learn SimpleTag as well?
No, you have two options to pass your HTML elements into SimpleTagBootstrap class methods; with SimpleTag format or separate HTML file. But in certain cases, you need some basic usage of SimpleTag, it allows you to fully write your Bootstrap components without writing any HTML code.

### Where is the example?
Just open up `components` directory in this repository, and dive into each component that has been provided. There you will see an example for each component.

### The "Wrapper" file
The important thing to activate SimpleTagBootstrap is calling the wrapper file on top of your PHP codes. Check out `index.php` file to see the complete code sample to start using SimpleTagBootstrap. Check out our SimpleTagBootstrap directory structure below before diving into the source code:
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

### Bootstrap Files
We have included necessary Bootstrap files to ease you when working with SimpleTagBootstrap. With this way, you have some advantages as follow:
- Keep your Bootstrap up-to-date
- Keep Bootstrap version the same as in SimpleTagBootstrap.
- No need to download Bootstrap outside
- Just a single step needed to update a whole SimpleTagBootstrap

### Initiator Function
Every component in SimpleTagBootstrap defined in a class, but you do not have to initiate an object for each of them since we have "Initiator Function" that have done it for you. This function has the same name as its component class, for example `Accordion` class has initiator function called `accordion()`. So you can call the methods in that class directly without initiate an object first, like `accordion()->open()` to create accordion open tag. Those functions located on their class file and have been wrapped together in Wrapper file.

### The `BaseClass` class
SimpleTagBootstrap has a class called `BaseClass` that shares commonly-used features on HTML element. It has the following methods to be used on all components:
- `BaseClass::slot(string|array $slots)` to insert slot into component, it can be a string or array and should be in SimpleTag's accepted format.
- `BaseClass::addClass(string|array $class)` to add a custom class to component
- `BaseClass::id(string $id)` to create an ID to component
- `BaseClass::attr(array $attributes = [])` to store additional attributes for your element. Additional attributes mostly used to define event handling, but in other case it can be used for any advanced HTML options like Vue's custom HTML attributes, eg. `v-model`, `v-bind`, `v-if`, etc. We also use this method internally to build up SimpleTagBootstrap components.<br>
Check out each of component's example to see how to use them.
- `BaseClass::preventBrowserOutput()` to prevent SimpleTag `render()` function from directly send the output to the browser. By running this method, you have to use `echo` statement when calling component's render method.
- `BaseClass::position(string $positionStart, string $positionEnd, string $translate = '')` to set position of an element. Click [here](https://getbootstrap.com/docs/5.1/utilities/position/) for more detail explanation.
- `BaseClass::positionType(string $value)` to set position value like static, relative, absolute, fixed, and sticky.