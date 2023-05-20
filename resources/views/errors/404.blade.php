@extends('errors::minimal')
{{-- PER MOSTRARE LA IL MESSAGGIO DI ERRORE (non è necessario farlo).
    1) La variabile "$exception" presumibilmente contiene un oggetto che rappresenta l'eccezione;
    2) Il metodo "getMessage()" viene chiamato su quell'oggetto per ottenere il messaggio di errore associato all'eccezione. --}}
{{-- {{$exception->getMessage()}} --}}
{{-- QUANDO ANDIAMO SU 'http://127.0.0.1:8000/users/1999' CI DICE COSA STA SUCCEDENDO. --}}
@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
