<?php
namespace App\Service\Parser;

use App\Library\Parser\ParserInterface;

class ParserFactory
{
    protected $parsers;

    protected $currentType;

    public function __construct($currentType)
    {
        $this->parsers = [];
        $this->currentType = $currentType;
    }

    public function addParser(ParserInterface $parser)
    {
        $this->parsers[$parser->getType()] = $parser;
    }

    public function getParserByType($type): ?ParserInterface
    {
        return $this->parsers[$type];
    }

    public function getParser() {
        return $this->getParserByType($this->currentType);
    }
}