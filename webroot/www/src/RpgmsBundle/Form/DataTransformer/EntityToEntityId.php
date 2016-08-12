<?php
// src/RpgmsBundla/Form/DataTransformer/WorldToIdTransformer.php
namespace RpgmsBundle\Form\DataTransformer;

use RpgmsBundle\Entity\World;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class EntityToEntityId implements DataTransformerInterface
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }
    
    /**
     * Transforms an object (entity) to a string (number).
     *
     * @return string
     */
    public function transform($entity)
    {
        if (null === $entity) {
            return '';
        }

        return $entity->getId();
    }

    /**
     * Transforms a string (entity) to an object (issue).
     *
     * @param  string $entityId
     * @throws TransformationFailedException if object (world) is not found.
     */
    public function reverseTransform($entityId)
    {
        ladybug_dump('transform back!');
        // no issue number? It's optional, so that's ok
        if (!$entityId) {
            return;
        }

        $entity = $this->manager
            ->getRepository('RpgmsBundle:World')
            // query for the world with this id
            ->find($entityId)
        ;

        if (null === $entity) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $entityId
            ));
        }

        return $entity;
    }
    public function getParent()
    {
        return 'hidden';
    }
    public function getName()
    {
        return 'entity_hidden';
    }
}