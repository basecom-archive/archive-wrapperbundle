<?php

namespace basecom\WrapperBundle\ContainerAware;

use \Symfony\Component\DependencyInjection\ContainerInterface;

abstract class ContainerAwareCommand extends \Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand
{
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
     * @param type $name
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getManager($name = null)
    {
        return $this->getDoctrine()->getManager($name);
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