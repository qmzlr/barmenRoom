<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
   /**
    * Display the registration view.
    */
   public function create(): View
   {
      return view('auth.register');
   }

   /**
    * Handle an incoming registration request.
    *
    * @throws \Illuminate\Validation\ValidationException
    */
   public function store(Request $request): RedirectResponse
   {
      $request->validate([
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
         'password' => ['required', 'confirmed', Rules\Password::defaults()],
         'phone' => ['required', 'string', 'max:20', 'unique:' . User::class, 'regex:/^(\+7|8)\d{10}$/'],
         'date_of_birth' => ['required', 'date', 'after:01-01-1900', 'before:today-18years'],
      ], ['password.confirmed' => 'Пароли не совпадают',
         'date_of_birth.after' => 'Дата рождения не может быть раньше 01-01-1900',
         'date_of_birth.before:today-18years' => 'Пользователь должен быть старше 18 лет',
         'phone.unique' => 'Пользователь с таким номером телефона уже зарегистрирован',
         'email.unique' => 'Пользователь с такой почтой уже зарегистрирован',
         'date_of_birth.before' => 'Дата рождения не может быть в будущем']);


      $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'phone' => $request->phone,
         'date_of_birth' => $request->date_of_birth
      ]);

      event(new Registered($user));

      Auth::login($user);

      return redirect(RouteServiceProvider::HOME);
   }
}
