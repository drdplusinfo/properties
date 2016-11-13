<?php
namespace DrdPlus\Properties;

use Doctrineum\Integer\IntegerEnum;
use Granam\Integer\IntegerInterface;
use Granam\Integer\Tools\ToInteger;
use Granam\Tools\ValueDescriber;

abstract class AbstractIntegerProperty extends IntegerEnum implements Property
{

    protected $history = [];

    /**
     * Will give clone.
     *
     * @param int $value
     * @return IntegerEnum|AbstractIntegerProperty
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }

    /**
     * Will give clone.
     *
     * @param int $enumValue
     * @return IntegerEnum|AbstractIntegerProperty
     */
    public static function getEnum($enumValue)
    {
        /** @var AbstractIntegerProperty $integerProperty */
        $integerProperty = clone parent::getEnum($enumValue); // cloned to get unique history
        $integerProperty->noticeChange();

        return $integerProperty;
    }

    public function __clone()
    {
        // overloaded parent to allow cloning (to get clean property WITHOUT history)
    }

    private function noticeChange()
    {
        $backtrace = debug_backtrace();
        $changingCall = $this->findChangingCall($backtrace); // penultimate step (that before calling noticeChange)
        $this->history[] = [
            'changeBy' => [
                'name' => $this->formatToSentence($changingCall['function']),
                'arguments' => $this->extractArgumentsDescription($changingCall['args']),
            ],
            'result' => $this->getValue(),
        ];
    }

    /**
     * @param array $backtrace
     * @return array
     */
    private function findChangingCall(array $backtrace)
    {
        /** @var array $call */
        foreach ($backtrace as $call) {
            if (array_key_exists('class', $call) && $call['class'] === __CLASS__) {
                continue;
            }
            if (array_key_exists('object', $call) && $call['object'] === $this) {
                continue;
            }

            return $call;
        }

        return ['function' => '?', 'args' => []];
    }

    /**
     * @param string $string
     * @return string
     */
    private function formatToSentence($string)
    {
        preg_match_all('~[[:upper:]]?[[:lower:]]*~', $string, $matches);
        $captures = array_filter($matches[0], function ($capture) {
            return $capture !== '';
        });

        return implode(
            ' ',
            array_map(
                function ($name) {
                    return lcfirst($name);
                },
                $captures
            )
        );
    }

    /**
     * @param array $arguments
     * @return string
     */
    private function extractArgumentsDescription(array $arguments)
    {
        $descriptions = [];
        foreach ($arguments as $argument) {
            $descriptions[] = ValueDescriber::describe($argument);
        }

        return implode(',', $descriptions);
    }

    /**
     * @param int|IntegerInterface $value
     * @return AbstractIntegerProperty
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function add($value)
    {
        $increased = static::getIt($this->getValue() + ToInteger::toInteger($value));
        $increased->adoptHistory($this);

        return $increased;
    }

    private function adoptHistory(AbstractIntegerProperty $integerProperty)
    {
        // previous history FIRST, current after
        $this->history = array_merge($integerProperty->getHistory(), $this->getHistory());
    }

    /**
     * @param int|IntegerInterface $value
     * @return AbstractIntegerProperty
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function sub($value)
    {
        $decreased = static::getIt($this->getValue() - ToInteger::toInteger($value));
        $decreased->adoptHistory($this);

        return $decreased;
    }

    /**
     * Gives array of modifications and result values, from very first to current value.
     * Order of historical values is from oldest as first to newest as last.
     * Warning: history is NOT persisted.
     *
     * @return array
     */
    public function getHistory()
    {
        return $this->history;
    }
}