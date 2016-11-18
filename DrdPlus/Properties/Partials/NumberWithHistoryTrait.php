<?php
namespace DrdPlus\Properties\Partials;

use Granam\Tools\ValueDescriber;

trait NumberWithHistoryTrait
{
    protected $history = [];

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

    protected function noticeChange()
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
    protected function findChangingCall(array $backtrace)
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
    protected function formatToSentence($string)
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

    protected function adoptHistory(AbstractIntegerProperty $integerProperty)
    {
        // previous history FIRST, current after
        $this->history = array_merge($integerProperty->getHistory(), $this->getHistory());
    }
}