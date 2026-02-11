<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirect(string $provider)
    {
        $this->validateProvider($provider);
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        $this->validateProvider($provider);

        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Gagal login dengan ' . ucfirst($provider) . '. Silakan coba lagi.');
        }

        $user = User::where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        if (!$user) {
            // Cek apakah email sudah terdaftar
            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                // Update provider info
                $user->update([
                    'provider'    => $provider,
                    'provider_id' => $socialUser->getId(),
                    'avatar'      => $socialUser->getAvatar(),
                ]);
            } else {
                // Buat user baru
                $user = User::create([
                    'name'        => $socialUser->getName() ?? $socialUser->getNickname(),
                    'email'       => $socialUser->getEmail(),
                    'provider'    => $provider,
                    'provider_id' => $socialUser->getId(),
                    'avatar'      => $socialUser->getAvatar(),
                    'password'    => null,
                    'role'        => 'user',
                ]);
            }
        }

        Auth::login($user, true);

        return redirect()->route('dashboard')
            ->with('success', 'Berhasil login dengan ' . ucfirst($provider) . '!');
    }

    private function validateProvider(string $provider): void
    {
        if (!in_array($provider, ['google', 'github'])) {
            abort(404);
        }
    }
}
