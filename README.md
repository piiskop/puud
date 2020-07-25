# puud
## Ülevaade
See on näide sellest, kuidas n-ö number 5 jõuab nupust andmebaasi ja andmebaasist selle peale tagasi mingi muu väärtus, mis sellega seotud.

Ette vaadates ma lisasin hulganisti faile, aga alustuseks piisab järgmistest failidest:
1. **nupp.html**,
2. **trees.js**,
3. **put-5-into-database-get-data-return.php**.

## Mida nende failidega tehakse?
### nupp.html
Selles failis on lehe elemendid ehk tagasiside kast, millele järgnevad kaks nuppu, kumbki ühe puu jaoks, millele omakorda järgneb lõik selle kohta, kui palju kumbagi liiki puid on märgitud.

### trees.js
See fail seob funktsiooni **insertTree** kummagi nupu klikkimise sündmusega. See funktsioon võtab sisendiks puu liigi tunnuse, antud juhul __1__ või __2__, ja saadab selle asünkroonselt PHP-failile. Kui vastus on käes, uuendab lõiku, milles kirjas, kui palju puid on märgitud.

Kui sa paned asjanduse jooksma muusse väratisse või aliasena, siis märgitud real tuleb selles failis need muudatused sul teha.

### put-5-into-database-get-data-return.php
Siin sisestatakse puu teave andmebaasi. Kui vastava puu kohta juba on kirje, suurendatakse selle kogust ühe võrra. Pärast loetakse andmebaasist välja, kui palju puid on märgitud ja saadetakse see info tagasi JS-failis olevale skriptile.

Kui sul on andmebaasi ühenduse andmed samad mis mul, siis ei pea sa siin midagi muutma, muidu tuleb need paika sättida näidatud kohas.

## Kuidas seda näidet testida?
Ma kasutan veebiserverina **apache2** ja andmebaasi serverina **MariaDB**'d.

Kõik failid peavad sama serveri peal jooksma, sest pole sisse ehitatud andmete ülekandmist teisele serverile.

Tekitasin testimiseks endale kohaliku domeeni __puud.kalmer.focal.rog__. JS-failis näed, et selle järel on __:2__. See on sellest, et minu **apache2** jookseb mitte väratis __80__, vaid __2__.

Paigaldatud peab olema PHP ja selle **apache2** tugi.

Andmebaasi skript: **trees.sql**.

Valmis lahendust näed toimivana minu [testserveril](http://puud.tennis24.ee:2/nupp.html). Kui käivitad oma serveril, siis lase kindlasti käima **nupp.html**!

## Epiloog
See on kõigest baasnäide, mis hõlmab selle n-ö number 5 teekonda sinna ja tagasi. Kui see asi korralikult teha, siis ma ehitaksin mõndagi juurde:
1. Andmebaasi struktuur tuleb läbi mõelda ja teostada.
2. HTML-faili asemel kasutaksin TPL-faili, millest genereeriksin **Sigma** (PHP vidin) abil HTML-küljenduse.
3. Kujundaksin CSS-ga.
4. Paneksin asja jooksma kahe veebiserveri kaudu, nii et **nginx** serveeriks staatilisi (JS) ja **apache2** dünaamilisi faile (PHP).
5. Mõtleksin läbi ka programmi andmete struktuuri ja funktsionaalsuse ja teostaksin need.
6. Teeksin PHP-faili sisu objektorienteerituks.
7. Lisaksin andmekontrollid nii JS-, PHP-ossa kui andmebaasi päringutele.
8. Ehitaksin juurde kõikide toimingute logimise.

## Kui palju aega kulus?
Kuna ma polnud ammu veebiarendustega tegelenud, siis tegelikult kulus tunde, tegin seda vahelduvalt muude tegevustega mitme päeva kestel. Mul oli vaja välja otsida enda dokumentatsioon ja näited. Lisaks paigaldasin kogu vajaliku arendus- ja testvara enda arvutisse. Siis hakkasin tasapisi ehitama, alul keerulisemalt, mistõttu eksisteerivad need teised failid ka, aga siis otsustasin sulle sellise lihtsama näite teha kolme failiga.
