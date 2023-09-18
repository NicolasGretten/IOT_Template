<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\JwtTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @method static where(string $string, mixed $accountId)
 * @method static select(string $string)
 * @method static find($postId)
 * @property mixed email
 * @property mixed password
 * @property mixed locale
 * @property mixed phone
 * @property mixed birthday
 * @property mixed gender
 * @property mixed|string id
 * @property mixed|string|null accountNumber
 * @property mixed keep_logging
 * @property mixed last_name
 * @property mixed first_name
 * @property Carbon|mixed last_login_at
 * @property mixed|string|null $account_number
 */
class Template extends Model
{
    use HasFactory, Authenticatable, Authorizable, SoftDeletes;

    protected $dates = ['last_login_at', 'created_at, updated_at, deleted_at'];
    protected $connection = 'data';
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'password_forgotten_token',
        'password_forgotten_token_limit'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
