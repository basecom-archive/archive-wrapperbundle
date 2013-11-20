<?php

namespace basecom\WrapperBundle\ContainerAware;

use Doctrine\ORM\EntityManager;

class ContainerAwareController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
	/**
	 * Returns the entity manager
	 * 
	 * @param string|null $name
	 * @return \Doctrine\ORM\EntityManager
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