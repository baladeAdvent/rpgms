<?php
// src/RpgmsBundla/Form/DataTransformer/IssueToNumberTransformer.php
namespace RpgmsBundle\Form\DataTransformer;

use RpgmsBundle\Entity\World;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class WorldToIdTransformer implements DataTransformerInterface
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }
    
    /**
     * Transforms an object (world) to a string (number).
     *
     * @param  World|null $world
     * @return string
     */
    public function transform($world)
    {
        ladybug_dump($world);
        if (null === $world) {
            return '';
        }

        ladybug_dump('return world ID!');
        return $world->getId();
    }

    /**
     * Transforms a string (world) to an object (issue).
     *
     * @param  string $worldId
     * @return World|null
     * @throws TransformationFailedException if object (world) is not found.
     */
    public function reverseTransform($worldId)
    {
        ladybug_dump('transform back!');
        // no issue number? It's optional, so that's ok
        if (!$worldId) {
            return;
        }

        $world = $this->manager
            ->getRepository('RpgmsBundle:World')
            // query for the world with this id
            ->find($worldId)
        ;

        if (null === $world) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $worldId
            ));
        }

        return $world;
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