<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LoginForm;

class LoginFormController extends Controller
{
    public function edit()
    {
        $login_form_fields = LoginForm::all();
        return view('backend.forms.login_form.edit', compact('login_form_fields'));
    }

    public function show($field_id)
    {
        $field = LoginForm::find($field_id);
        return response()->json(['field' => $field]);
    }

    public function update(Request $request)
    {
        $field = LoginForm::where('id', $request->field_id)
            ->update(['label' => $request->label, 'placeholder' => $request->placeholder]);
        return response()->json(['status' => true]);
    }
}
