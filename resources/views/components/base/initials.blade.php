@php

$words = explode(' ', trim($text));
// Initialize an empty string for initials
$initials = '';

// Get the number of words in the sentence
$wordCount = count($words);

// If the sentence has only one word, get the first letter of that word
if ($wordCount === 1) {
    $initials = strtoupper(substr($words[0], 0, 2));
}
// If the sentence has two or more words, get the first letter of the first two words
else {
    $initials = strtoupper(substr($words[0], 0, 2));
}


@endphp



<span class="font-size-h3 symbol-label font-weight-boldest">{{$initials}}</span>