<?php
namespace AvoRed\Subscribe\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

class SubscribeRequest extends Request
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
        //$validationRule = [];
        $validationRule['subscribe_email'] = 'required|email|max:255|unique:subscribes,email';


        return $validationRule;
    }
}
