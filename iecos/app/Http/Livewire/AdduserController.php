<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class AddUserController extends Component
{
    public $user;
    public $password;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    public function mount()
    {
        $this->user = [
            'name' => '',
            'email' => '',
          
        ];
    }
    

    public function render()
    {
        $roles= DB::table('roles')->get();
        
        return view('admin.adduser')->with('users', $roles); 
    }
    public function save()
    {
        $data = $this->validate([
            'user.name' => 'required',
            'user.email' => 'required|email',
            'user.role_id' => 'required',
            'user.rut' => 'required', 
            'password' => 'required|min:6',
        ], [
            'user.name.required' => 'El campo de nombre es obligatorio.',
            'user.email.required' => 'El campo de email es obligatorio.',
            'user.role_id.required' => 'El campo de role es obligatorio.',
            'password.required' => 'El campo de password es obligatorio.',
             
        ]);
    
        $user = new User();
        $user->name = $data['user']['name'];
        $user->email = $data['user']['email'];
        $user->role_id = $data['user']['role_id'];
      
        $user->password = bcrypt($data['password']); 
        $user->save();
    
        // Redirige a la vista de usuarios
        return Redirect::route('user');
    }










}
