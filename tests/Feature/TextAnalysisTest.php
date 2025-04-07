<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TextAnalysisTest extends TestCase
{

    public function test_text_analysis()
    {
        $response = $this->postJson('/api/text-analysis', [
            'text' => 'Hello world! Hello again. World is big, and hello to everyone.',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'total_words' => 11,
                'unique_words' => 8,
                'most_common_word' => 'hello',
                'most_common_count' => 3,
            ]);
    }
}
