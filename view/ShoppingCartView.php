<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 30-3-2015
 * Time: 12:13
 */

function showShoppingcart($products)
{
    $totaalPrijs = 0;
    ?>
    <div id="wrapper">
        <div id="main">
            <div id="content">
                <div id="content_container">
                <p>
                    Producten in uw winkelwagen:
                </p>

                <table>
                    <?php foreach ($products as $productItem) { ?>
                        <tr>
                            <td><?php echo $productItem->getName(); ?></td>
                        </tr>
                    <?php
                        $totaalPrijs += $productItem->getPrice();
                    }
                    ?>
                </table>
                <p>
                Totaalprijs: € <?php echo $totaalPrijs; ?>
                </p>
                <p>
                <a href="AddToOrderController.php">Bestellen</a>
                </p>
                </div>
            </div>
            <div class="clearer"></div>
            <!-- content -->
        </div>
        <!-- #main -->
        <div class="clearer"></div>

        <div class="push"></div>

    </div><!-- /#wrapper -->
<?php
}

?>