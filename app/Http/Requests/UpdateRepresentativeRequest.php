<?php

namespace App\Http\Requests;

use App\Models\Representative;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRepresentativeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $representative = Representative::find(request()->id);

        return [
            'full_name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|digits:10',
                'joined_date' => 'required|date_format:Y-m-d|before_or_equal:today',
            'current_route' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'joined_date.date_format' => 'The joined date field format must be Y-m-d.',
            'joined_date.before_or_equal' => 'The joined date must not be a future date',
            'email.email' => 'The email must be valid format',
        ];
    }
}
