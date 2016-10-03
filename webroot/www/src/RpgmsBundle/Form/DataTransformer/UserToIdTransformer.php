<?php
// src/RpgmsBundla/Form/DataTransformer/UserToIdTransformer.php
namespace RpgmsBundle\Form\DataTransformer;

use RpgmsBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class UserToIdTransformer implements DataTransformerInterface
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }
    
    /**
     * Transforms an object (user) to a string (number).
     *
     * @param  User|null $user
     * @return string
     */
    public function transform($user)
    {
        if (null === $user) {
            return '';
        }

        return $user;
    }

    /**
     * Transforms a string (world) to an object (issue).
     *
     * @param  string $worldId
     * @return World|null
     * @throws TransformationFailedException if object (world) is not found.
     */
    public function reverseTransform($userId)
    {
        // no issue number? It's optional, so that's ok
        if (!$userId) {
            return;
        }

        $user = $this->manager
            ->getRepository('RpgmsBundle:User')
            // query for the world with this id
            ->find($userId)
        ;

        if (null === $user) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $userId
            ));
        }

        return $user;
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