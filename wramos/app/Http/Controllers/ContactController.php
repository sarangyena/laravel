<?php

namespace App\Http\Controllers;

use App\Mail\Reply;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:255',
                'message' => 'nullable|string|max:255',
            ]);
            $contact = Contact::create($validated);
            return redirect(route('index'))->with('success', 'Your message has been sent successfully!');
        } catch (Exception $e) {
            return redirect(route('index'))->with('error', $e->getMessage());
        }
    }
    public function reply(Request $request, $id)
    {
        try {
            $contact = Contact::find($id);
            $data = [];
            $data['name'] = $contact->name;
            $data['email'] = $contact->email;
            $data['phone'] = $contact->phone;
            $data['date'] = $contact->created_at->toDateTimeString();
            $data['remarks'] = $request->input('reply');
            $data['message'] = $contact->message;
            $data['isRead'] = true;
            $contact->update($data);
            Mail::to('edrianflorendo18@gmail.com')->send(new Reply($data));
            return redirect()->back()->with('success', 'Successfully replied.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function updateRead($id)
    {
        try {
            $contact = Contact::find($id);
            $temp = [];
            if ($contact->isRead == true) {
                if ($contact->remarks != 'None') {
                    return redirect()->back()->with('error', 'Cannot unread. Already has a reply.');
                } else {
                    $temp['isRead'] = false;
                    $contact->update($temp);
                    return redirect()->back()->with('success', 'Successfully unread the message.');
                }
            } else {
                $temp['isRead'] = true;
                $contact->update($temp);
                return redirect()->back()->with('success', 'Successfully read the message.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
