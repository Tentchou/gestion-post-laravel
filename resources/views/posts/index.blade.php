
<x-default-layout>
            <div class="space-y-10 md:space-y-16">
                {{-- Début du post --}}
                @forelse ($posts as $post )
                  <x-post :$post list/>

                     @empty
                     <p class="text-slate-600 text-center">Aucun resultat avec ce nom ou ce titre</p>
                   
                @endforelse

               {{-- {{ $posts->links() }} --}}
               {{ $posts->links()}}

            </div>
</x-default-layout>