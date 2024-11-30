<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Director extends Model implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Get the identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';  // El nombre de la columna que actúa como el identificador único
    }

    /**
     * Get the value of the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password; // Retorna la contraseña encriptada
    }

    /**
     * Get the name of the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the token for the user.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token for the user.
     *
     * @param string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Add the missing method from Authenticatable.
     * Get the password column name.
     *
     * @return string
     */
    public function getAuthPasswordName()
    {
        return 'password';  // Especifica que la columna de la contraseña es 'password'
    }
}
