<?php
namespace DrdPlus\Properties\Base;

use Granam\Scalar\Tools\ValueDescriber;
use Granam\Strict\Object\StrictObject;

class BasePropertyFactory extends StrictObject
{
    public function createStrength($strengthValue)
    {
        return Strength::getIt($strengthValue);
    }

    public function createAgility($agilityValue)
    {
        return Agility::getIt($agilityValue);
    }

    public function createKnack($knackValue)
    {
        return Knack::getIt($knackValue);
    }

    public function createWill($willValue)
    {
        return Will::getIt($willValue);
    }

    public function createIntelligence($intelligenceValue)
    {
        return Intelligence::getIt($intelligenceValue);
    }

    public function createCharisma($charismaValue)
    {
        return Charisma::getIt($charismaValue);
    }

    public function createProperty($propertyValue, $propertyCode)
    {
        switch ($propertyCode) {
            case Strength::STRENGTH :
                return $this->createStrength($propertyValue);
            case Agility::AGILITY :
                return $this->createAgility($propertyValue);
            case Knack::KNACK :
                return $this->createKnack($propertyValue);
            case Will::WILL :
                return $this->createWill($propertyValue);
            case Intelligence::INTELLIGENCE :
                return $this->createIntelligence($propertyValue);
            case Charisma::CHARISMA :
                return $this->createCharisma($propertyValue);
            default :
                throw new Exceptions\UnknownBasePropertyCode(
                    'Unknown code of a base property ' . ValueDescriber::describe($propertyCode)
                );
        }
    }
}