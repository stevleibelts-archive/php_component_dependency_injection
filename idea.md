# DependencyInjection:

A file to keep track of the idea.

# Example Config:

My\Class:
    alias: foo
    isShared: false
    specification:
        constructor:
            'foo'
            'My\Other\Class'
        methodCalls:
            'setBar':
                'foo'
            'setUserAndScope':
                'My\User'
                'Two'

# Requirements

* Config based
* Can have an alias (how can alias put in namespaces? With dots?)
* Can be shared (instance pooling) or not (new creted after each call)
* Each service has a factory, even invokeables
* Two factory that is using a specification object
* Each factory gets the specification object and the servicelocator injected or just the config (scoped to the object?)
* Servicelocator has to take care of create a specification object from the config

# Hint

Parameter is what you define in a method.
Argument is the value you add when you call the method.