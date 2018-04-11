<?php

use Illuminate\Database\Seeder;
use App\Article;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
          [
            'title' => 'Utveckla konsten',
            'body' => 'Intresset för att utveckla den offentliga konsten är stort. Spännande arbete pågår i stadsutvecklingsprocesser där kommunala, statliga och privata aktörer renoverar och bygger nya områden. Samtidigt arbetar många konstnärer med att omformulera vad den offentliga konsten kan vara. När vi på Statens konstråd producerar konst i gemensamma miljöer utvecklar vi löpande arbetet med konst och gestaltning. I våra pilotprojekt prövar vi nya metoder och olika sätt att arbeta. Projekten utgår oftast från en specifik situation och kan involvera allt från konst i planering, till sociala relationer eller visuella uttryck. Avgörande för utvecklingen är att olika aktörer kan inspirera varandra. Här vill vi därför dela med oss av våra erfarenheter och kunskaper för att stärka konstens roll i utformningen av våra gemensamma miljöer.',
            'author' => 'Simon',
            'media' => 'image.png',
            'role_id' => 1

          ],
          [
            'title' => 'Tillfällig konst',
            'body' => 'Konstnärer söker sig idag ofta till aktuella frågor om det gemensamma och om våra offentliga rum. Genom tillfälliga projekt får vi möjlighet att friare utforska olika format och samtidigt reflektera kring aktuella frågor. Vi utgår från dialogen mellan konstnär och curator och från den situation där verket tar form. Samtidigt fångar vi upp den utveckling som sker inom offentlig konst, både i Sverige och internationellt.',
            'author' => 'Simon',
            'media' => 'image.png',
            'role_id' => 1
          ],
          [
            'title' => 'Hur går det till?',
            'body' => 'Konstnären presenterar ett förslag på gestaltning efter att ha gjort en närmare undersökning av hela situationen, eller så utgår konstnären från en idé som sedan påverkar valet av plats. Alla delar i verket diskuteras med curatorn eller initiativtagaren till projektet. I arbetet med att ta fram en film kan processen till exempel ske i samarbete med boende på platsen. Konstnären tar del av deras berättelser om en situation eller hur de upplever platsen och skriver sedan ett filmmanus utifrån samtalen. Konstnären ansvarar för filminspelningen men utbyter idéer med deltagarna även under klipparbetet. Verket blir i det här fallet relevant genom att ge de boende en röst, en möjlighet att bli hörda.',
            'author' => 'Simon',
            'media' => 'image.png',
            'role_id' => 1
          ],
          [
            'title' => 'Stadsutveckling',
            'body' => 'Vad skapar en stad och dess miljöer? Vi utvecklar metoder för gestaltning av gemensamma miljöer genom samverkan mellan konstnärer, arkitekter, civilsamhälle, kommun och invånare. Genom att samla olika kompetenser kan vi arbeta för miljöer som både möter behov och väcker engagemang och känslor. Våra projekt där konstnärer medverkar i stadsutveckling omfattar allt från processer för medskapande och rätt till de offentliga rummen, till infrastruktur, stadsplanering och gestaltning.',
            'author' => 'Simon',
            'media' => 'image.png',
            'role_id' => 1
          ],
          [
            'title' => 'Permanent konst',
            'body' => 'Skulptur, rörlig bild, ljudverk och hela fasader… Vi producerar konst för nya och renoverade byggnader och miljöer i statlig verksamhet med utgångspunkten att konsten ska vara kvar, vara permanent. Den konstnärliga gestaltningen relaterar alltid till den specifika situationen eller verksamheten på platsen. Vi arbetar också med pilotprojekt där konstnärer kommer in tidigt i byggprocesser och därmed kan påverka hela miljöer.',
            'author' => 'Simon',
            'media' => 'image.png',
            'role_id' => 1
          ],
          [
            'title' => 'Kunskapsnav offentlig konst',
            'body' => 'Nu bygger vi upp ett kunskapsnav för offentlig konst. Målet med kunskapsnavet är att du ska kunna hitta konkret information i olika frågor som rör allt från hur man startar ett konstprojekt till hur man förverkligar det och hur man förvaltar det. Navet ska inspirera och stärka utvecklingen av offentlig konst i hela Sverige. Dessutom ska det hålla samtalet om den offentliga konstens roll i samhället levande. Det kommer att lyfta fram viktig kunskap som redan finns på olika håll i landet och ta fram ny kunskap som saknas. Kunskapsnav offentlig konst blir en samlande plattform för möten, erfarenheter och information. Här öppnas möjligheten att både få och ge kunskaper inom många olika områden och yrkesroller.',
            'author' => 'Simon',
            'media' => 'image.png',
            'role_id' => 1
          ]

        ];

        foreach($articles as $article){
          Article::create($article);
        }
      }
  }
