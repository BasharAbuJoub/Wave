<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $fillable = ['key', 'value'];

    public function scopeSet($query, $key, $value){
        $setting = $query->where('key', $key)->first();
        if($setting != null){
            $setting->update([
                'value' => $value
            ]);
        }else{
            $setting = Settings::create([
                'key'   => $key,
                'value' => $value
            ]);
        }
        return $setting;
    }


    public function scopeKey($query, $key, $defualt){

        $setting = $query->where('key', $key)->first();
        if($setting != null)
            return $setting->value;
        return $defualt;

    }

}
