<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Form;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::FORMS;
        return view('backend.forms.index', compact('forms'));
    }
}
