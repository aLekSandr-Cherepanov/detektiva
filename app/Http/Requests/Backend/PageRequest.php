<?php

    namespace App\Http\Requests\Backend;

    use Illuminate\Foundation\Http\FormRequest;

    class PageRequest extends FormRequest
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
                config('app.locale') . '.title' => 'required',

                'alias' => 'unique:pages,alias,' . request()->page . ',id',
                'type'  => 'required',
                'date'  => 'required|date_format:d.m.Y',

            ];
        }

        public function messages()
        {
            return [
                config('app.locale') . '.title.required' => __('validation.page_title_required'),
            ];
        }
    }
