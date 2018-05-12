<?php ob_start(); ?>
<div class="container">
  <form method="post">
    <table class="table table-fixed table-striped">
        <tr>
          <td>image</td>
          <td>Nom</td>
          <td>Quantit&eacute;</td>
          <td>Prix Unitaire</td>
          <td>Action</td>
        </tr>
        <?php
          if ($nbArticles <= 0) {
          echo "<tr><td>Votre panier est vide </ td></tr>";
          }
          else
          {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {
              echo "<tr>";
              echo "<td><img src=\"".htmlspecialchars($_SESSION['panier']['p_image'][$i])."\" style=\"width: 100px; height: 120px;\"></td>";
              echo "<td>".$_SESSION['panier']['p_nom'][$i]."</td>";
              echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['p_qte'][$i])."\"/></td>";
              echo "<td>".htmlspecialchars($_SESSION['panier']['p_prix'][$i])."</td>";
              echo "<td><a href=\"".htmlspecialchars("panier?action=suppression&l=".rawurlencode($_SESSION['panier']['p_code'][$i]))."\"><img src=\"https://cdn1.iconfinder.com/data/icons/web-essentials-circle-style/48/delete-2-256.png\" style=\"width: 35px; height: 35px;\"></a></td>";
              echo "</tr>";
            }

            echo "<tr><td colspan=\"3\"> </td>";
            echo "<td colspan=\"3\">";
            echo "Total : ".Montant()." €";
            echo "</td></tr>";

            echo "<tr><td colspan=\"4\">";
            echo "<input type=\"submit\" value=\"Rafraichir\" class=\"btn btn-success\"/>";
            echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
            echo "</td><td>";
            echo "<input type=\"submit\" value=\"Valider\" class=\"btn btn-info\"/>";
            echo "<input type=\"hidden\" name=\"action\" value=\"valider\"/>";
            echo "</td></tr>";
          }
        ?>
      </table>
  </form>
</div>
<?php
$title = "Panier";
$content = ob_get_clean();
include 'includes/layout.php'; ?>
