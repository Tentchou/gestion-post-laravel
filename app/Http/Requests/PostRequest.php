<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
     //requete de prparation
    protected function prepareForValidation(): void
    {
        $this->merge([
            //la methode str
            'slug' => Str::slug($this->slug ?? $this->title),
        ]);
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    //permet de determiner si on est autorise a faire l'action ou pas
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        //gestion des requetes et validations
        return [
            'title' => ['required', 'string', 'between:3,255'],
            'slug' => ['required', 'string', 'between:3,255', Rule::unique('posts')->ignore($this->post)],
            'content' => ['required', 'string', 'min:10'],
            'thumbnail' => [Rule::requiredIf($request->isMethod('post')), 'image'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tag_ids' => ['array', 'exists:tags,id'],
        ];
    }
}
