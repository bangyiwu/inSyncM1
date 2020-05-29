<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'start' => 'date_format:Y-m-d H:i:s|before:end',
            'end' => 'date_format:Y-m-d H:i:s|after:start'

        ];
    }

    public function messages() {
        return [
            'title.required' => '- Please enter a title',
            'title.min' => '- Title needs to be longer than 3 characters',
            'start.date_format' => '- Please enter a valid starting time',
            'start.before' => '- Starting time cannot be after ending time',
            'end.date_format' => '- Please enter a valid ending time',
            'end.after' => '- Ending time cannot be before starting time'
        ];
    }
}
