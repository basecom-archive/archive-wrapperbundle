<?php

namespace basecom\WrapperBundle\ContainerAware;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use \Symfony\Component\DependencyInjection\ContainerInterface;

abstract class ContainerAware extends \Symfony\Component\DependencyInjection\ContainerAware
{
	/**
	 * Class constructor
	 * 
	 * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
	 */
	public function __construct(ContainerInterface $container = null)
	{
		$this->setContainer($container);
	}

	/**
	 * Returns the container
	 * 
	 * @return ContainerInterface
	 */
	public function getContainer()
	{
		return $this->container;
	}

	/**
	 * Container->get() shortcut
	 * 
	 * @param string $id
	 * @param mixed $invalidBehavior	optional
	 * @return mixed
	 */
	public function get($id, $invalidBehavior = null)
	{
		if(null === $invalidBehavior) {
			$invalidBehavior = ContainerInterface::EXCEPTION_ON_INVALID_REFERENCE;
		}
		return $this->getContainer()->get($id, $invalidBehavior);
	}

	/**
	 * Returns doctrine
	 * 
	 * @return \Doctrine\Bundle\DoctrineBundle\Registry
	 */
	protected function getDoctrine()
	{
		return $this->get('doctrine');
	}

    /**
     * Returns the entity manager
     *
     * @param string|null $name
     * @return ObjectManager
     */
    protected function getManager($name = null)
    {
        return $this->getDoctrine()->getManager($name);
    }

    /**
     * @param string|null $name
     * @return EntityManager
     */
    protected function getEntityManager($name = null)
    {
        return $this->getManager($name);
    }

	/**
	 * Returns a repository
	 * 
	 * @param String $repositoryName		repository name
	 * @param String $entityManagerName		entity manager name, optional
	 * @return \Doctrine\ORM\EntityRepository
	 */
	protected function getRepository($repositoryName, $entityManagerName = null)
	{
		return $this->getManager($entityManagerName)->getRepository($repositoryName);
	}
}