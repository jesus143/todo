<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'todos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'text', 'done', 'created_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
