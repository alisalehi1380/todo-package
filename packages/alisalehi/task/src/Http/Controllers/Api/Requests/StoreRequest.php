<?php

namespace AliSalehi\Task\Http\Controllers\Api\Requests;

use AliSalehi\Task\Models\Task;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            Task::TITLE        => 'required',
            Task::USER_ID      => ['required', 'exists:' . config('task.user.table','users').',id'],
            Task::DUE_DATE     => 'date',
            Task::ATTACHMENT   => 'nullable',
            Task::DESCRIPTION  => 'nullable',
            Task::IS_COMPLETED => ['nullable', 'boolean'],
        ];
    }
}
