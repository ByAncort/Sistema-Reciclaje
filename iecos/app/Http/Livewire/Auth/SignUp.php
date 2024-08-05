<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUp extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $phone = '';
    public $phone_confirmation = '';
    public $region = '';
    public $comuna = '';
    public $calle = '';
    public $numero_direccion = '';
    public $tipo_usuario = '';
    public $Tipos;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|min:6',
        'phone' => 'required',
        'phone_confirmation' => 'required|same:phone',
        'region' => 'required',
        'comuna' => 'required',
        'calle' => 'required',
        'numero_direccion' => 'required',
        'tipo_usuario' => 'required'
    ];

    public function mount()
    {
        if (auth()->check()) {
            return redirect('/dashboard');
        }
    

        $this->Tipos = DB::table('roles')
        ->whereNotIn('name', ['admin', 'owner', 'jobs'])
        ->get()
        ->map(function($item) {
            return (array) $item; 
        });
    }
    
    public function register() {
        $role_id= DB::table('roles')->where('name', 'users')->value('id');
        if (!$role_id) {
            session()->flash('error', 'El rol especificado no existe.');
            return;
        }
        try {
        if ($this->password !== $this->password_confirmation) {
            $this->addError('password', 'Las contraseñas no coinciden.');
            return;
        }
    
        // Validar los teléfonos
        if ($this->phone !== $this->phone_confirmation) {
            $this->addError('phone', 'Los teléfonos no coinciden.');
            return;
        }
    } catch (\Exception $e) {
        session()->flash('error', 'Hubo un problema al registrar el usuario. Intenta de nuevo.');
    }
        $direccion = $this->region . ', ' . $this->comuna . ', ' . $this->calle . ' ' . $this->numero_direccion;

        try {

            $user = User::create([
                'name' => $this->name,
                'role_id' => $role_id,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'location' => $direccion,
                'role_id' => $this->tipo_usuario
            ]);
    

            auth()->login($user);
            return redirect('/dashboard');
        } catch (\Exception $e) {

            session()->flash('error', 'Hubo un problema al registrar el usuario. Intenta de nuevo.');
        }
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
