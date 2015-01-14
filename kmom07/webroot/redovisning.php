<?php  
include(__DIR__.'/config.php');  


$FRD['title'] = "Redovisning"; 

$FRD['main'] = <<<EOD
<article class="show">
<h1>Redovisnings Sidan</h1> 
<h2>Kmom01: Kom igång med programmering i PHP</h2>
<p>
	Jag använder mig av Windows 7 på min statinära och Windows 8.1 på min laptop, texteditorn
	som jag använder mig av är Sublimetext. 
</p>
<p>
	PHP20 guiden, jag testade en del av exemplen som gicks genom där va lite nya saker
	men det mesta var saker jag redan kunde. Dock en bra guide för de som inte använt sig av php tidigare.	
</p>
<p>
	Min webbmall döpte jag till FRD vilket står för F i Fus, R i Ro och D i Dah. Det blev dettta namnet 
	pga mitt smeknamn som jag fick under nollningen som är Fus Ro Dah.
</p>
<p>
	I början av detta moment var jag relativt förvirrad över var de olika sakerna fanns men efter att ha 
	jobbat med det ett tag förstår jag hur det är uppbyggt. Jag ändrade runt lite här och där, 
	flyttade vart menyn skulle vara placerad samt la in lite roligare
	fonts och andra saker i min css så som rundade kanter och skuggor. Strukturen på Anax eller i mitt fall FRD gillar jag, det är lätt att 
	hitta vad man letar efter och det är tydligt vilka filer som gör vad. Jag kommer antagligen att hitta 
	saker som jag vill ändra senare men det är saker man får fixa med då. Funktionen dump() la jag in i bootstrap.php
	och den verkar fungera som den ska. Där va några mindre svårigheter, en av dem som tog lång tid att få rätt på 
	var att jag inte kunde genererar en meny. Problemet var att jag hade glömt att delvis i CNavigation filen inte 
	returnera html. Men jag hade även skrivit fel i index.tpl.php då jag istället för 
	CNavigation::GenerateMenu hade skrivit det tvärtom dvs GenerateMenu::CNavigation. Men såfort jag såg felet
	var det bara att ändra det och efter det fungarde min meny precis så som jag ville att den skulle göra.
<p>
	Att få rätt på source.php tog inte specielt lång tid, det jag gjorde va att jag använde mig av 
	CSource filen som jag sedan inkluderade som en modul i min FRD.
</p>
<p>
	Extra uppgiften med Github fixade jag även men jag använde mig av deras windows application där man 
	väldigt simpelt och snabbt bara kan skapa ett nytt repo, sedan slänga in filerna och publicera dem till 
	Github. Det tog inte många minuter att förstå hur Github fungerade det är ett smart verktyg om man har 
	en mall man vill följa.
</p>
<p>
	Där va lite saker som man saknade ang ens egna webbmall t.ex min sida är relativt lik Mikael's Anax,
	så jag undrar om jag ska hänvisa till honom när det gäller LICENSE filer osv. Jag ändrade dock allt 
	till mig själv nu men vet inte om det var rätt. 
</p>
<h2>Kmom02: Objektorienterad programmering i PHP</h2>
<p>
	Det Objektorienterade konceptet var rolit att programmera i jag har dock haft lite svårt att få saker 
	att funger som jag vill. Läste delvis fel på uppgiften så jag råkade lägga hela programet i sidkontrollern 
	första gången. PHP20-Guiden hjälpte mig relativt mycket genom denna uppgiften, den förklarade saker på ett
	bra sätt som var lätt att förstå. 
</p>
<p>
	Uppgiten med tärningesspelet 100, jag skapade två olika klasser för jag ansåg att detta är ett mindre spel så fler klasser
	blir överdrivet. Jag började med att skapa en klass där man kastar tärningen som sedan returnar ett värde mellan 1-6 som anger
	vilken tärnings sida du fick. Efter det skapade jag själva spel klassen där jag har spelets funktionalitet.
	Dvs en knapp för att kasta tärningen, en för att spara rundsumman en för att avsluta.
	Satte även en function som om mina sessions variabler inte är satta sätter värde på dem.
</p>
<p>
	I själva game funktionen har jag gjort så att om man slår en etta nollställs ens kast och det blir en ny runda. Om man inte slår en
	etta så slås roundsum ihop med diceface och skapar en ny roundsum. Jag har även ett sätt att spara tärningarna på där man sätter 
	totalsum + roundsum till en och samma summa och sedan nollställs roundsum och det blir en ny runda. Man kan givetvis även stänga
	av spelet genom att klicka på avsluta och det som händer då är att alla värden nollställs till orginal värdena. Sen för att kunna skriva
	ut spelet på ett snyggt sätt lägger jag in all text i en html sträng och använder sedan en getHtml function som i själva sidkontrollern 
	skriver ut hela spelet som html kod. Jag skapade även en if sats som kontrollerade om du har över 100 poäng vid sparningen av totalsum.
	Har du över 100 poäng så försvinner knapparna för att kunna kasta tärningarna, avsluta spelet och spara summan och en knapp där det står
	Spela igen? Kommer fram istället och när man klickar på den nollställs alla värden precis som i avsluta spelet. 
</p>
	<h2>Övrigt</h2>
<p>
	Jag hade velat göra så att man kan spela fler men pga att jag gjorde fel i början och sedan fick göra om det så hade jag inte tiden att fixa
	med flera spelare samt en datorkontrollerad spel omgång.
</p>
<h2>Kmom03: SQL och databasen MySQL</h2>
<p>
	Jag läste MySQL på gymnasiet en hel del då använde vi oss av phpmyadmin samt PDO metoden. Har även testat SQLite innan men tycker inte det 
	är specielt annorlund gemfört med MySQL. Att jobba med MySQL är ganska roligt jag föredrar att använda MySQL workbench för att det visar informationen
	på ett bra sätt. Har tidigare använt phpmyadmin men tycker att det är ganska jobbigt att använda av någon anledning. Det var dock fösta gången jag testade
	att jobba med en terminal och jag tyckte inte det var specielt simpelt. Det skrev inte ut informationen på ett bra sätt och jag blev mest förvirrad av det. 
	Jag förderar därför MySQL workbench dock finns det lite mindre problem med programmet, det krashar regelbundet. Samt att ibland så fungerar inte simpla kommandon. 
	Jag hade några svårigheter med Joinade tabeller, det fungerade inte som det skulle av någon anledning men efter att jag lekt rundor med det fungerade det. Antar att jag
	hade gjort ett simpelt fel någonstans. Typ skrivit något fel eller att MySQL workbench bara jävlades med mig. Annars fungerade allt som det skulle och man lärde sig mycket
	nytt angående joining av tabeller, samt outer och inner join. 
	SQL övningen gick fint det var relativt simpla saker man skulle testa samt att jag jobbat lite med MySQL innan. Där va som tidigare sagt vissa gånger som MySQL workbench
	inte ville ta emot kommandon som jag skrev in och på grund av det trodde jag att jag gjorde något fel. Men efter att jag startat om MySQL workbench fungerade kommandonen som jag
	skrev in. Det var ganska lagom med uppgifter bland SQL övningarna man lärde sig grunderna och lite till.
</p>
<h2>Kmom04: PHP PDO och MySQL</h2>
<p>
	Först av allt måste jag säga att detta Kmom var jätte jobbigt att förstå vad man skulle göra. Det fanns inga tydliga instruktioner om vad
	man SKULLE göra där va krav men man visste inte om man skulle göra dem eller inte. 
</p>
<p>
	Det är relativt roligt att jobba med PHP PDO, det kändes som att jag behöver öva mer på det men att det börjar falla på plats. Jag jobbade realtivt mycket med filmdatabas guiden men jag
	tycker att den var lite rörig. På vissa ställen kändes det som att man bara fick info slängt i ansiktet och sen var det igång med nästa sak. MEdans på andra ställen kändes det som att det
	var rikt med info och bra förklaringar. I allmänhet tyckte jag att guiden var mycket bra och hjälpte mig realtivt mycket under uppgiften. Hade några problem med att fixa sjävla kopplingen 
	till databasen så att jag kunde skapa USER och Movie. Men efter att fått det förklarat för mig så fick jag det att funka som jag ville.
</p>
<p>
	Jag tycker att konceptet med att bygga ut mitt FRD(Anax) med moduler i form av klasser endast har fördelar just nu, kommer säkert att komma på nackdelar senare i kursen men inte just nu iallafall.
	Dvs jag tycker att det är ett bra koncept som jag gillar att jobba med.
</p>
<p>
	Där va en del svårigheter jag lykades lösa det mesta men där var vissa saker som jag bara inte kunde få att funka så som jag ville. Till exempel paginering har jag inte att fungera men det e bara att fortsätta
	jobba med det och se till att få det att fungera så fort som möjligt. Hade även svårigheter med att få min sökning att funka men efter att ha frågat efter tips från olika källor fick jag det att fungera så att man
	kan söka efter titel. Man kan även sortera filmerna efter titel, år och id. Lykades även göra så att man kan logga in och se sin status och sedan logga ut också. 
</p>
<h2>Kmom05: Lagra innehåll i databasen</h2>
<p>
	Det börjar bli en hel del olika moduler som gör olika saker. Jag tycker att för varje modul som man gör blir det mer och mer likt en "vanlig" hemsida istället för en typ uppgifts sida.
</p>
<p>
	När det gäller hur jag tänkte när jag löser uppgifterna var det relativt straight forward, jag följde instruktionerna över vad som skulle finnas och la in det. Jag började oftast med att köra en SQL fråga rakt in för
	att se om den fungerade som jag ville. EFter det börjar man strukurera om det och göra så att man hämtar parametrar från get variabler och använder dem i SQL satsen istället. Sen var det bara att länka ihop de olika
	klasserna så det gick att få ut den infon man ville visa, samt att inte allt som ligger i databasen skrevs ut. Efter det kom uppgiften med CTextfilter som var den jobbigaste enligt mig, det tog långtid att få den att fungera
	på rätt sätt. sidkontrollerna strukturerade jag efter vad som skulle skrivas ut var. Började alltid med att inkludera klasserna till sidkontrollerna och efter det så gjorde jag en check efter user om det behövdes annars gjorde
	jag bara en article och i den anropa de olika funktionerna som skulle hämta / skriva ut saker på sidkontrollern. 
</p>
<p>
	Struktureringen av sidkontroller och klasser börjar falla på plats. Det finns fortfarande saker som jag behöver tänka på när jag strukturerar de sakerna men det börjar bli bättre. Jag måste även börjar kommentera mer i när jag 
	skriver.
</p>
<p>
	Vad jag vet så är det inget jag saknar, vi kommer göra galleri i nästa moment det är antagligen det ända jag saknar som det är just nu. Annars har vi gjort de mesta sakerna jag kan komma på att jag hade velat testa att göra i just
	denna kursen. Den modulen eller ja själva uppgiften vi gjorde nu är väll det jag känner har varit det viktigaste att lära sig eftersom att man kommer att använda saker som detta senare. Att jobba med så många olika klasser var bra att testa
	också. Det kommer att underlätta i senare uppgifter eller kurser.
</p>
<h2>Projektet</h2>
<p>
	Krav 1: På krav ett var det tekniskt sett bara att skapa de olika filerna samt lägga in det grundläggande koderna för att får det att överhuvudtaget vara en hemsida. Jag la även in en inloggning som tillåter dig att ändra information bland filmer och nyheterna.
	Samt att jag skapade en admin.php där man kan gå in för att skapa en ny film eller en ny nyhet. Strukturen var simpel att anpassa sig efter och det tog inte specielt långtid att få de sakerna som var ett krav implementerade. 
</p>
<p>
	Krav 2: Det var den här delen som tog mest tid att få att fungera korrekt. Att göra listan med filmer var inte det svåra utan få in så att man kan sortera samt välja hur många per sida var det som tog längst tid för mig att koda. Något som också var roligt att 
	jobba med var explode funktionen som delar upp kategorierna(genre) så att man kan göra dem klickbara samt att göra så att de visar alla filmer med samma kategori. Men det tog några timmar att få genre funktionen att fungera pga att jag inte använt det tidigare. 
	I listan över filmer kan man se titel, pris, bild samt synopsis som jag tagit från imdb.
	Efter att själva listan med filmer var färdigställd började jag jobba sidan som visar information om bara en specifik film. På den sidan så skulle man implementera en bild, mer info samt länka till imdb och en trailer. Jag valde att lägga in trailern som en YouTube
	länk med hjälp av deras inbygda embedd system. Jag använder mig av img.php för att skala ner kvaliten på bilderna i listan samt sätta en vis höjd / bredd på bilden som ligger i informations sidan om filmen. 

	Jag gjorde även så att en film klarar av att ha flera kategorier genom att använda explode funktionen som jag nämnde tidigare.
</p>
<p>
	Krav 3: Det som skulle implementeras i detta kravet hade vi nästan gjort tidigare det var bara att slå ett öga på CContent och skriva om lite samt lägga till en del saker så som Kategorier och "Läs mer >>" funktionen som gör att texten blir av bruten efter ett vist antal
	tecken och istället skrivs det ut "..." och efter det står det "Läs mer -->" som hänvisar dig in på just den nyheten där du får ut mer information. Jag skapade även en funktion för att ändra på nyheterna samt skapa nya. För att skapa nya går man till Admin sidan men för att
	ändra på nyheter som redan är skapade går man in på nyhetsflödet och klickar på "editera".
</p>
<p>
	Krav 4: För att visa de 3 nyaste filmerna var jag tvungen att lägga in en published tabell i min databas som jag sedan använder för att hämta ut de 3 som är nyast inlagda eller uppdaterade. De 3 nyaste nyhetsinläggen hämtar jag ut på samma vis. Översikt över kategoriena finns
	överst på startsidan och klickar man på dem hänvisas man till movie.php sidan. Att visa de 3 populäraste filmerna hårdkodade jag in vilka 3 jag ville skulle visas det var inte direkt något som var svårt.
</p>
</article>
EOD;

include(FRD_THEME_PATH); 
