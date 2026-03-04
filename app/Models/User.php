<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Casts\IsadminCast;
use Ramsey\Uuid\Uuid;
use App\Models\Scopes\OldUsers;
use App\Observers\UserObserve;
use Illuminate\Support\Facades\Log;
use Database\Factories\AdminFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

// #[ScopedBy(OldUsers::class)]
#[ObservedBy(UserObserve::class)]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes, Prunable;

    // public const CREATED_AT = 'CREATED';
    // public const UPDATED_AT = 'UPDATED';

    // public $timestamps = false;

    // protected $dateFormat = 'U';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    // public $attributes = ['is_admin' => 100];

    /**
     * Generate a new UUID for the model.
     */
    // public function newUniqueId()
    // {
    //     return (string) Uuid::uuid4();
    // }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    // public function uniqueIds()
    // {
    //     return ['id'];
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    // protected static $factory = AdminFactory::class;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The relationships that should always be loaded.
     */
    // protected $with = ['posts'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected $casts = [
        // 'is_admin' => 'boolean'
        'is_admin' => IsadminCast::class    //php artisan make:cast IsadminCast
    ];

    public function name(): Attribute       // you should write :Attribute to work accessors OR mutators
    {
        return Attribute::make(
            // get: fn($value) => 'MR. ' . str_replace(['mr', 'MR.'], '', strtoupper($value)),
            get: fn($value) =>  trim(str_ireplace(['.', 'mr', 'dr', 'prof'], '', $value)),
            set: fn($value) => strtolower($value),

        );
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('created_at');
    }
    public function posts()
    {
        return $this->hasMany(Post::class)->chaperone();
    }

    public function userComments()
    {
        // return $this->hasManyThrough(comment::class, post::class);
        // return $this->through('posts')->has('comments');
        return $this->throughPosts()->hasComments();
    }
    /**
     * Get The User's latestPost
     */
    public function latestPost()
    {
        return $this->hasOne(Post::class)->latestOfMany();
    }
    /**
     * Get the user's oldestPost
     */
    public function oldestPost()
    {
        return $this->hasOne(Post::class)->oldestOfMany();
    }
    /**
     * Get the user's mostLiked
     */
    public function mostLiked()
    {
        return $this->hasOne(Post::class)->ofMany('likes', 'MAX');
    }

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function userSerial()
    {
        // return $this->hasOneThrough(Serial::class, Phone::class);
        // return $this->through('phone')->has('Serial');
        return $this->throughPhone()->hasSerial();
    }
    /**
     * The "booted" method of the model.
     */
    protected static function booted()
    {
        // static::deleting(function (User $user) {
        //     Log::info("This is Deleting hook for id : $user->id");
        // });
        // static::deleted(function (User $user) {
        //     Log::info("this is deleted hook for id : $user->id");
        // });

        // static::addGlobalScope(new OldUsers);   //GlobalScope

        // static::addGlobalScope('newUsers', function (Builder $builder) {    //Anonymous globalScope
        //     $builder->where('created_at', '>', now()->subYears(5));
        // });

        // Dispatsh SeveralEvents From Closure
        // static::creating(fn(User $user) => Log::info('Dispatch Event from Closure Before Create name => ' . $user->name));
        // static::created(fn(User $user) => Log::info('Dispatch Event From Closure after Created name => ' . $user->name));
    }

    // Local Scopes
    /**
     * Scope a query to only include popular users.
     */

    #[Scope]
    protected function newUsers(Builder $builder): void
    {
        $builder->where('created_at', '>', now()->subYears(5));
    }
    #[Scope]
    protected function oldUsers(Builder $builder)
    {
        $builder->where('created_at', '<', now()->subYears(22));
    }


    /**
     * Get the prunable model query.
     */

    // public function prunable(): Builder
    // {
    //     return static::where('deleted_at', '<=', now()->subMonth());
    // }

    // public function pruning()
    // {
    //     return Log::info('the data deleted before month deleted');
    // }


}
