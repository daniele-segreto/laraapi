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
            'success' => true // l'avevo dimenticato
        ];

        try {
            $res['data'] = User::all();
        } catch (Exception $e) {
            $res['message'] = $e->getMessage();
            $res['success'] = false; // l'avevo dimenticato
        }

        return $res;
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
    public function show($user)
    {
        $res = [
            'data' => [],
            'message' => '',
            'success' => true // l'avevo dimenticato
        ];

        try {
            $res['data'] = User::findOrFail($user);
        } catch (\Exception $e) {
            $res['message'] = $e->getMessage();
            $res['success'] = false; // l'avevo dimenticato
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
        // DAMMI SOLO I CAMPI CHE VOGLIO PRENDERE:
        // $data = $request->only(['password', 'phone', 'province', 'age', 'lastname'])

        // DAMMI TUTTI I CAMPI CHE VENGONO PASSATI, ECCETTO QUESTO DATI (NON VOGLIAMO SOVRASCRIVERE L'ID):
        $data = $request->except(['id']);

        // INIZIALIZZO I DATI DI DEFAULT:
        $res = [
            'data' => null,
            'message' => '',
            'success' => true
        ];
        // SE E' TUTTO OK:
        try {
            // IL NOSTRO UTENTE '$User' E' UGUALE AL NOSTRO MODELLO 'User', 'findOrFail()'VIENE UTILIZZATO PER CERCARE UN RECORD NEL DATABASE IN BASE AL SUO ID E RESTITUIRLO:
            $User = User::findOrFail($user);
            // CON UPDATE PASSO A '$User' I DATI CHE MI INTERESSANO (CIOE' I DATI CHE SONO DENTRO LA VARIABILE $data)
            // LARAVEL MAPPERA' AUTOMATICAMENTE CHIAVI E VALORI CON L'AGGIORNAMENTO DEL RECORD
            $User->update($data);
            // METTIAMO NELLA RESPONSE, IN 'data', IL VALORE DELLA VARIABILE '$User', IN MODO DA AVERE I NUOVI VALORI DI 'User'
            $res['data'] = $User;
        // IN CASO DI ERRORE (SE LA RISORSA NON SI TROVA):
        } catch (\Exception $e) {
            $res['success'] = false; // la risposta sarà false
            $res['message'] = $e->getMessage(); // avremo il messaggio di errore
        }
        return $res; // ritorniamo la variabile '$res' (la risposta)
    }

    // PER ELIMINARE L'UTENTE:
    public function destroy(User $user)
    {
        //
    }
}
