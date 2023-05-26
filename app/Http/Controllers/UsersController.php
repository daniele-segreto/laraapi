<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // ELENCARE GLI UTENTI:
    public function index()
    {
        $res = [
            'data' => [],
            'message' => '',
            'success' => true
        ];

        try {
            $res['data'] = User::all();
        } catch (Exception $e) {
            $res['message'] = $e->getMessage();
            $res['success'] = false;
        }

        return $res;
    }


    // CREAZIONE DELLA RISORSA:
    public function create()
    {
        //
    }

    // SALVARE I DATI QUANDO CREIAMO UNA RISORSA (UN NUOVO UTENTE):
    public function store(Request $request)
    {
        // Inizializzazione della risposta di default
        $res = [
            'data' => [],
            'message' => 'User Created',
            'success' => true
        ];
        try {
            // Prendi tutti i dati dalla richiesta, escludendo 'id' (perchè l'id viene autogenerato)
            $userData = $request->except('id');

            // Creazione di un nuovo utente
            $user = new User();

            // Si possono assegnare i valori manualmente se ci sono pochi dati
            // $user->name = $request->input('');
            // $user->phone = $request->input('phone');

            // Altrimenti, utilizziamo 'fill' quando ci sono molti dati, passando l'array dei dati letti dalla '$request'
            $user->fill($userData);

            // Salvataggio dell'utente nel database
            $user->save();

            // Aggiornamento della risposta con i dati dell'utente salvato
            $res = [
                'data' => $user,
            ];
        // Gestione dell'eccezione se si verifica un errore
        } catch (\Exception $e) {
            [
                'message' => $e->getMessage(),
                'success' => false
            ];
        }
        // Restituzione della risposta
        return $res;
    }

    // MOSTRARE UN UTENTE/LEGGERE IL DETTAGLIO DI UN UTENTE:
    public function show($user)
    {
        $res = [
            'data' => [],
            'message' => '',
            'success' => true
        ];

        try {
            $res['data'] = User::findOrFail($user);
        } catch (\Exception $e) {
            $res['message'] = $e->getMessage();
            $res['success'] = false;
        }

        return $res;
    }

    // QUANDO VOGLIAMO MOSTRARE UN FORM (CON DELLE CHIAMATE API NON SERVE, IL FORM SAREBBE LATO ANGULAR):
    public function edit(User $user)
    {
        //
    }

    // PER AGGIORNARE I DATI:
    public function update(Request $request, int $user)
    {
        $data = $request->except(['id']);

        $res = [
            'data' => null,
            'message' => '',
            'success' => true
        ];

        try {
            $User = User::findOrFail($user);
            $User->update($data);
            $res['data'] = $User;
        } catch (\Exception $e) {
            $res['success'] = false;
            $res['message'] = $e->getMessage();
        }
        return $res;
    }

    // PER ELIMINARE L'UTENTE:
    public function destroy(User $user)
    {
        //
    }
}
