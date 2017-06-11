<?php
// cart.php
// winkelwagen met bijbehorende functionaliteit
session_start();

// Kijk of er iets in de winkelwagen zit
if (empty($_SESSION['cart'])) {
    echo "<p>Winkelwagen is leeg</p>\n";
}
else {
    // Exploden
    $cart2 = explode("|",$_SESSION['cart']);

    // Tellen inhoud winkelwagen
    $count = count($cart2);
    if ($count == 1) {
        echo "<p>Er staat 1 product in je winkelwagen.</p>\n";
    } else {
        echo "<p>Er staan ".$count." producten in je winkelwagen</p>\n";
    }

    // Wat javascriptjes voor het weghalen van producten
    // En daarna het begin van een tabel met de inhoud
    ?>
    <script type="text/javascript">
        <!--
        function removeItem(item) {
            var answer = confirm ('Weet je zeker dat je dit product wilt verwijderen?')
            if (answer)
                window.location="delete_cart_item.php?item=" + item;
        }

        function removeCart() {
            var answer = confirm ('Weet je zeker dat je de winkelwagen wilt leeghalen?')
            if (answer)
                window.location="delete_cart.php";
        }
        //-->
    </script>
    <form method="post" name="form" action="update_cart.php">
        <table>
            <tr>
                <td>Productnummer</td>
                <td>Productnaam</td>
                <td>Hoeveelheid</td>
                <td>Prijs p/s</td>
                <td>Totaal</td>
                <td>&nbsp;</td>
            </tr>
            <?php

            // Totaal (komt later wel terug)
            $total = 0;
            DEFINE ('DB_USER', 'root');
            DEFINE ('DB_PASSWORD', '');
            DEFINE ('DB_HOST', 'localhost');
            DEFINE ('DB_NAME', 'webwinkel1');

            //connectie maken met database webwinkel1
            $dbc = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
            if (!$dbc){
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db(DB_NAME, $dbc);

            // Show cart
            $i=0;
            foreach($cart2 as $products) {
                // Split
                /*
                  $product[x] -->
                     x == 0 -> product id
                     x == 1 -> hoeveelheid
                */
                $product = explode(",",$products);

                print_r($product);

                //$lengte = strlen(trim($product[1]));
                //echo "lengte =".$lengte;

                if (strlen(trim($product[1]))<>0){
                    // Get product info
                    $sql = "SELECT productnummer, productnaam, prijs
             FROM product
             WHERE productnummer = ".$product[0];  // Weet je nog, uit die sessie
                    $query = mysql_query($sql) ;//or die (mysql_error()."<br>in file ".__FILE__." on line ".__LINE__);
                    $pro_cart = mysql_fetch_object($query);
                    $i++;

                    echo "<tr>\n";
                    echo "  <td>".$pro_cart->productnummer."</td>\n";   // nummer
                    echo "  <td>".$pro_cart->productnaam."</td>\n";     // naam
                    echo "  <td><input type=\"hidden\" name=\"productnummer_".$i."\" value=\"".$product[0]."\" />\n"; // wat onzichtbare vars voor het updaten
                    echo "      <input type=\"text\" name=\"hoeveelheid_".$i."\" value=\"".$product[1]."\" size=\"2\" maxlength=\"2\" /></td>\n";
                    echo "  <td>".$pro_cart->prijs."</td>\n";
                    $lineprice = $product[1] * $pro_cart->prijs;      // regelprijs uitrekenen > hoeveelheid * prijs
                    echo "  <td>".$lineprice."</td>\n";
                    echo "  <td><a href=\"javascript:removeItem(".$i.")\">X</td>\n"; // Verwijder, mooi plaatje van prullebak ofzo
                    echo "</tr>\n";
                    // Total
                    $total = $total + $lineprice;         // Totaal updaten
                }
            }
            ?>
            <tr>
                <td colspan="4">Totaal</td>
                <td><?php echo $total; ?></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td colspan="4"><input type="submit" value="Ververs" /></td>
            </tr>
        </table>
    </form>
    <p>&bull; <a href="javascript:removeCart()">Winkelwagen leeghalen</a><br />
        &bull; <a href="checkout.php">Afrekenen</a><br />
        &bull; <a href="index.php">Verder winkelen!!</a>
    </p>
    <?php
}
?>