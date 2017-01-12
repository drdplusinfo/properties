<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use Granam\Integer\IntegerInterface;
use Granam\Scalar\Tools\ToString;
use Granam\String\StringInterface;
use Granam\Tools\ValueDescriber;
use Granam\Strict\Object\StrictObject;

class BasePropertiesFactory extends StrictObject
{
    /**
     * @param int|IntegerInterface $strengthValue
     * @return Strength
     */
    public function createStrength($strengthValue)
    {
        return Strength::getIt($strengthValue);
    }

    /**
     * @param int|IntegerInterface $agilityValue
     * @return Agility
     */
    public function createAgility($agilityValue)
    {
        return Agility::getIt($agilityValue);
    }

    /**
     * @param int|IntegerInterface $knackValue
     * @return Knack
     */
    public function createKnack($knackValue)
    {
        return Knack::getIt($knackValue);
    }

    /**
     * @param int|IntegerInterface $willValue
     * @return Will
     */
    public function createWill($willValue)
    {
        return Will::getIt($willValue);
    }

    /**
     * @param int|IntegerInterface $intelligenceValue
     * @return Intelligence
     */
    public function createIntelligence($intelligenceValue)
    {
        return Intelligence::getIt($intelligenceValue);
    }

    /**
     * @param int|IntegerInterface $charismaValue
     * @return Charisma
     */
    public function createCharisma($charismaValue)
    {
        return Charisma::getIt($charismaValue);
    }

    /**
     * @param $propertyValue
     * @param string|StringInterface $propertyCode
     * @return Agility|Charisma|Intelligence|Knack|Strength|Will
     * @throws \DrdPlus\Properties\Base\Exceptions\UnknownBasePropertyCode
     * @throws \Granam\Scalar\Tools\Exceptions\WrongParameterType
     */
    public function createProperty($propertyValue, $propertyCode)
    {
        switch (ToString::toString($propertyCode)) {
            case PropertyCode::STRENGTH :
                return $this->createStrength($propertyValue);
            case PropertyCode::AGILITY :
                return $this->createAgility($propertyValue);
            case PropertyCode::KNACK :
                return $this->createKnack($propertyValue);
            case PropertyCode::WILL :
                return $this->createWill($propertyValue);
            case PropertyCode::INTELLIGENCE :
                return $this->createIntelligence($propertyValue);
            case PropertyCode::CHARISMA :
                return $this->createCharisma($propertyValue);
            default :
                throw new Exceptions\UnknownBasePropertyCode(
                    'Unknown code of a base property ' . ValueDescriber::describe($propertyCode)
                );
        }
    }
}