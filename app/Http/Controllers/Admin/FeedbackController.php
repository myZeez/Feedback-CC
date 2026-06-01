<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function index(): View
    {
        return view('admin.feedback.index', [
            'feedback' => Feedback::query()->latest()->paginate(12),
            'averageRating' => round((float) Feedback::query()->avg('rating'), 1),
            'totalFeedback' => Feedback::query()->count(),
        ]);
    }
}
