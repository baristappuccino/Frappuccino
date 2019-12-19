<?php

namespace Kernel\Router;

class RoutesTokenizer
{

    public function __construct(string $source)
    {
        $tokens = token_get_all($source);
        $lexerOutput = $this->interpret($tokens);
        echo "Detected these routes: <hr>";
        echo (json_encode($lexerOutput->getResults(), JSON_PRETTY_PRINT));
    }

    private function interpret(?array $tokens): TokenLexer
    {
        return new TokenLexer($tokens);
    }

}