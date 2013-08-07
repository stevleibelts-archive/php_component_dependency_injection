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
* AwareInterfaces or InjectInterfaces

### InjectInterfaces

InjectInterfaces provides one method:

* injectClass

### AwareInterfaces

AwareInterfaces provides three methods:

* setClass
* getClass
* hasClass

## Configuration

A configuration describes:

* Relationships between interfaces and implementor
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

## Managers

* Can be injected if class implements Serviceable or Manageable interface
* If injected, the class simple calls manager->getFoo(), manager->getBar to setup itself by using the manager

# Links

* [Beginners guide to dependency injection](http://www.theserverside.com/news/1321158/A-beginners-guide-to-Dependency-Injection)
* [Inversion Of Controll](http://martinfowler.com/articles/injection.html)
* [DIP In The Wild](http://martinfowler.com/articles/dipInTheWild.html)
* [List Of Development Philosophies](http://en.wikipedia.org/wiki/List_of_software_development_philosophies)

# Notes

    DI is about how one object acquires a dependency. When a dependency is provided externally, then the system is using DI. IoC is about who initiates the call. If your code initiates a call, it is not IoC, if the container/system/library calls back into code that you provided it, is it IoC.

    DIP, on the other hand, is about the level of the abstraction in the messages sent from your code to the thing it is calling. To be sure, using DI or IoC with DIP tends to be more expressive, powerful and domain-aligned, but they are about different dimensions, or forces, in an overall problem. DI is about wiring, IoC is about direction, and DIP is about shape.

## Dependency Injection

Is about how one object knows about another, dependent object.

## Inversion Of Control

Inversion of control is about who initiates messages. Does your code call into a framework, or does it plug something into a framework, and then the framework calls back?

## Dependency Inversion Principle

Dependence Inversion is about the shape of the object upon which the code depends. Does your application really needs to know that the used storage is a database with sql support or does your application only needs a kind of storage with put and get methods?

* Taking an unwieldy API with too many methods and taming it.
* Removing a mismatch between the abstraction level of a library and the domain
* Rejecting an external constraint that dictates a particular style of communication
* Taking control of time itself
