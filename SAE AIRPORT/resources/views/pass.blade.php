
@extends('layout')

@section('title', 'Page d\'accueil')

@section('content')
    <h1>Informations sur le Pass</h1>
    <p>Contenu de la page Pass</p>
    <a href="{{ route('accueil') }}">Retour à l'accueil</a>
@endsection
