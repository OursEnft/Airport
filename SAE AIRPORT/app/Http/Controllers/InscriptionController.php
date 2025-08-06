<?php

namespace App\Http\Controllers;

use App\Models\UserPub;
use App\Notifications\SubscribeEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InscriptionController extends Controller
{
    public function index()
    {
        return view('inscription'); // Renders the "inscription" view
    }

    public function register(Request $request)
    {
        // Validation des champs
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users_pub,email',
            'password' => 'required|confirmed|min:8', // confirmation automatique
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }

        // Hashage personnalisé du mot de passe
        $hashedPasswordData = $this->hashPassword($request->password);

        // Création de l'utilisateur dans une transaction
        DB::beginTransaction();

        try {
            // Création de l'utilisateur
            $user = UserPub::create([
                'first_name' => $request->prenom,
                'last_name' => $request->nom,
                'email' => $request->email,
                'password_hash' => $hashedPasswordData['hash'],
                'password_salt' => $hashedPasswordData['salt'],
                'iterations' => $hashedPasswordData['iterations'],
                'created_at' => now(), // Remplissage manuel
                'updated_at' => now(),
                'id_role' => 2, // Par défaut, rôle utilisateur
            ]);

            // Envoi de la notification si nécessaire
            if ($request->has('newsletter')) {
                $user->notify(new SubscribeEmailNotification());
            }

            DB::commit();

            return back()->with('success', "L'utilisateur a été enregistré avec succès !");
        } catch (\Throwable $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            return back()->withInput()->withErrors(['error' => "L'enregistrement a échoué. Réessayez."]);
        }
    }

    private function hashPassword($password)
    {
        $salt = bin2hex(random_bytes(16));
        $iterations = 10000;
        $hash = hash_pbkdf2('sha256', $password, $salt, $iterations, 64);

        return [
            'salt' => $salt,
            'hash' => $hash,
            'iterations' => $iterations,
        ];
    }
}
