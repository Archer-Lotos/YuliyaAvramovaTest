<?php

function checkBracketBalance($expression) {
    $stack = [];

    $bracketPairs = [
        ')' => '(',
        ']' => '[',
        '}' => '{',
    ];

    $openBrackets = array_values($bracketPairs);
    $closeBrackets = array_keys($bracketPairs);

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];

        if (in_array($char, $openBrackets)) {
            // Знайшли відкриваючу дужку, додаємо її в стек
            array_push($stack, $char);
        } elseif (in_array($char, $closeBrackets)) {
            // Знайшли закриваючу дужку
            $lastOpenBracket = array_pop($stack);

            // Перевіряємо, чи відповідає закриваюча дужка останній відкриваючій
            if ($lastOpenBracket !== $bracketPairs[$char]) {
                return "Невірно";
            }
        }
    }

    // Перевіряємо, чи всі відкриваючі дужки мають відповідні закриваючі
    if (empty($stack)) {
        return "Вірно";
    } else {
        return "Невірно";
    }
}

// Приклад використання
$expression1 = "[({})]";
$expression2 = "[([)";
$expression3 = "{(a + b) * (c - d)}";

echo checkBracketBalance($expression1)."\n"; // Вірно
echo checkBracketBalance($expression2)."\n"; // Невірно
echo checkBracketBalance($expression3)."\n"; // Вірно

?>
