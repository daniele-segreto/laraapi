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
            'data' => [], // Inizializza l'array per contenere i dati degli utenti
            'message' => '', // Messaggio di errore o successo
            'success' => true // Flag per indicare se l'operazione è riuscita o meno
        ];

        try {
            $res['data'] = User::orderBy('id','DESC')->get(); // Ottiene tutti gli utenti ordinati per ID in ordine decrescente
        } catch (Exception $e) {
            $res['message'] = $e->getMessage(); // Imposta il messaggio di errore
            $res['success'] = false; // Imposta il flag di successo a false
        }

        return $res; // Restituisce il risultato
    }

    // CREAZIONE DELLA RISORSA:
    public function create()
    {
        //
    }

    // SALVARE I DATI QUANDO CREIAMO UNA RISORSA (UN NUOVO UTENTE):
    public function store(Request $request)
    {
        $res = [
            'data' => [], // Inizializza l'array per contenere i dati dell'utente
            'message' => 'User Created', // Messaggio di successo
            'success' => true // Flag per indicare se l'operazione è riuscita o meno
        ];
        try {
            $userData = $request->except('id'); // Ottiene i dati dalla richiesta, escludendo l'ID
            $userData['password'] =  $userData['password'] ?? 'dededede'; // Imposta una password di default se non fornita /////// <---
            $userData['password'] =\Hash::make($userData['password'] ); // Hash della password
            $user = new User(); // Crea una nuova istanza di User
            /*  $user->name = $request->input('name');
                $user->phone = $request->input('phone'); */
            $user->fill($userData); // Assegna i dati all'istanza dell'utente
            $user->save(); // Salva l'utente nel database
            $res['data'] = $user; // Assegna l'utente creato al campo 'data' della risposta /////// <---

        } catch (\Exception $e) {
            [
                'data' => [], // Nessun dato dell'utente /////// <---
                'message' => $e->getMessage(), // Messaggio di errore
                'success' => false // Imposta il flag di successo a false
            ];
        }
        return $res; // Restituisce il risultato
    }

    // MOSTRARE UN UTENTE/LEGGERE IL DETTAGLIO DI UN UTENTE:
    public function show($user)
    {
        $res = [
            'data' => [], // Inizializza l'array per contenere i dati dell'utente
            'message' => '', // Messaggio di errore o successo
            'success' => true // Flag per indicare se l'operazione è riuscita o meno
        ];

        try {
            $res['data'] = User::findOrFail($user); // Trova l'utente per ID
        } catch (\Exception $e) {
            $res['message'] = $e->getMessage(); // Imposta il messaggio di errore
            $res['success'] = false; // Imposta il flag di successo a false
        }

        return $res; // Restituisce il risultato
    }

    // QUANDO VOGLIAMO MOSTRARE UN FORM (CON DELLE CHIAMATE API NON SERVE, IL FORM SAREBBE LATO ANGULAR):
    public function edit(User $user)
    {
        //
    }

    // PER AGGIORNARE I DATI:
    public function update(Request $request, int $user)
    {
        $data = $request->except(['id']); // Ottiene i dati dalla richiesta, escludendo l'ID

        $res = [
            'data' => null, // Dato dell'utente aggiornato
            'message' => '', // Messaggio di errore o successo
            'success' => true // Flag per indicare se l'operazione è riuscita o meno
        ];

        try {
            $data['password'] = 'dededede'; // Imposta una password di default ///////
            $User = User::findOrFail($user); // Trova l'utente per ID
            $data['password'] = \Hash::make($data['password']); // Hash della password ///////
            $User->update($data); // Aggiorna i dati dell'utente
            $res['data'] = $User; // Assegna l'utente aggiornato al campo 'data' della risposta
            $res['message'] = 'User updated!'; // Messaggio di successo ///////
        } catch (\Exception $e) {
            $res['success'] = false; // Imposta il flag di successo a false
            $res['message'] = $e->getMessage(); // Messaggio di errore
        }
        return $res; // Restituisce il risultato
    }

    // PER ELIMINARE L'UTENTE:
    public function destroy(User $user)
    {
        $res = [
            'data' => $user, // Dati dell'utente da eliminare
            'message' => 'User ' . $user->id . ' delete', // Messaggio di successo
            'success' => true // Flag per indicare se l'operazione è riuscita o meno
        ];
        try {
            $res['success'] = $user->delete(); // Elimina l'utente dal database
            if (!$res['success']) {
                $res['message'] = 'Could not delete $user ' + $user->id; // Messaggio di errore se non è stato possibile eliminare l'utente
            }
        } catch (\Exception $e) {
            $res['success'] = false; // Imposta il flag di successo a false
            $res['message'] = $e->getMessage(); // Messaggio di errore
        }
        return $res; // Restituisce il risultato
    }
}
