<template>
<section class="section">
  <div class="columns">
    <div class="column is-one-fifth">
      <overdrive v-bind:id="id">
        <div class="role-parent">
          <p class="role-mini" :style="{backgroundColor: color}">
            {{trimRole}}
          </p>
        </div>
      </overdrive>
    </div>
    <div class="column">
      <div class="search-box ">
        <b-field>
          <b-taginput @remove="removeTag($event)" v-model="tags" icon="label" v-bind:placeholder="`Jag är ${role} och söker...`">
          </b-taginput>
        </b-field>
      </div>
      <div class="chosen-tags">
        <a @click="addToTags(i)" v-for="(tag, i) in availableTags" class="button is-primary is-outlined">{{tag}}</a>
      </div>
    </div>
</div>

  <div class="articles">
    <div class="is-4"  v-for="article in filteredArticles">

        <div  class="card">
          <div class="card-image">
          </div>
          <div class="card-content">
            <div class="media">
              <h1><b>{{article.title}}</b></h1>
            </div>

            <div class="content">
              {{article.body}}
              <br/>
              <a v-for="tag in article.tags">#{{tag}} </a>
              <br>

          </div>
        </div>
      </div>
    </div>

  </div>
</section>
</template>

<script>
export default {
  name: 'ChosenArticle',
  data() {
    return {
      tags: [],
      availableTags: [
        'ställa ut',
        'konst',
        'permanent konst',
        'tillfällig konst',
        'stadsutveckling',
        'offentliga rummet',
        'arkitekt',
        'curator',
        'boendemiljö',
        'nyheter'
      ],
      articles: [{
          title: 'Utveckla konsten',
          body:'Intresset för att utveckla den offentliga konsten är stort. Spännande arbete pågår i stadsutvecklingsprocesser där kommunala, statliga och privata aktörer renoverar och bygger nya områden. Samtidigt arbetar många konstnärer med att omformulera vad den offentliga konsten kan vara. När vi på Statens konstråd producerar konst i gemensamma miljöer utvecklar vi löpande arbetet med konst och gestaltning. I våra pilotprojekt prövar vi nya metoder och olika sätt att arbeta. Projekten utgår oftast från en specifik situation och kan involvera allt från konst i planering, till sociala relationer eller visuella uttryck. Avgörande för utvecklingen är att olika aktörer kan inspirera varandra. Här vill vi därför dela med oss av våra erfarenheter och kunskaper för att stärka konstens roll i utformningen av våra gemensamma miljöer.',
          tags: ['ställa ut', 'permanent konst', 'nyheter']
        },
        {
          title: 'Tillfällig konst',
          body: 'Konstnärer söker sig idag ofta till aktuella frågor om det gemensamma och om våra offentliga rum. Genom tillfälliga projekt får vi möjlighet att friare utforska olika format och samtidigt reflektera kring aktuella frågor. Vi utgår från dialogen mellan konstnär och curator och från den situation där verket tar form. Samtidigt fångar vi upp den utveckling som sker inom offentlig konst, både i Sverige och internationellt.',
          tags: ['konst', 'tillfällig konst', 'nyheter']

        },
        {
          title: 'Hur går det till?',
          body: 'Konstnären presenterar ett förslag på gestaltning efter att ha gjort en närmare undersökning av hela situationen, eller så utgår konstnären från en idé som sedan påverkar valet av plats. Alla delar i verket diskuteras med curatorn eller initiativtagaren till projektet. I arbetet med att ta fram en film kan processen till exempel ske i samarbete med boende på platsen. Konstnären tar del av deras berättelser om en situation eller hur de upplever platsen och skriver sedan ett filmmanus utifrån samtalen. Konstnären ansvarar för filminspelningen men utbyter idéer med deltagarna även under klipparbetet. Verket blir i det här fallet relevant genom att ge de boende en röst, en möjlighet att bli hörda.',
          tags: ['konst', 'offentliga rummet', 'permanent konst']

        },
        {
          title: 'Stadsutveckling',
          body: 'Vad skapar en stad och dess miljöer? Vi utvecklar metoder för gestaltning av gemensamma miljöer genom samverkan mellan konstnärer, arkitekter, civilsamhälle, kommun och invånare. Genom att samla olika kompetenser kan vi arbeta för miljöer som både möter behov och väcker engagemang och känslor. Våra projekt där konstnärer medverkar i stadsutveckling omfattar allt från processer för medskapande och rätt till de offentliga rummen, till infrastruktur, stadsplanering och gestaltning.',
          tags: ['arkitekt', 'stadsutveckling', 'nyheter']

        },
        {
          title: 'Permanent konst',
          body: 'Skulptur, rörlig bild, ljudverk och hela fasader… Vi producerar konst för nya och renoverade byggnader och miljöer i statlig verksamhet med utgångspunkten att konsten ska vara kvar, vara permanent. Den konstnärliga gestaltningen relaterar alltid till den specifika situationen eller verksamheten på platsen. Vi arbetar också med pilotprojekt där konstnärer kommer in tidigt i byggprocesser och därmed kan påverka hela miljöer.',
          tags: ['permanent konst', 'curator']
        },
        {
          title: 'Kunskapsnav offentlig konst',
          body: 'Nu bygger vi upp ett kunskapsnav för offentlig konst. Målet med kunskapsnavet är att du ska kunna hitta konkret information i olika frågor som rör allt från hur man startar ett konstprojekt till hur man förverkligar det och hur man förvaltar det. Navet ska inspirera och stärka utvecklingen av offentlig konst i hela Sverige. Dessutom ska det hålla samtalet om den offentliga konstens roll i samhället levande. Det kommer att lyfta fram viktig kunskap som redan finns på olika håll i landet och ta fram ny kunskap som saknas. Kunskapsnav offentlig konst blir en samlande plattform för möten, erfarenheter och information. Här öppnas möjligheten att både få och ge kunskaper inom många olika områden och yrkesroller.',
          tags: ['ställa ut']
        }
      ],
      filteredArticles: [],
      role: this.$store.state.role.name
    }
  },
  methods: {
    addToTags(index) {
      const tag = this.availableTags.splice(index, 1)[0];
      this.tags.push(tag);
      this.filter(tag);
    },
    filter(){
      const articles = this.articles.filter(article => {

        let ar; 
        
        this.tags.forEach(tag => {
          if(article.tags.indexOf(tag) !== -1) {
            console.log(article)
            ar = article; 
          }
        })

        return ar;  

      })
      this.filteredArticles = articles; 
    },
    removeTag($event) {
      this.tags = this.tags.filter(tag => tag !== $event);
      
      this.availableTags.push($event);
      this.filteredArticles = this.filteredArticles.filter(article => {
        console.log(article.tags.indexOf($event))
        if(article.tags.indexOf($event) == -1) {
          return article; 
        }
      })
    }
  },
  computed: {
    trimRole(){
      return this.$route.params.role.charAt(0).toUpperCase();
    },
    id(){
      return this.$store.state.role.index
    },
    color(){
      return this.$store.state.role.color
    }
  },

  mounted(){
    this.filteredArticles = this.articles; 
  }

}
</script>
<style scoped>
p {
  text-align: center;
  width: 10%;
}

.columns {
  padding: 0rem 8rem;

}
.articles {
  display: flex;
  flex-wrap: wrap;
  padding: 0rem 8rem;
}
.card {
  flex-grow: 1;
}

.column {
  display: flex;
  flex-direction: column;
}

.is-4 {
  width: 49%;
  margin-bottom: 2%;
  display: flex;
}

.is-4:nth-child(odd) {
  margin-right: 1%;
}

.is-4:nth-child(even) {
  margin-left: 1%;
}

.chosen-tags {
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
}

.role-parent {
  display: flex;
  justify-content: space-between;
  height: 100%;
  width: 100%
}

.role-mini {
  display: flex;
  height: 100%;
  width: 100%;
  align-items: center;
  justify-content: center;
  background-color: #44a8ff;
  color: white;
  font-size: 72px;
  font-weight: 800;
}

.button {
  margin: 5px;
}
</style>
