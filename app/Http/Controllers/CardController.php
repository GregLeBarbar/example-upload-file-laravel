<?php

namespace App\Http\Controllers;

use App\Models\Card;

class CardController extends Controller
{
    // Affiche une carte
    public function getCard()
    {
        // Récupère la carte dont l'id est dans l'URL
        $card = Card::findOrFail(request()->route('cardId'));

        // Récupérer le nom du fichier à partir du path
        $filename = last(explode('/', $card->imagePath));

        // Affiche les détails de l'enseignant
        return view('card/get-card', [
            'card' => $card,
            'filename' => $filename
        ]);
    }

    // Gestion de l'ajout d'une carte
    // Soit un HTTP POST pour ajouter la carte
    // Soit un HTTP GET pour afficher le formulaire
    public function add()
    {
        if (request()->isMethod('post')) {

            // Validation des données
            $validatedData = request()->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            // Récupération des données depuis l'objet Resquest
            $imageName = request()->file('image')->getClientOriginalName();

            // Sauvegarde de l'image dans storage/app/public/images
            $imagePath = request()->file('image')->store('public/images');

            // Instancie le modèle Card
            $card = new Card;

            // Enregistrement des données en BD
            $card->imageName = $imageName;
            $card->imagePath = $imagePath;
            $card->save();

            // Redirection vers la vue qui affiche la carte qui vient d'être ajoutée
            return redirect()->route('get.card', ['cardId' => $card->id])->with('status', "L'image a été ajoutée avec succès !");
        } else {

            $cards = Card::all();

            // Affichage du formulaire 
            return view('card/add-card', [
                'cards' => $cards
            ]);
        }
    }
}
