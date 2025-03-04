<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function form_inputs()
    {
        return view('pages.forms.form-inputs');
    }

    public function form_check_radios()
    {
        return view('pages.forms.form-check-radios');
    }

    public function form_input_groups()
    {
        return view('pages.forms.form-input-groups');
    }

    public function form_select()
    {
        return view('pages.forms.form-select');
    }

    public function form_range()
    {
        return view('pages.forms.form-range');
    }

    public function form_file_uploads()
    {
        return view('pages.forms.form-file-uploads');
    }

    public function form_datetime_pickers()
    {
        return view('pages.forms.form-datetime-pickers');
    }

    public function form_color_pickers()
    {
        return view('pages.forms.form-color-pickers');
    }

    public function form_layouts()
    {
        return view('pages.forms.form-layouts');
    }

    public function quill_editor()
    {
        return view('pages.forms.quill-editor');
    }

    public function form_validations()
    {
        return view('pages.forms.form-validations');
    }
    
    public function form_select2()
    {
        return view('pages.forms.form-select2');
    }

}
