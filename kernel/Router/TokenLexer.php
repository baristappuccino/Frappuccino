<?php

namespace Kernel\Router;

class TokenLexer
{

    private ?array $tokens;

    public function __construct(?array $tokens)
    {
        $this->tokens = $tokens;
        var_dump($tokens);
        $this->interpret();
    }

    private int $stage = 0;
    private int $whitelineCounter = 0;

    /**
     * Interpret tokens
     */
    private function interpret()
    {
        foreach ($this->tokens ?? [] as $token) {
            if ($this->validateToken($token)) {
                if ($this->declaresFunction($token)) {
                    // TODO detect function namespacing and path for routing
                }
            }
        }
    }

    /**
     * @param array|null $token
     *
     * @return bool
     */
    private function validateToken(?array $token)
    {
        return $token !== null && is_array($token) && isset($token[1]);
    }

    private function startsComment(array $token)
    {
    }

}