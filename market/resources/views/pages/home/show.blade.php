@extends('layout.master-2')

@section('content')


<div class="container">
  <div>
    <div class="bubble bubble1">
      <img src="{{asset('images/apple.png')}}" alt="Tomate">
    </div>
    <div class="bubble bubble2">
      <img src="{{asset('images/auber.png')}}" alt="Carotte">
    </div>
    <div class="bubble bubble3">
      <img src="{{asset('images/pim.png')}}" alt="Courgette">
    </div>
    <div class="bubble bubble4">
      <img src="{{asset('images/poivron.png')}}" alt="Oignon">
    </div>
    <div class="bubble bubble5">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble6">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble7">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble8">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble9">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble10">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble11">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble12">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble13">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble14">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble15">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble16">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble17">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble18">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble19">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
    <div class="bubble bubble20">
      <img src="{{asset('images/apple.jpg')}}" alt="Poivron">
    </div>
  </div>
  <div class="silder"></div>
  <div>
    <div class="card-item" style="margin-left:-30rem ;margin-top:20rem;">
      <p>
        <span class="h2">Jour de Marché Chaque Mardi</span><br>
        "Commandez en ligne, recevez chez vous ou retirez en magasin. Facile et sécurisé"
        <span class="mt-4">
          <a href="{{route('Site-AboutGetShow')}}" class="btn btn-danger">Vistez <strong>Mon Marché</strong> et Commandez</a>
        </span>
      </p>
    </div>
  </div> 
</div>


@endsection