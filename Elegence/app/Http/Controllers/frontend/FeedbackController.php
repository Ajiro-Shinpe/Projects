<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('frontend.Feedback');
    }

    public function FeedbackForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'feedback' => 'required',
        ]);

        Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'feedback' => $request->input('feedback'),
        ]);

        return redirect('/')->with('success', 'Your Feedback has been sent successfully!');
    }
    
    public function viewFeedback()
    {
        $feedbacks = Feedback::all();
        return view('frontend.Fetch_Feedback', compact('feedbacks'));
    }
    public function destroy($id)
    {
        $feedback = Feedback::find($id);

        if ($feedback) {
            $feedback->delete();
            return redirect()->route('admin.feedback')->with('success', 'Feedback deleted successfully.');
        }

        return redirect()->route('admin.feedback')->with('error', 'Feedback not found.');
    }

}
