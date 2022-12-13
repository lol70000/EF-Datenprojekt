<html>

    <head>
        <title>Datenbankformular</title>
    </head>

    <body>
        <a href="http://localhost/us_opt1/db_structure.php?server=1&db=ef5_proj" target="_blank">php MyAdmin in order to see indecies</a>

        <h1>Formular</h1>

        <form action="insert.php" method="POST">
            <label for="pl_name">Name of the Place</label>
            <br><input type="text" id="pl_name" name="pl_name">
            <hr>

            <br><label for="ln_name">Name of the Lender</label>
            <br><input type="text" id="ln_name" name="ln_name">

            <br><label for="ln_money">Money owed to the Lender</label>
            <br><input type="number" id="ln_money" name="ln_money">
            <hr>

            <br><label for="ma_name">Material Name</label>
            <br><input type="text" id="ma_name" name="ma_name">

            <br><label for="ma_dmx">Anzahl Dmx (Des Oben angegebenen Materials)</label>
            <br><input type="number" id="ma_dmx" name="ma_dmx">

            <br><label for="ma_watt">Watt draw (Des Oben angegebenen Materials)</label>
            <br><input type="number" id="ma_watt" name="ma_watt">

            <br><label for="ma_con_type">Connection Type(Des Oben angegebenen Materials)</label>
            <br><input type="text" id="ma_con_type" name="ma_cn_type">

            <br><label for="ma_anz">Anzahl(Des Oben angegebenen Materials)</label>
            <br><input type="number" id="ma_anz" name="ma_anz">

            <br><label for="ma_place">Platz wohin es muss (Des Oben angegebenen Materials)</label>
            <br><input type="number" id="ma_place" name="ma_place">

            <br><label for="ma_lender">Wer es ausgeliehen hat(Des Oben angegebenen Materials)</label>
            <br><input type="number" id="ma_lender" name="ma_lender">
            <hr>

            <br><label for="sh_name">Name der schicht</label>
            <br><input type="text" id="sh_name" name="sh_name">

            <br><label for="sh_beginn">Start Zeit der Schicht</label>
            <br><input type="number" id="sh_beginn" name="sh_beginn">

            <br><label for="sh_end">Ende der Schicht</label>
            <br><input type="number" id="sh_end" name="sh_end">
            <hr>

            <br><label for="op_name">Name der schicht</label>
            <br><input type="text" id="op_name" name="op_name">

            <br><label for="op_job">Name der schicht</label>
            <br><input type="number" id="op_job" name="op_job">
            <hr>

            <br><label for="con_op">Name der schicht</label>
            <br><input type="number" id="con_op" name="con_op">

            <br><label for="con_sh">Name der schicht</label>
            <br><input type="number" id="con_sh" name="con_sh">

            <br><label for="con_pl">Name der schicht</label>
            <br><input type="number" id="con_pl" name="con_pl">

            <br><input type="submit" value="absenden">
        </form>
    </body>
</html>