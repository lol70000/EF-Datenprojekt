<html>

    <!--The Title head is set -->

    <head>
        <title>Datenbankformular</title>
    </head>

    <!--The Backgroundcolor is set -->

    <body style="background-color:rgba(126,74,28,0.339);">

        <h1 style="color:rgb(87, 119, 143)">Formular</h1>

        <!--The Post method is initiated -->

        <form action="alter.php" method="POST">

            <!--Each button is made so that we have th e needed data for the altering of the data you wish to be alterd -->

            <label for="alter_data" style="color:rgb(87, 119, 143)">Name of Data you want to alter</label>
            <br><input type="text" id="alter_data" name="alter_data" maxlength="100">

            <br><label for="where" style="color:rgb(87, 119, 143)">Table where you find this Data</label>
            <br><input type="text" id="where" name="where" maxlength="100">

            <br><label for="what" style="color:rgb(87, 119,143)">What should be altered in data</label>
            <br><input type="text" id="what" name="what" maxlength="100">

            <br><label for="new_data" style="color:rgb(87, 119,143)">What you want to alter it too</label>
            <br><input type="text" id="new_data" name="new_data" maxlenghth="100">
            
            <br><input type="submit" value="absenden">
        </form>
    </body>
</html>