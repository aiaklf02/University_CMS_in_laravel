<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    //

        function afficherForm($idmodule){
        $etudiants=Etudiant::where('classes_id',$idmodule)->get();
            return view('Auth/MesClasses/MesNotes',compact('etudiants','idmodule'));
        }

        function CC1($idEtudiant,$idModule,$Note) {

            $existingNote = Notes::where('etudiants_id', $idEtudiant)
                                    ->where('modules_id', $idModule)
                                    ->first();

            if ($existingNote) {

            // If the record exists, update the note
                $existingNote->update(['CC1' => $Note]);
                $response = ['status' => 'ok', 'message' => 'Note updated successfully'];
            } else {

            // If the record doesn't exist, create a new one
            Notes::create([
                'etudiants_id' => $idEtudiant,
                'modules_id' => $idModule,
                'CC1' => $Note,
                ]);

            $response = ['status' => 'ok', 'message' => 'Note created successfully'];
            }

            // Return the response as JSON
            return response()->json($response);

        }

        function CC2($idEtudiant,$idModule,$Note) {

            $existingNote = Notes::where('etudiants_id', $idEtudiant)
                                    ->where('modules_id', $idModule)
                                    ->first();

            if ($existingNote) {

            // If the record exists, update the note
                $existingNote->update(['CC2' => $Note]);
                $response = ['status' => 'ok', 'message' => 'Note updated successfully'];
            } else {

            // If the record doesn't exist, create a new one
            Notes::create([
                'etudiants_id' => $idEtudiant,
                'modules_id' => $idModule,
                'CC2' => $Note,
                ]);

            $response = ['status' => 'ok', 'message' => 'Note created successfully'];
            }

            // Return the response as JSON
            return response()->json($response);

        }
        function RATT($idEtudiant,$idModule,$Note) {

            $existingNote = Notes::where('etudiants_id', $idEtudiant)
                                    ->where('modules_id', $idModule)
                                    ->first();

            if ($existingNote) {

            // If the record exists, update the note
                $existingNote->update(['Ratt' => $Note]);
                $response = ['status' => 'ok', 'message' => 'Note updated successfully'];
            } else {

            // If the record doesn't exist, create a new one
            Notes::create([
                'etudiants_id' => $idEtudiant,
                'modules_id' => $idModule,
                'Ratt' => $Note,
                ]);

            $response = ['status' => 'ok', 'message' => 'Note created successfully'];
            }

            // Return the response as JSON
            return response()->json($response);

        }




}


