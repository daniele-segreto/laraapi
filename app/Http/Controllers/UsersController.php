<?php

namespace App\Http\Controllers;

use App\Models\User; // IMPORTO USER (dovrebbe farlo automaticamente)
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // ELENCARE GLI UTENTI:
    // -----------------------------------------------------
    // => Metodo 1]
    // public function index()
    // {
    //     return User::all(); // Per ritornare all'elenco degli utenti
    // }
    // -----------------------------------------------------
    // => Metodo 2]
    public function index()
    {
        $res = [ // Creazione di un array $res con due chiavi iniziali
            'data' => [], // Chiave "data" inizializzata con un array vuoto
            'message' => '' // Chiave "message" inizializzata con una stringa vuota
        ];

        try {
            $res['data'] = User::all(); // Tentativo di ottenere tutti gli utenti dal modello User
        } catch (\Exception $e) { // Cattura di un'eccezione di tipo generico (\Exception)
            $res['message'] = $e->getMessage(); // Se viene generata un'eccezione, viene assegnato il messaggio di errore a $res['message']
        }

        return $res; // Restituisce l'array $res
    }


    // CREAZIONE DELLA RISORSA:
    public function create()
    {
        //
    }

    // SALVARE I DATI QUANDO CREIAMO UNA RISORSA:
    public function store(Request $request)
    {
        //
    }

    // MOSTRARE UN UTENTE/LEGGERE IL DETTAGLIO DI UN UTENTE:
    // - è il metodo che viene utilizzato quando facciamo una chiamate get();
    // - Laravel automaticamente, ci trasforma il parametro che passiamo '$user', in una istanza della classe 'User'
    // -----------------------------------------------------
    // => Metodo 1]
    // public function show(User $user)
    // {
    //     return $user; // se verifichiamo su 'http://127.0.0.1:8000/users/1', avremo i dati dell'utente
    // }
    // -----------------------------------------------------
    // => Metodo 2]
    // public function show($user) // non (User $user)
    // {
    //     return User::findOrFail($user);
    // }
    // -----------------------------------------------------
    // => Metodo 3] - Customizzando il messaggio di errore:
    public function show($user) // Metodo "show" che accetta un parametro $user, non (User $user)
    {
        $res = [ // Creazione di un array $res con due chiavi iniziali
            'data' => [], // Chiave "data" inizializzata con un array vuoto
            'message' => '' // Chiave "message" inizializzata con una stringa vuota
        ];

        try {
            $res['data'] = User::findOrFail($user); // Tentativo di trovare un'istanza di User corrispondente all'ID fornito
        } catch (\Exception $e) { // Cattura di un'eccezione di tipo generico (\Exception)
            $res['message'] = $e->getMessage(); // Se viene generata un'eccezione, viene assegnato il messaggio di errore a $res['message']
            // $res['message'] = 'Messaggio di Errore'; // Nel caso in cui voglio customizzare l'errore
        }

        return $res; // Restituisce l'array $res
    }

    // QUANDO VOGLIAMO MOSTRARE UN FORM (CON DELLE CHIAMATE API NON SERVE, IL FORM SAREBBE LATO ANGULAR):
    public function edit(User $user)
    {
        //
    }

    // PER AGGIORNARE I DATI:
    public function update(Request $request, User $user)
    {
        //
    }

    // PER ELIMINARE L'UTENTE:
    public function destroy(User $user)
    {
        //
    }
}
