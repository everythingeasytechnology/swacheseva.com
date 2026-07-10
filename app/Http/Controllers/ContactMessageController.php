<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Submit contact query message from public frontend.
     */
    public function submitMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'unread'
        ]);

        return back()->with('success', 'Your support request / message has been submitted successfully. Our team will get back to you soon.');
    }

    /**
     * Display all contact support messages to administrator.
     */
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    /**
     * Toggle read status of a contact message query.
     */
    public function markRead($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->update(['status' => 'read']);
        
        return back()->with('success', 'Message marked as read.');
    }

    /**
     * Delete a contact message query.
     */
    public function deleteMessage($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->delete();
        
        return back()->with('success', 'Message query deleted successfully.');
    }
}
