<?php
namespace DrdPlus\Tests\Properties\Base;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\BasePropertyFactory;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;

class BasePropertyFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_create_every_property()
    {
        $factory = new BasePropertyFactory();

        $strength = $factory->createStrength($strengthValue = 123);
        $this->assertInstanceOf(Strength::class, $strength);
        $this->assertSame($strengthValue, $strength->getValue());
        $strength = $factory->createProperty($strengthValue, Strength::STRENGTH);
        $this->assertInstanceOf(Strength::class, $strength);
        $this->assertSame($strengthValue, $strength->getValue());

        $agility = $factory->createAgility($agilityValue = 123);
        $this->assertInstanceOf(Agility::class, $agility);
        $this->assertSame($agilityValue, $agility->getValue());
        $agility = $factory->createProperty($agilityValue, Agility::AGILITY);
        $this->assertInstanceOf(Agility::class, $agility);
        $this->assertSame($agilityValue, $agility->getValue());

        $knack = $factory->createKnack($knackValue = 123);
        $this->assertInstanceOf(Knack::class, $knack);
        $this->assertSame($knackValue, $knack->getValue());
        $knack = $factory->createProperty($knackValue, Knack::KNACK);
        $this->assertInstanceOf(Knack::class, $knack);
        $this->assertSame($knackValue, $knack->getValue());

        $will = $factory->createWill($willValue = 123);
        $this->assertInstanceOf(Will::class, $will);
        $this->assertSame($willValue, $will->getValue());
        $will = $factory->createProperty($willValue, Will::WILL);
        $this->assertInstanceOf(Will::class, $will);
        $this->assertSame($willValue, $will->getValue());

        $intelligence = $factory->createIntelligence($intelligenceValue = 123);
        $this->assertInstanceOf(Intelligence::class, $intelligence);
        $this->assertSame($intelligenceValue, $intelligence->getValue());
        $intelligence = $factory->createProperty($intelligenceValue, Intelligence::INTELLIGENCE);
        $this->assertInstanceOf(Intelligence::class, $intelligence);
        $this->assertSame($intelligenceValue, $intelligence->getValue());

        $charisma = $factory->createCharisma($charismaValue = 123);
        $this->assertInstanceOf(Charisma::class, $charisma);
        $this->assertSame($charismaValue, $charisma->getValue());
        $charisma = $factory->createProperty($charismaValue, Charisma::CHARISMA);
        $this->assertInstanceOf(Charisma::class, $charisma);
        $this->assertSame($charismaValue, $charisma->getValue());
    }

    /**
     * @test
     * @expectedException \DrdPlus\Properties\Base\Exceptions\UnknownBasePropertyCode
     */
    public function I_can_not_create_property_by_unknown_code()
    {
        $factory = new BasePropertyFactory();

        $factory->createProperty(123, 'unknown code');
    }
}