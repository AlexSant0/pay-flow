<?php

namespace Payflow\Retailler;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Payflow\Shared\Enums\DocumentTypeEnum;
use Payflow\Wallet\Wallet;

class Retailler extends Model
{

    use HasFactory;

    protected $table = 'retaillers';

    protected $fillable = [
        'name',
        'email',
        'document_type',
        'document_number',
    ];

    protected $casts = [
        'document_type' => DocumentTypeEnum::class
    ];

    public function wallet(): MorphOne
    {
       return $this->morphOne(Wallet::class, 'user'); 
    }

    protected static function newFactory(): RetaillerFactory
    {
        return RetaillerFactory::new();
    }
}