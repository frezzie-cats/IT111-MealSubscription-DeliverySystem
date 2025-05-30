<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')->get();
        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'comment' => 'required|string',
            'sentiment' => 'required|in:positive,neutral,negative',
        ]);
        $data['user_id'] = auth()->id();
        Feedback::create($data);
        return redirect()->route('feedback.index')->with('success', 'Feedback submitted!');
    }

    public function show($id)
    {
        $feedback = Feedback::with('user')->findOrFail($id);
        return view('feedback.show', compact('feedback'));
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $data = $request->validate([
            'comment' => 'required|string',
            'sentiment' => 'required|in:positive,neutral,negative',
        ]);
        $feedback->update($data);
        return redirect()->route('feedback.index')->with('success', 'Feedback updated!');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback deleted!');
    }
}
