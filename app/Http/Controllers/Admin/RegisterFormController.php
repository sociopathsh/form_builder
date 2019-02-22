<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RegisterForm;
use function GuzzleHttp\json_decode;

class RegisterFormController extends Controller
{

    private $register_form_fields;
    private $path;

    public function __construct()
    {
        $path = storage_path() . "/app/form_data/register_form.json";
        $this->path = $path;
        $this->register_form_fields = json_decode(file_get_contents($path), true);
    }

    public function edit()
    {
        $register_form_fields = $this->register_form_fields;
        return view('backend.forms.register_form.edit', compact('register_form_fields'));
    }

    public function update(Request $request)
    {

        $id = round(microtime(true) * 1000);
        $register_form_fields = $this->register_form_fields;
        $field_type = $register_form_fields[$request->field_id]["type"];
        if ($field_type == "radio") {
            if ($request->radio_id) {
                $register_form_fields[$request->field_id]["radios"][$request->radio_id]["name"] = $request->name;
                $register_form_fields[$request->field_id]["radios"][$request->radio_id]["value"] = $request->value;
            } else {
                $register_form_fields[$request->field_id]["radios"][$id] = ["id" => $id, "name" => $request->name, "value" => $request->value];
            }
        } elseif ($field_type == "select") {
            if ($request->action == "delete") {
                unset($register_form_fields[$request->field_id]["options"][$request->option_id]);
            } elseif ($request->action == "add") {
                $register_form_fields[$request->field_id]["options"][$id] = ["id" => $id, "name" => $request->name, "value" => $request->value];
            } else {
                $register_form_fields[$request->field_id]["options"][$request->option_id]["name"] = $request->name;
                $register_form_fields[$request->field_id]["options"][$request->option_id]["value"] = $request->value;
            }
        } else {
            $register_form_fields[$request->field_id]["label"] = $request->label;
            $register_form_fields[$request->field_id]["placeholder"] = $request->placeholder;
        }

        $updated_form_fields = json_encode($register_form_fields);
        $result = file_put_contents($this->path, $updated_form_fields);
        return $result;
    }
}
