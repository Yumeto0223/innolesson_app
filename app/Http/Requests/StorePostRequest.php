<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'category' => 'required|string|in:国語,社会,算数,理科,生活,音楽,図画工作,家庭,体育,道徳,外国語活動,総合的な学習の時間,特別活動',
            'grade' => 'required|integer|min:1|max:6',
            'description' => 'required|string|max:2000',
            'file_path' => 'required|file|mimes:jpg,png,pdf',
        ];
    }
}
