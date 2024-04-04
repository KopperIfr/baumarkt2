<?php include_once VIEW_PATH . 'layouts/warenkorb_popout.php' ?>
<h1 class="products_title">Der Baumarkt - <?=$katzwei?></h1>
<div class="section_products">
    <div class="cont_products">
        <?php 
            if(count($products) > 0) {
                foreach ($products as $product) {
                    echo "<div class='product'>";
                    echo "<div class='img_cont'>";
                    echo "<img src='". $product['img'] ."' />";
                    echo "</div>";
                    echo "<div class='info'>";
                    echo "<div class='separator'>";
                    echo "<p>". $product['name'] ."</p>";
                    echo "</div>";
                    echo "<div class='separator'>";
                    echo "<p>Firma ". $product['fabrikat'] ."</p>";
                    echo "</div>";
                    echo "<div class='separator'>";
                    echo "<p>". $product['preis'] ."€</p>";
                    echo "</div>";
                    echo "<div class='bottom'>";
                    echo "<a href='/baumarkt2/products/show/". strtolower($product['katalog_nr']) ."'>Produkt Ansehen</a>";
                    echo "<form method='POST' action='/baumarkt2/products'>";
                    echo "<input type='hidden' name='product_added' value='true' />";
                    echo "<input type='hidden' name='action' value='addWarenkorb' />";
                    echo "<input type='hidden' name='product[menge]' value='". intval(1) ."' />";
                    echo "<input type='hidden' name='product[id]' value=".$product['katalog_nr']." />";
                    echo "<input type='hidden' name='product[name]' value=".$product['name']." />";
                    echo "<input type='hidden' name='product[fabrikat]' value=".$product['fabrikat']." />";
                    echo "<input type='hidden' name='product[best_nr]' value=".$product['best_nr']." />";
                    echo "<input type='hidden' name='product[price]' value=".$product['preis']." />";
                    echo "<input type='hidden' name='product[pr_beschr]' value=".$product['pr_beschr']." />";
                    echo "<input type='hidden' name='product[img]' value=".$product['img']." />";
                    echo "<input type='hidden' name='product[katzwei_id]' value=".$product['katzwei_id']." />";
                    echo "<input type='hidden' name='product[total_price]' value='". number_format(0,2) . "'/>";
                    echo "<input type='hidden' name='prev_url' value='/baumarkt2/products/categories/gartenmöbel/".$product['katzwei_id']."' />";
                    echo "<button class='korb' type='submit'>Zum Warenkorb</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
    
                }
            } else {
                echo "<p style='font-size:1.1rem'>Keine Produkte verfügbar!</p>";
            }
        ?>
    </div>

</div>







<!-- <div class="product">
            <div class="img_cont">
                <img src="/baumarkt2/public/imgs/garten-stuhl.webp" />
            </div>
            <div class="info">
                <div class="separator">
                    <p>Produkt: Gartenstuhl</p>
                </div>
                <div class="separator">
                    <p>Fabrikat: Ketler</p>
                </div>
                <div class="separator">
                    <p>
                        Preis: 28.99$
                    </p>
                </div>
                <div class="bottom">
                    <a>Produkt Ansehen</a>
                    <a>Zum Warenkorb</a>
                </div>
            </div>
        </div> -->