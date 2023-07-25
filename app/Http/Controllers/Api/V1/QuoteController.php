<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteRequest;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Http\Resources\QuoteResource;
use App\Http\Resources\QuoteCollection;
use Illuminate\Http\JsonResponse;

class QuoteController extends Controller
{
    /**
     * If the author of the quote was not provided use 'Unknown' as the name of the author
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        if(!$request->has('author')) {
            $request->merge(['author' => 'Unknown']);
        }
    }

    /**
     * Return all quotes
     *
     * @return QuoteCollection
     */
    public function index(): QuoteCollection
    {
        return new QuoteCollection(Quote::all());
    }

    /**
     * Return quote record for $id
     * Alternative approach can be done with route model binding - show(Quote $quote)
     *
     * @param int $id
     * @return QuoteResource|JsonResponse
     */
    public function show(int $id): QuoteResource|JsonResponse
    {
        $quote = Quote::find($id);
        if($quote) {
            return new QuoteResource($quote);
        } else {
            return response()->json(['status' => 'error', 'status_code' => 404, 'message' => 'Quote not found'])->setStatusCode(404);
        }
    }

    /**
     * Create a quote record
     *
     * @param QuoteRequest $request
     * @return JsonResponse
     */
    public function store(QuoteRequest $request): JsonResponse
    {
        Quote::create($request->validated());
        return response()->json(['status' => 'ok', 'message' => 'Quote Created']);
    }

    /**
     * Update a quote record
     *
     * @param QuoteRequest $request
     * @param Quote $quote
     * @return JsonResponse
     */
    public function update(QuoteRequest $request, Quote $quote)
    {
        $quote->update($request->validated());
        return response()->json(['status' => 'ok', 'message' => 'Quote Updated']);
    }

    /**
     * Delete a quote record
     *
     * @param Quote $quote
     * @return JsonResponse
     */
    public function destroy(Quote $quote): JsonResponse
    {
        $quote->delete();
        return response()->json(['status' => 'ok', 'message' => 'Quote Deleted']);
    }
}
