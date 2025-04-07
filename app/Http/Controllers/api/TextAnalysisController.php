<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\TextAnalysisRequest;
use App\Services\TextAnalysisService;
use Illuminate\Http\JsonResponse;

class TextAnalysisController extends Controller
{
    protected $textAnalysisService;

    public function __construct(TextAnalysisService $textAnalysisService)
    {
        $this->textAnalysisService = $textAnalysisService;
    }


    public function analyzeText(TextAnalysisRequest $request): JsonResponse
    {
        $data = $this->textAnalysisService->analyzeText($request->text);

        return response()->json($data);
    }
}
