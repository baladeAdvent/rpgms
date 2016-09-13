<?php
// src/RpgmsBundla/Form/DataTransformer/WorldToIdTransformer.php
namespace RpgmsBundle\Form\DataTransformer;

use RpgmsBundle\Entity\PlayerCharacter;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PlayerToIdTransformer implements DataTransformerInterface
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
    public function transform($player)
    {
        if (null === $player) {
            return '';
        }

        return $player;
    }

    /**
     * Transforms a string (world) to an object (issue).
     *
     * @param  string $worldId
     * @return World|null
     * @throws TransformationFailedException if object (world) is not found.
     */
    public function reverseTransform($characterId)
    {
        // no issue number? It's optional, so that's ok
        if (!$characterId) {
            return;
        }

        $playerCharacter = $this->manager
            ->getRepository('RpgmsBundle:PlayerCharacter')
            // query for the world with this id
            ->find($characterId)
        ;

        if (null === $playerCharacter) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $characterId
            ));
        }

        return $playerCharacter;
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