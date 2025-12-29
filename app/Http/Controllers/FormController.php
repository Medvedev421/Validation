<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\RussianPercentage;
use App\Rules\RussianPhone;

class FormController extends Controller
{
    public function show()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'text' => ['required', new RussianPercentage(50)],
            'phone' => ['required', new RussianPhone()],
        ]);

        return back()->with('success', 'Форма успешно отправлена!');
    }
}
