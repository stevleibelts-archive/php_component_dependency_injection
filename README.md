# php_component_dependency_injection

php component dependency injection by using a specification container

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
* Dependencies between different services

## Workflow for a builder

* Builder gets configuration
* Instantiates DI container
* Resolve dependencies
* Create implementation class

# Links

* [Beginners guide to dependency injection](http://www.theserverside.com/news/1321158/A-beginners-guide-to-Dependency-Injection)
