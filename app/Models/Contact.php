<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'familyname', 'title', 'description', 'contactdate'];
    protected $table = "contacts";
    protected $primaryKey = "id";
}
