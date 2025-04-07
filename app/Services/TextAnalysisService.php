<?php

namespace App\Services;

use Illuminate\Support\Collection;

class TextAnalysisService
{

    public function analyzeText(string $text): array
    {
        // Normalize and clean the text
        $cleanText = $this->cleanText($text);

        // Tokenize the text into words
        $words = $this->tokenizeText($cleanText);

        // Get word frequencies
        $wordCount = $this->getWordFrequencies($words);

        // Prepare the response data
        return [
            'total_words' => $wordCount->sum(),
            'unique_words' => $wordCount->count(),
            'most_common_word' => $wordCount->keys()->first(),
            'most_common_count' => $wordCount->first(),
            'top_5_words' => $wordCount->take(5)->toArray(),
        ];
    }

    private function cleanText(string $text): string
    {
        // Removing non-ASCII characters and extra spaces
        return preg_replace('/[^\x20-\x7E]/', '', $text);
    }

    private function tokenizeText(string $text): array
    {
        // Tokenize by non-word characters and convert to lowercase
        return preg_split('/\W+/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
    }


    private function getWordFrequencies(array $words): Collection
    {
        return collect($words)
            ->groupBy(fn($word) => $word)
            ->map(fn($group) => $group->count())
            ->sortDesc();
    }
}
