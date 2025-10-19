<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = ['user_id', 'title', 'timeline', 'target'];

        public function getIsFinishedAttribute()
    {
        return $this->current_omzet >= $this->target;
    }

    public function getProgressAttribute()
    {
        if ($this->target == 0) return 0;
        return min(100, round(($this->current_omzet / $this->target) * 100));
    }

}
