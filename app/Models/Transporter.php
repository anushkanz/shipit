<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transporter extends Model
{
        protected $table = 'transporters';
        use HasFactory, Notifiable;
        
        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'user_id',
            'legalname',
            'nzbn',
            'gst',
            'inbusiness',
            'adderss',
            'dlnumber',
            'proof_identification',
            'proof_address',
            'notification',
        ];
    

        
}