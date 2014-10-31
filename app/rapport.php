<!DOCTYPE html>
<html>
<head>
    <title>INM5151 - Les Mutants</title>
    <link href="./usagerStyle.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>


<body>
<div id="header">
    <h2>SYSTÈME - LES MUTANTS</h2>
    <ul class="addUsager">
        <li><a href="#"><img src="./icon/iconPlus.png"/></a></li>
        <li><a href="#"><img src="./icon/iconPlus.png"/></a></li>
    </ul>
    <ul class="logOff">
        <li><a href="./signout.html">Sign out</a></li>
    </ul>
</div>

<div id="content">
    <div class="menuGauche">
        <h1>Modules</h1>
        <ul>
            <li><a href="vue.php">Liste</a></li>
            <li><a href="vue.php">Commande</a></li>
            <li><a href="vue.php">Paiement</a></li>
            <li><a href="vue.php">Facture</a></li>
            <li><a href="vue.php">Rapport</a></li>
        </ul>
    </div>

    <div class="contenu">
        <ul class="nav_tab">
            <li class="active">
                <a href="#">Rapport</a>
            </li><li><a href="#">Histoire</a></li>
        </ul>

        <table>
            <tr>
                <th>Rapport de facturation</th>
            </tr>
            <tr>
                <td>No</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Choisir</td>
                <td>
                    <input type="radio" name="radio1" value="male">Male
                    <input type="radio" name="radio1" value="female">Female
                </td>
            </tr>
            <tr>
                <td>Sélectionner</td>
                <td>
                    <input type="checkbox">Chien
                    <input type="checkbox">Chat
                    <input type="checkbox">Rhinocéros
                </td>
            </tr>
            <tr>
                <td>date début</td>
                <td><input type="date"></td>
            </tr>
            <tr>
                <td>date fin</td>
                <td><input type="date"></td>
            </tr>
            <tr>
                <td>upload image</td>
                <td><input type="file"></td>
            </tr>
            <tr>
                <td>choisir</td>
                <td>
                    <input type="select" name="select1">
                        <option value="op1">opt1</option>
                        <option value="op2">opt2</option>
                        <option value="op3">opt3</option>
                        <option value="op4">opt4</option>
                    </select>
                </td>
            </tr>

        </table>
    </div>
</div>

<div id="footer">
    Projet Les Mutants<br>
    2013
</div>

</body>
</html>