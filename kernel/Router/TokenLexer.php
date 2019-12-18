<?php

namespace Kernel\Router;

class TokenLexer
{

    private ?array $tokens;

    public function __construct(?array $tokens)
    {
        $this->tokens = $tokens;
//        var_dump($this->tokens);
        $this->findCombinations();
    }

    private int $stage = 0;
    private int $whitelineCounter = 0;
    private array $namespace = [];

    /**
     * Find all combinations
     * @return array
     */
    private function findCombinations(): array
    {
        $count = 0;
        foreach ($this->tokens ?? [] as $token) {
            $count++;
            if ($this->validateToken($token)) {
                $this->lex($token, $count);
            }
        }

        return [];
    }

    /**
     * Lex a specific token
     * @param array $token
     * @param int $count
     */
    private function lex(array $token, int $count)
    {
        if ($token[0] === T_NAMESPACE && $this->namespace !== null) {
            $this->namespace = $this->deriveNamespace($count);
        }
    }

    /**
     * Derive namespace from tokenset
     * @param int $start
     * @return array
     */
    private function deriveNamespace(int $start): array
    {
        $namespacePath = [];
        foreach ($this->tokens as $k => $token) {
            if ($k < $start) {
                continue;
            }
            if ($token instanceof string || $token === ";") {
                break;
            }
            if ($token[0] === T_STRING) {
                $namespacePath[] = $token[1];
            }
        }
        return $namespacePath;
    }

    /**
     * @param array|string|null $token
     *
     * @return bool
     */
    private function validateToken($token)
    {
        return $token !== null && is_array($token) && count($token) > 2;
    }

    private function startsComment(array $token)
    {
    }

}