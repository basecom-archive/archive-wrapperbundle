<?php

namespace basecom\WrapperBundle\ContainerAware;

class ContainerAwareController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
	/**
	 * Returns the entity manager
	 * 
	 * @param type $name
	 * @return \Doctrine\ORM\EntityManager
	 */
	protected function getEntityManager($name = null)
	{
		return $this->getDoctrine()->getEntityManager($name);
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
		return $this->getEntityManager($entityManagerName)->getRepository($repositoryName);
	}
}