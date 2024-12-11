<?php

namespace Payflow\Customer;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Payflow\Shared\Enums\DocumentTypeEnum;

class Customer extends Model
{

    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'document_type',
        'document_number',
    ];

    protected $casts = [
        'document_type' => DocumentTypeEnum::class
    ];

    protected static function newFactory(): CustomerFactory
    {
        return CustomerFactory::new();
    }
}