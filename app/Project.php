<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'label', 'categorie_client', 'proposition_de_valeur','reseau_de_distribition','relation_client','Sources_de_revenu','matiere_premiere','activite_cle','partenaire','liste_de_depense'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
