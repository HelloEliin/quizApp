<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('questions', function () {

    $countCategories = [
        "Film & TV" => [], "Historia" => [], "Musik" => [],
        "Geografi" => [], "Övrigt" => [], "Vetenskap" => [], "Sport" => []
    ];


    $jsonfile = file_get_contents("questions.json");
    $jsonData = json_decode($jsonfile, true);


    $questions = [];

    while (count($questions) < 35){


        $randomNumber = rand(0, (count($jsonData) - 1));

        if (in_array($jsonData[$randomNumber], $questions)) {
            continue;
         }

         $category = $jsonData[$randomNumber]["category"];


        if (count($countCategories["Film & TV"]) < 5 && $category === "Film & TV") {
            array_push($countCategories["Film & TV"], 1);
        } 
        elseif (count($countCategories["Film & TV"]) >= 5 && $category === "Film & TV") {
            continue;
        }

        if (count($countCategories["Musik"]) < 5 && $category === "Musik") {
            array_push($countCategories["Musik"], 1);
        } 
        elseif (count($countCategories["Musik"]) >= 5 && $category === "Musik") {
            continue;
        }

        if (count($countCategories["Historia"]) < 5 && $category === "Historia") {
            array_push($countCategories["Historia"], 1);
        } 
        elseif (count($countCategories["Historia"]) >= 5 && $category === "Historia") {
            continue;
        }

        if (count($countCategories["Övrigt"]) < 5 && $category === "Övrigt") {
            array_push($countCategories["Övrigt"], 1);
        } 
        elseif (count($countCategories["Övrigt"]) >= 5 && $category === "Övrigt") {
            continue;
        }

        if (count($countCategories["Vetenskap"]) < 5 && $category === "Vetenskap") {
            array_push($countCategories["Vetenskap"], 1);
        } 
        elseif (count($countCategories["Vetenskap"]) >= 5 && $category === "Vetenskap") {
            continue;
        }

        if (count($countCategories["Sport"]) < 5 && $category === "Sport") {
            array_push($countCategories["Sport"], 1);
        } elseif (count($countCategories["Sport"]) >= 5 && $category === "Sport") {
            continue;
        }

        if (count($countCategories["Geografi"]) < 5 && $category === "Geografi") {
            array_push($countCategories["Geografi"], 1);
        }elseif (count($countCategories["Geografi"]) >= 5 && $category === "Geografi") {
            continue;
        }

        array_push($questions, $jsonData[$randomNumber]);


    }

       
    

    return response()->json($questions);
    
});
