basecom/WrapperBundle
=====================

This bundle provides some shortcuts to default services/methods of a container:
* getDoctrine(...)
* getEntityManager(...)
* getContainer()
* setContainer(...)
* get(...)

--------

To use the wrapper for a default, container wearing class, you just have to extend this clas from our wrapper:

``` php
class MyNewContainerWearingClass extends \basecom\WrapperBundle\ContainerAware\ContainerAware
{
	// cool stuff here
}
```

The same applies to a command:

``` php
class MyNewCommand extends \basecom\WrapperBundle\ContainerAware\ContainerAwareCommand
{
	// cool stuff here
}
```
