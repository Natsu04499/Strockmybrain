@extends('components.layout')
@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: linear-gradient(to right, #000428, #004e92);
    }

    .header {
        display: none; /* Cacher le header */
    }

    .wrapper {
        background: #fff;
        padding: 40px 25px; /* Ajuster les marges internes */
        border-radius: 5px;
        max-width: 800px; /* Ajuster la largeur */
        margin: 0 auto;
        box-shadow: 0px 20px 50px rgba(0, 0, 0, 0.5);
        margin-top: 20px;
    }

    .wrapper .title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #000428;
        text-transform: uppercase;
    }

    /* ... styles restants ... */

</style>

<div class="wrapper">

    <form method="POST" action="/echrif.rayan/createtask/{{ $workspace->id }}">
        @csrf
        <input type="text" name="name" placeholder="Nom de la tâche">
        <input type="text" name="description" placeholder="Déscription de la tâche" size="20" maxlength="30">

        <input type="date" name="due_date" placeholder="Date limite">

        <select name="importance">
            <option selected disabled>--Choisissez l'importance de la tâche'--</option>
            <option value="Pas Urgent">Pas urgent</option>
            <option value="Peu Urgent">Peu urgent</option>
            <option value="Urgence">Urgent</option>
            <option value="Urgence modéré">Très urgent</option>
            <option value="Urgence prioritaire">À faire en priorité !</option>
        </select>

        <input type="submit" name='sub' value="Enregistrer">
    </form>

    <br> <!-- Ajout d'un espace -->

    <h3 class="workspaces-heading">Vos tâches</h3>

    @foreach ($workspace->tasks as $task)
        <br>
        <div>
            <b>Nom de la tache :</b> {{$task->name}} <br>
            <b>Description :</b> {{$task->description}} <br>
            <b>Importance :</b> {{$task->importance}} <br>
            <b>Créateur :</b> {{$task->creator}} <br>
            <b>Date :</b> {{$task->created_at}} <br>
            <b>Date limite :</b> {{$task->due_date}} <br>
            <b>Etat :</b> {{$task->status}} <br>
        </div>

        @foreach ($connectedUser->workspaces as $u)
            {{-- Si l'utilisateur est propriétaire du tableau, il aura une option en plus dans le menu déroulant --}}
            @if($u->pivot->ownership == 1)
                <form method="POST" action="/echrif.rayan/changetaskstatus/{{ $task["id"] }}">
                    @csrf
                    <select name="taskStatus">
                        <option selected disabled>--Choisissez l'etat de la tâche--</option>
                        <option value="Non Fait">Non Fait</option>
                        <option value="En Cours">En Cours</option>
                        <option value="Terminé (Non Vérifié)">Terminé (Non Vérifié)</option>
                        <option value="Terminé (Vérifié)">Terminé (Vérifié)</option>
                    </select>
                    <input type="submit" name='sub' value="Enregistrer">
                </form>
            @else
                <form method="POST" action="/echrif.rayan/changetaskstatus/{{ $task["id"] }}">
                    @csrf
                    <select name="taskStatus">
                        <option selected disabled>--Choisissez l'etat de la tâche--</option>
                        <option value="Non Fait">Non Fait</option>
                        <option value="En Cours">En Cours</option>
                        <option value="Terminé (Non Vérifié)">Terminé (Non Vérifié)</option>
                    </select>
                    <input type="submit" name='sub' value="Enregistrer">
                </form>
            @endif
        @endforeach

        <form action="/echrif.rayan/edittask/{{$task["id"]}}" method="GET">
            @csrf
            <button type="submit" class="">Modifier la tâche</button>
        </form>

        <form action="/echrif.rayan/deletetask/{{$task["id"]}}" method="POST">
            @csrf
            <button type="submit" class="">Supprimer la tâche</button>
        </form>

        <br>
        <br>
    @endforeach

</div>
@endsection
