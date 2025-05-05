@extends('layout.master-2')

@section('content')


<div class="hero">
     
    <h1 class="text-white">Bienvenue dans notre Boutique de Légumes Frais</h1>
</div> 
<a href="{{route('Site-SettingGetShow')}}" class="btn btn-danger ms-5" data-mdb-ripple-init>Retour</a>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif 
<div class="container d-flex justify-content-center"> 
  
    <form class="form" method="POST" action="{{route('Site-RegisterPostStore')}}" enctype="multipart/form-data">
       @csrf

        <p id="heading">S'enregister</p>
        <div class="field">
          
        <label class="custum-file-upload" for="file">
        <div class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
        </div>
        <div class="text">
          <span>Cliquez pour télécharger l'image</span>
          </div>
          <input type="file" name="image" id="file" required>
        </label>

        </div>
        <br>
        <div class="field">
          <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person input-icon" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a5.53 5.53 0 0 0-4.776 2.468C3.23 12.281 4.648 13 8 13s4.77-.719 4.776-1.532A5.53 5.53 0 0 0 8 9z"/>
          </svg>
          <input autocomplete="off" placeholder="Nom & Prenom" name="name" class="input-field" type="text">
        </div>
        <div class="field">
          <svg class="input-icon"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
          </svg>
          <input placeholder="Email" name="email" class="input-field" type="email">
        </div>
        <div class="field">
          <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
        </svg>
          <input placeholder="Mot de Passe" name="password" class="input-field" type="password">
        </div>
        <div class="field">
          <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
            <path d="M6.5 2a.5.5 0 0 1 .5.5V3h2v-.5a.5.5 0 0 1 1 0V3h.5A1.5 1.5 0 0 1 12 4.5v6A1.5 1.5 0 0 1 10.5 12H5.5A1.5 1.5 0 0 1 4 10.5v-6A1.5 1.5 0 0 1 5.5 3H6v-.5a.5.5 0 0 1 .5-.5zM5 4.5v6A.5.5 0 0 0 5.5 11h5a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5zm3 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-3 2c0-1 2-1 2-1s2 0 2 1-2 1-2 1-2 0-2-1z"/>
          </svg>          
          <select name="role" class="input-field">
              <option value="" disabled selected>Choisissez un rôle</option>
              <option value="guest">Invité</option>
              <option value="seller">Vendeur</option>
              <option value="customer">Client</option>
          </select>
        </div>
        <div class="field">
          <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
            <path d="M3.654 1.328a.678.678 0 0 1 .789-.283l2.7 1a.678.678 0 0 1 .39.574l.018 2.013a.678.678 0 0 1-.22.49l-1.065.925c.213.83.52 1.63.92 2.385.245.45.52.872.818 1.264l.91-.31a.678.678 0 0 1 .507.034l2.013.992a.678.678 0 0 1 .34.574l-.001 2.705a.678.678 0 0 1-.675.678A13.533 13.533 0 0 1 1.234 2.003a.678.678 0 0 1 .42-.675l2.7-1z"/>
          </svg>          
          <input placeholder="Téléphone" name="phone" class="input-field" type="text">
        </div>
        <div class="field">
          <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
            <path d="M8.5.5a.5.5 0 0 0-1 0v1.98a4.5 4.5 0 1 0 2.582 8.177l.743.742c.89.89 2.035.945 2.642.64.606-.304.916-1.004.916-1.89V7.207c0-.42-.336-.743-.75-.743H9.707a.5.5 0 0 0 0 1h2.742v4.942c0 .49-.152.806-.34.908-.188.103-.548.119-1.015-.348l-.734-.734A4.5 4.5 0 0 0 8.5 2.48V.5ZM8 13a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z"/>
          </svg>
          <select name="gender" class="input-field">
              <option value="" disabled selected>Choisissez votre genre</option>
              <option value="male">Homme</option>
              <option value="female">Femme</option>
          </select>
        </div>
        <div class="btn">
        {{-- <button class="button1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> --}}
        <a href="{{route('login')}}" class="button2">Vous avez un Compte? Connectez-vous</a>
        </div>
        <button type="submit" class="button3">Enregistrer</button>
    </form>
  
  </div>



@endsection