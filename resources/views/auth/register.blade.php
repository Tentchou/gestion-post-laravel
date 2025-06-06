
<x-auth-layout title="inscription" :action="route('register')" submitMessage="Inscription">

   <x-input name="name" label="nom complet"/>
   <x-input name="email" label="adresse email" type="email"/>
   <x-input name="password" label="mot de passe" type="password"/>
   <x-input name="password_confirmation" label="confirmation du mot de passe" type="password"/>

</x-auth-layout>
