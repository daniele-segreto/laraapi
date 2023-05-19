<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // ELENCARE GLI UTENTI:
    public function index()
    {
        return ['name' => 'Daniele'];
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
    public function show(User $user)
    {
        //
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
