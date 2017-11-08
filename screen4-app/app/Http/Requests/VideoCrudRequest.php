<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VideoCrudRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:255',
            'brief' => 'required|min:5|max:255',
            'duration' => 'required|min:2|max:255',
            'year' => 'required|min:2|max:255',
            'url' => 'required|min:5|max:255',
            'image' => 'required|min:5|max:255',
        ];
    }

}
?>
