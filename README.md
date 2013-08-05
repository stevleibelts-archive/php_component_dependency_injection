# php_component_dependency_injection

php component dependency injection by using a specification container

# Why?

* Understand dependency injection by writing own di container
* Create di container with *dump*/*cache* method that generates pure php code by reading configuration
* Implement a "auto discovery" mode that simple instantiates all dependent classes and injects them
* Create console app that analyze given class and returns a basic configuration

# Influenced By 

(alexanderduring)[https://github.com/alexanderduring]

# Notes

## Builders and Factories

Factories are *stupid* creation classes where you are able to put in some parameters and simple get a new object. The effort of creating an object is quite low.

Builders are more like artists, you have to set up a lot of parameters to define your created objects. The effort of creating an object is higher.

## Instantiation Strategies

* Constructor
* Setter methods with type hints
* AwareInterfaces

## Configuration

A configuration describes:

* Relationships between interfaces ans implementor
* Dependencies between different services by references

## Workflow for a builder

* Builder gets configuration
* Instantiates DI container
* Resolve dependencies
* Create implementation class

## DI Container

* Simple class
* Creates services by lazy loading (when needed)
* Uses instance pooling
* Uses definitions/declarations for creating classes
* Resolves dependency by using definition based strategies

# Links

* [Beginners guide to dependency injection](http://www.theserverside.com/news/1321158/A-beginners-guide-to-Dependency-Injection)
* [Inversion Of Controll](http://martinfowler.com/articles/injection.html)
