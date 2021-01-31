<?php

use Illuminate\Database\Seeder;
use App\questions;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        questions::create([
            "questions_english" => "Are you experiencing any of the following symptoms?",
            "subtitle_english" => "Select all that apply",
            "answers_english" => json_encode([
                "Difficulty breathing (e.g. unable to finish sentences because of your breathing, short of breath at rest, unable to lie down because of difficulty breathing)",
                "Chest pain",
                " Having a very hard time waking up",
                "Fainted or lost consciousness",
                "Difficulty managing your daily life because of breathing difficulties",
                " Loss of smell",
                "Loss of speech or movement"
            ]),
            "subtitle_chichewa" => "Sankhani zonse zoyenela",
            "questions_chichewa" => "Kodi mukuwonetsa zizindikiro zotsatirazi?",
            "type" => 224,
            "answers_chichewa" => json_encode([
                "Kubanika popuma (mwachitsanzo kukanika kumaliza zaganizo chifukwa cha kapumidwe, kukanika kupuma kukakhala, kukanika kugona chifukwa chbanika popuma)",
                "Kupweteka pa mtima",
                "kuvutika mukamadzuka ",
                "kukomoka kapena",
                " kulephera kukwanitsa ntchito za tsiku ndi tsiku chifukwa cholephera kupuma ",
                "kukanika kumva  pfungo",
                "kulephera kuyankhula kapena kuyenda"
            ])
        ]);
        questions::create([
            "questions_english" => "Are you experiencing any of the following symptoms?",
            "subtitle_english" => "Select all that apply",
            "answers_english" => json_encode([
                "Fever",
                "Dry cough",
                "Shortness of breath",
                "Tiredness",
                "Sore throat",
                "Sore throat, muscle aches, runny nose"
            ]),
            "subtitle_chichewa" => "Sankhani zonse zoyenela",
            "questions_chichewa" => "Kodi mukuwonetsa zizindikiro zotsatirazi?",
            "type" => 224,
            "answers_chichewa" => json_encode([
                "Kutentha Thupi",
                "Kutsokomola kopanda makhololo",
                "kubanika popuma",
                "kutopa ",
                " Zilonda za pakhosi",
                "zilonda za pakhosi,kupweteka kwa minyewa, mamina pfuno"
            ])
        ]);
        questions::create([
            "questions_english" => "Have you been outside of Malawi within the last 14 days?",
            "subtitle_english" => "",
            "questions_chichewa" => "Kodi mwakhalapo kunja kwa dziko lino sabata ziwiri zapitazo?",
            "type" => 223,
        ]);
        questions::create([
            "questions_english" => "Have you been in close contact with",
            "subtitle_english" => "",
            "answers_english" => json_encode([
                "someone confirmed to have COVID-19",
                "someone who is being investigated for COVID-19",
                "someone who is symptomatic and has travelled",
                "lab exposure to biological material"
            ]),
            "questions_chichewa" => "kodi mwakhalapo moyandikana ndi awa=>",
            "type" => 226,
            "answers_chichewa" => json_encode([
                "Munthu ammene wapezeka ndi COVID-19",
                "Munthu amene akufufuzidwa za COVID-19",
                "Munthu amene ali ndi zizindikiro komanso kuyenda maulendo",
                "Wokhudzidwa ndi zipangizo za sayansi"
            ])
        ]);
        questions::create([
            "questions_english" => "Are you experiencing any other symptoms apart from the ones mentioned above?",
            "subtitle_english" => "If so, please write it down below",
            "subtitle_chichewa" => "Ngati zili choncho dzilembeni apa",
            "questions_chichewa" => "Kodi mukuwonetsa zizindikiro zina kupatula zomwe zatchulidwa mwambazi?",
            "type" => 225,
        ]);
    }
}
