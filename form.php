<html>

    <head>
        <title>Datenbankformular</title>
    </head>

    <body style="background-color:rgba(126,74,28,0.339);">
        <a href="http://localhost/us_opt1/db_structure.php?server=1&db=ef5_proj" target="_blank">php MyAdmin in order to see indecies</a>
        <a href="https://www.w3schools.com/howto/howto_js_collapsible.asp">Collapsible how to</a>

        <h1 style="color:rgb(87, 119, 143)">Formular</h1>

        <form action="insert.php" method="POST">
            <button type="button" class="collapsible">Open Place</button>
            <div class="content">
                <label for="pl_name" style="color:rgb(87, 119, 143)">Name of the Place</label>
                <br><input type="text" id="pl_name" name="pl_name">
            </div>
            <hr>

            <button type="button" class="collapsible">Open Lender</button>
            <div class="content">
                <br><label for="ln_name" style="color:rgb(87, 119, 143)">Name of the Lender</label>
                <br><input type="text" id="ln_name" name="ln_name">

                <br><label for="ln_money" style="color:rgb(87, 119, 143)">Money owed to the Lender</label>
                <br><input type="number" id="ln_money" name="ln_money">
            </div>
            <hr>

            <button type="button" class="collapsible">Open Material</button>
            <div class="content">
                <br><label for="ma_name" style="color:rgb(87, 119, 143)">Material Name</label>
                <br><input type="text" id="ma_name" name="ma_name">

                <br><label for="ma_dmx" style="color:rgb(87, 119, 143)">Anzahl Dmx (Des Oben angegebenen Materials)</label>
                <br><input type="number" id="ma_dmx" name="ma_dmx">

                <br><label for="ma_watt" style="color:rgb(87, 119, 143)">Watt draw (Des Oben angegebenen Materials)</label>
                <br><input type="number" id="ma_watt" name="ma_watt">

                <br><label for="ma_con_type" style="color:rgb(87, 119, 143)">Connection Type(Des Oben angegebenen Materials)</label>
                <br><input type="text" id="ma_con_type" name="ma_con_type">

                <br><label for="ma_anz" style="color:rgb(87, 119, 143)">Anzahl(Des Oben angegebenen Materials)</label>
                <br><input type="number" id="ma_anz" name="ma_anz">

                <br><label for="ma_place" style="color:rgb(87, 119, 143)">Platz wohin es muss (Des Oben angegebenen Materials)</label>
                <br><input type="number" id="ma_place" name="ma_place">

                <br><label for="ma_lender" style="color:rgb(87, 119, 143)">Wer es ausgeliehen hat(Des Oben angegebenen Materials)</label>
                <br><input type="number" id="ma_lender" name="ma_lender">
            </div>
            <hr>

            <button type="button" class="collapsible">Open Schicht</button>
            <div class="content">
                <br><label for="sh_name" style="color:rgb(87, 119, 143)">Name der schicht</label>
                <br><input type="text" id="sh_name" name="sh_name">

                <br><label for="sh_beginn" style="color:rgb(87, 119, 143)">Start Zeit der Schicht</label>
                <br><input type="number" id="sh_beginn" name="sh_beginn">

                <br><label for="sh_end" style="color:rgb(87, 119, 143)">Ende der Schicht</label>
                <br><input type="number" id="sh_end" name="sh_end">
            </div>
            <hr>

            <button type="button" class="collapsible">Open Bediener</button>
            <div class="content">
                <br><label for="op_name" style="color:rgb(87, 119, 143)">Name des Bedieners</label>
                <br><input type="text" id="op_name" name="op_name">

                <br><label for="op_job" style="color:rgb(87, 119, 143)">Job des Bedieners</label>
                <br><input type="text" id="op_job" name="op_job">
            </div>
            <hr>

            <button type="button" class="collapsible">Open Connection</button>
            <div class="content">
                <br><label for="con_op" style="color:rgb(87, 119, 143)">Bediener (Index)</label>
                <br><input type="number" id="con_op" name="con_op">

                <br><label for="con_sh" style="color:rgb(87, 119, 143)">Schicht (Index)</label>
                <br><input type="number" id="con_sh" name="con_sh">

                <br><label for="con_pl" style="color:rgb(87, 119, 143)">Platz (Index</label>
                <br><input type="number" id="con_pl" name="con_pl">
            </div>

            <br><input type="submit" value="absenden">
        </form>
    </body>
</html>