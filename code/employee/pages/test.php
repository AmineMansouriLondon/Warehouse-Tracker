<html>
  <head>
    <title>Datum-Countdown mit JavaScript</title>

    <script language="JavaScript">
      //Goal
      var jahr=2222, monat=2, tag=22, stunde=22, minute=22, sekunde=22;
      var zielDatum=new Date(jahr,monat-1,tag,stunde,minute,sekunde);

      function countdown() {
        startDatum=new Date(); //Date now

        // Ccalculate Coutdown
        if(startDatum<zielDatum)  {

          var jahre=0, monate=0, tage=0, stunden=0, minuten=0, sekunden=0;

          // Years
          while(startDatum<zielDatum) {
            jahre++;
            startDatum.setFullYear(startDatum.getFullYear()+1);
          }
          startDatum.setFullYear(startDatum.getFullYear()-1);
          jahre--;

          // months
          while(startDatum<zielDatum) {
            monate++;
            startDatum.setMonth(startDatum.getMonth()+1);
          }
          startDatum.setMonth(startDatum.getMonth()-1);
          monate--;

          // days
          while(startDatum.getTime()+(24*60*60*1000)<zielDatum) {
            tage++;
            startDatum.setTime(startDatum.getTime()+(24*60*60*1000));
          }

          // hours
          stunden=Math.floor((zielDatum-startDatum)/(60*60*1000));
          startDatum.setTime(startDatum.getTime()+stunden*60*60*1000);

          // minutes
          minuten=Math.floor((zielDatum-startDatum)/(60*1000));
          startDatum.setTime(startDatum.getTime()+minuten*60*1000);

          // seconds
          sekunden=Math.floor((zielDatum-startDatum)/1000);

          // format
          (jahre!=1)?jahre=jahre+" Jahre,  ":jahre=jahre+" Jahr,  ";
          (monate!=1)?monate=monate+" Monate,  ":monate=monate+" Monat,  ";
          (tage!=1)?tage=tage+" Tage,  ":tage=tage+" Tag,  ";
          (stunden!=1)?stunden=stunden+" Stunden,  ":stunden=stunden+" Stunde,  ";
          (minuten!=1)?minuten=minuten+" Minuten  und  ":minuten=minuten+" Minute  und  ";
          if(sekunden<10) sekunden="0"+sekunden;
          (sekunden!=1)?sekunden=sekunden+" Sekunden":sekunden=sekunden+" Sekunde";

          document.countdownform.countdowninput.value=
              jahre+monate+tage+stunden+minuten+sekunden;

          setTimeout('countdown()',200);
        }

        else document.countdownform.countdowninput.value=
            "0 Jahre,  0 Monate,  0 Tage,  0 Stunden,  0 Minuten  und  00 Sekunden";
      }
    </script>
  </head>

  <body onload="countdown()">
    <form name="countdownform">
      <p>
        <input size="75" name="countdowninput">
      </p>
    </form>
  </body>

</html>