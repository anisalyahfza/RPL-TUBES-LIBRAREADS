<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Table\LoanTable;
use App\Models\Table\TransactionTable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Table\LibraryTable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends AppAuthenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ROLE_ADMIN = 'ADMIN';
    const ROLE_MEMBER = 'MEMBER';
    const ROLE_SUPERADMIN = 'SUPERADMIN';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $guard_name = 'web';
    protected $keyType = 'string';
    protected $fillable = ['name', 'email', 'password', 'identity_number', 'photo', 'role'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function transactions()
    {
        $this->hasMany(TransactionTable::class, 'user_id');
    }

    public function loans()
    {
        $this->hasMany(LoanTable::class, 'user_id');
    }

    public function getPhotoUrlAttribute()
    {
        if (!blank($this->photo)) {
            return Storage::temporaryUrl($this->photo, new \DateTime('+1 days'));
        }
        return null;
    }
}
