<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private const FORM_DATA_KEY = 'contact_form';

    public function showForm()
    {
        return view('form');
    }

    public function confirm(ContactRequest $request)
    {
        $form_data = $request->validated();
        $request->session()->put(self::FORM_DATA_KEY, $form_data);

        return redirect()->route('confirm');
    }

    public function showConfirm(Request $request)
    {
        $session = $request->session();

        if (!$session->has(self::FORM_DATA_KEY)) {
            return redirect()->route('form');
        }

        return view('confirm', $session->get(self::FORM_DATA_KEY));
    }

    public function send(Request $request)
    {
        $session = $request->session();

        if (!$session->has(self::FORM_DATA_KEY)) {
            return redirect()->route('form');
        }

        $form_data = $session->pull(self::FORM_DATA_KEY);

        return redirect()->route('finish');
    }

    public function showFinish()
    {
        return view('finish');
    }
}
