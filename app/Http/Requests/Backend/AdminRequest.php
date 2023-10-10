<?php

    namespace App\Http\Requests\Backend;

    use Illuminate\Foundation\Http\FormRequest;

    class AdminRequest extends FormRequest
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
                'name'     => 'required|max:255',
                'email'    => 'required|max:100|email|unique:admins,email' . (isset(request()->admin) ? ',' . request()->admin . ',id,deleted_at,NULL' : ''),
                'password' => 'min:6|max:20' . (isset(request()->admin) ? '|nullable' : '|required'),
                'role'     => 'required|exists:roles,id',
            ];
        }
    }