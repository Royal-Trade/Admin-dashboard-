<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember_me = false;
    public $redirectTo; // Change this line to public

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required|min:6',
    ];

    public function mount()
    {
        if (auth()->user()) {
            return redirect()->intended('/dashboard');
        }
        $this->fill([
            'email' => 'admin@gmail.com',
            'password' => 'secret',
        ]);
    }

    public function redirectTo()
    {
        switch (Auth::user()->role) {
            case 1:
                $this->redirectTo = '/admin';
                return $this->redirectTo;
            case 2:
                $this->redirectTo = '/user';
                return $this->redirectTo;
            default:
                $this->redirectTo = '/dashboard'; //if user doesn't have any role
                return $this->redirectTo;
        }
    }

    public function login()
    {
        $credentials = $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(['email' => $this->email])->first();
            auth()->login($user, $this->remember_me);
            return redirect()->intended($this->redirectTo()); // Update this line to use redirectTo method
        } else {
            return $this->addError('email', trans('auth.failed'));
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
