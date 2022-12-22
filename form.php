<html>

    <head>
        <title>Datenbankformular</title>
    </head>

    <body style="background-color:rgba(126,74,28,0.339);">

        <h1 style="color:rgb(87, 119, 143)">Formular</h1>

        <form action="insert.php" method="POST">
            <label for="pl_name" style="color:rgb(87, 119, 143)">Name of the Place</label>
            <br><input type="text" id="pl_name" name="pl_name" maxlength="100">
            <hr>
            
            <br><label for="ln_name" style="color:rgb(87, 119, 143)">Name of the Lender</label>
            <br><input type="text" id="ln_name" name="ln_name" maxlength="100">

            <br><label for="ln_money" style="color:rgb(87, 119, 143)">Money owed to the Lender</label>
            <br><input type="number" id="ln_money" name="ln_money">
            <hr>
            
            <br><label for="ma_name" style="color:rgb(87, 119, 143)">Material Name</label>
            <br><input type="text" id="ma_name" name="ma_name" maxlength="100">

            <br><label for="ma_dmx" style="color:rgb(87, 119, 143)">Anzahl Dmx </label>
            <br><input type="number" id="ma_dmx" name="ma_dmx">

            <br><label for="ma_watt" style="color:rgb(87, 119, 143)">Watt draw </label>
            <br><input type="number" id="ma_watt" name="ma_watt">

            <br><label for="ma_con_type" style="color:rgb(87, 119, 143)">Connection Type</label>
            <br><input type="text" id="ma_con_type" name="ma_con_type" maxlength="100">

            <br><label for="ma_anz" style="color:rgb(87, 119, 143)">Anzahl</label>
            <br><input type="number" id="ma_anz" name="ma_anz">

            <br><label for="ma_place" style="color:rgb(87, 119, 143)">Platz wohin es muss </label>
            <br><input type="text" id="ma_place" name="ma_place" maxlength="100">

            <br><label for="ma_lender" style="color:rgb(87, 119, 143)">Wer es ausgeliehen hat</label>
            <br><input type="text" id="ma_lender" name="ma_lender" maxlength="100">
            <hr>

            <br><label for="sh_name" style="color:rgb(87, 119, 143)">Name der schicht</label>
            <br><input type="text" id="sh_name" name="sh_name" maxlength="100">

            <br><label for="sh_beginn" style="color:rgb(87, 119, 143)">Start Zeit der Schicht</label>
            <br><input type="number" id="sh_beginn" name="sh_beginn">

            <br><label for="sh_end" style="color:rgb(87, 119, 143)">Ende der Schicht</label>
            <br><input type="number" id="sh_end" name="sh_end">
            <hr>
            
            <br><label for="op_name" style="color:rgb(87, 119, 143)">Name des Bedieners</label>
            <br><input type="text" id="op_name" name="op_name" maxlength="100">

            <br><label for="op_job" style="color:rgb(87, 119, 143)">Job des Bedieners</label>
            <br><input type="text" id="op_job" name="op_job" maxlength="100">
            <hr>
            
            <br><label for="con_op" style="color:rgb(87, 119, 143)">Bediener </label>
            <br><input type="text" id="con_op" name="con_op" maxlength="100">

            <br><label for="con_sh" style="color:rgb(87, 119, 143)">Schicht </label>
            <br><input type="text" id="con_sh" name="con_sh" maxlength="100">

            <br><label for="con_pl" style="color:rgb(87, 119, 143)">Platz </label>
            <br><input type="text" id="con_pl" name="con_pl" maxlength="100">
        
            <br><input type="submit" value="absenden">
        </form>
    </body>
</html>