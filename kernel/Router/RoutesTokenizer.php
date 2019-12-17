<?php

namespace Kernel\Router;

class RoutesTokenizer
{

    public function __construct(string $source)
    {
        $tokens = token_get_all($source);
        $lexerOutput = $this->interpret($tokens);
    }

    private function interpret(?array $tokens) : TokenLexer
    {
        return new TokenLexer($tokens);
    }

}