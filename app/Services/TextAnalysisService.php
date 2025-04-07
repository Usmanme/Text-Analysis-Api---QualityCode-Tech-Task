<?php

namespace App\Services;

use Illuminate\Support\Collection;

class TextAnalysisService
{
    /**
     * Analyze the text and return the word statistics.
     *
     * @param string $text
     * @return array
     */
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

    /**
     * Clean the text by removing non-ASCII characters and normalizing spaces.
     *
     * @param string $text
     * @return string
     */
    private function cleanText(string $text): string
    {
        // Remove non-ASCII characters and extra spaces
        return preg_replace('/[^\x20-\x7E]/', '', $text);
    }

    /**
     * Tokenize the text into words.
     *
     * @param string $text
     * @return array
     */
    private function tokenizeText(string $text): array
    {
        // Tokenize by non-word characters and convert to lowercase
        return preg_split('/\W+/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Get word frequencies using a Laravel Collection.
     *
     * @param array $words
     * @return Collection
     */
    private function getWordFrequencies(array $words): Collection
    {
        return collect($words)
            ->groupBy(fn($word) => $word)
            ->map(fn($group) => $group->count())
            ->sortDesc();
    }
}
