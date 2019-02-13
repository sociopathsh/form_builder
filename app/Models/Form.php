<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    const FORMS = [
        // [
        //     "name" => "Login",
        //     "route" => "admin/login_form/edit"
        // ],
        [
            "name" => "Register",
            "route" => "admin/register_form/edit"
        ]
    ];

}
