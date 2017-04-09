<?php

namespace Backpack\MenuCRUD\app\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use CrudTrait;

    protected $table = 'menus';
    protected $fillable = ['name'];

    public function pages()
    {
        return $this->belongsTo('Backpack\MenuCRUD\app\Models\MenuItem', 'menu_id');
    }
}
