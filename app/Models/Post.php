<?php

namespace App\Models;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Categorie;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    //indication des champs proteges
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $with = [

        'category',
        'tags'
    ];

    //creer notre propre lien de pagination
    // public function links(){
    //     return Paginator::links();
    // }

    public function getRouteKeyName():string{
        return 'slug';
    }

    //factorisation des filters ou des requetes de recherche
    public function scopeFilters(Builder $query, array $filters){

         if(isset($filters['search'])){

            $query->where(fn (Builder $query)=>$query->where('title', 'LIKE', '%'.$filters['search'].'%')
                ->orwhere('content', 'LIKE', '%'.$filters['search'].'%')
           );
         }

         if(isset($filters['category'])){
            $query->where(
                'category_id',$filters['category']->id ?? $filters['category']
            );
         }

         if(isset($filters['tag'])){
            $query->whereRelation(
                'tags','tags.id',$filters['tag']->id ?? $filters['tag']
            );
         }
    }

    public function exists(): bool
    {
        return (bool) $this->id;
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function tags():BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }

    public function Comments(){
        return $this->hasMany(Comment::class)->latest();
    }

}
