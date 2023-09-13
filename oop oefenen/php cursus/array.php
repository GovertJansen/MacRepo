<?php

$books = [
    [
        'name' => 'de grijze jager',
        'author' => 'Kees spek',
        'leeftijd' => '15 jaar'
    ]
];

foreach ($books as $book) {
    echo $book['name'];
    echo $book['author'];
}
