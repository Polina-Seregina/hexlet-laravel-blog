<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['name', 'body']; // Поля доступные для fill($params), так называемого mass-assignment
}