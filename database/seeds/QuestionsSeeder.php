<?php

use Illuminate\Database\Seeder;
use App\questions;
use App\QuestionDetails;
use App\Locale;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $en = Locale::create([
            "country" => "USA",
            "language" => "en"
        ]);
        $ny = Locale::create([
            "country" => "MW",
            "language" => "ny"
        ]);

        for ($i = 0; $i < 5; $i++) {
            $qust = questions::create([
                "type" => 224,
                "choiceSize" => 6
            ]);
            QuestionDetails::create([
                "question_id" => $qust->id,
                "question" => "Are you experiencing any of the following symptoms?",
                "subtitle" => "Select all that apply",
                "locale_id" => $en->id,
                "answers" => json_encode([
                    "Difficulty breathing (e.g. unable to finish sentences because of your breathing, short of breath at rest, unable to lie down because of difficulty breathing)",
                    "Chest pain",
                    " Having a very hard time waking up",
                    "Fainted or lost consciousness",
                    "Difficulty managing your daily life because of breathing difficulties",
                    " Loss of smell",
                    "Loss of speech or movement"
                ]),
            ]);
            QuestionDetails::create([
                "question_id" => $qust->id,
                "locale_id" => $ny->id,
                "subtitle" => "Sankhani zonse zoyenela",
                "question" => "Kodi mukuwonetsa zizindikiro zotsatirazi?",
                "answers" => json_encode([
                    "Kubanika popuma (mwachitsanzo kukanika kumaliza zaganizo chifukwa cha kapumidwe, kukanika kupuma kukakhala, kukanika kugona chifukwa chbanika popuma)",
                    "Kupweteka pa mtima",
                    "kuvutika mukamadzuka ",
                    "kukomoka kapena",
                    " kulephera kukwanitsa ntchito za tsiku ndi tsiku chifukwa cholephera kupuma ",
                    "kukanika kumva  pfungo",
                    "kulephera kuyankhula kapena kuyenda"
                ])
            ]);
        }
    }
}
