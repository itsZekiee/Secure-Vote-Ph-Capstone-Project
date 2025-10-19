<?php
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                [
                    'google_id' => $googleUser->id,
                ],
                [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt(str::random(10)), // Placeholder password
                ]
            );

            Auth::login($user);

            return redirect('/dashboard'); // Or wherever you want to redirect
        } catch (\Exception $e) {
            // Handle error
            return redirect('/login')->withErrors(['error' => 'Google login failed.']);
        }
    }
}
