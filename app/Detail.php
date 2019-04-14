<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Detail extends Model
{
    protected $fillable = [
        'user_id','sex','religion','card','address','last_edu','majors','edu_place','photo','cv'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'sex' => 'required',
            'religion' => 'required',
            'card' => 'required'|'min:16'|'unique:details,card'|'numeric',
            'last_edu' => 'required',
            'majors' => 'required',
            'edu_place' => 'required',
            'photo' => 'required',
        ]);
    }
}
