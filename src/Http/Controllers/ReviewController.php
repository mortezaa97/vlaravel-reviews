<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews\Http\Controllers;

use App\Enums\ModelType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Mortezaa97\Reviews\Http\Resources\ReviewResource;
use Mortezaa97\Reviews\Models\Review;

class ReviewController extends Controller
{
    protected $model;

    public function index(Request $request)
    {
        $items = new Review;

        if ($request->conditions) {
            $items = $items->where(json_decode($request->conditions, true));
        }

        if ($request->with) {
            $items = $items->with($request->with);
        }

        $items = $items->with('reviewable');
        return $request->noPaginate ? ReviewResource::collection($items->get()) : ReviewResource::collection($items->paginate())->response()->getData(true);
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Review::class);
        $item = new Review;
        $data = $request->all();
        $validated = $request->validate([
            'type' => ['required', 'string'],  // Validate short names
            'model_id' => 'required|integer',
            'desc' => ['required'],
        ]);

        try {
            $data['model_type'] = ModelType::fromShort($validated['type']);  // Maps 'user' to ModelType::USER (full class)
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
        $data['created_by'] = Auth::user()->id;
        $review = $item->create($data);

        return new ReviewResource($review);
    }

    public function show(Review $review)
    {
        return $review;
    }

    public function update(Request $request, Review $review)
    {
        Gate::authorize('update', $review);
        $data = $request->all();
        $data['updated_by'] = Auth::user()->id;
        $review->update($data);

        return $review;
    }

    public function destroy(Review $review)
    {
        Gate::authorize('delete', $review);

        return $review->delete();
    }
}
