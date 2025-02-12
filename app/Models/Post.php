<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'id',
        'title',
        'category',
        'grade',
        'description',
    ];

        public function user()
    {
        return $this->belongsTo(User::class);
            [
            'title' => 'required|string|max:50',
            'category' => 'required|string|in:国語,社会,算数,理科,生活,音楽,図画工作,家庭,体育,道徳,外国語活動,総合的な学習の時間,特別活動',
            'grade' => 'required|integer|min:1|max:6',
            'description' => 'required|string|max:2000',
            ];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function file_url()
    {
        return Storage::url('files/posts/' . $this->file_path);
    }
}
