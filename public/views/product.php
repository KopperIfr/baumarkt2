<?php include_once VIEW_PATH . 'layouts/warenkorb_popout.php' ?>
<div class="cont_product padding">
    <div class="product">
        <div class="cont_img">
            <img src="<?php echo $product['img'] ?>" />
        </div>
        <div class="info">
            <h1><?php echo $product['name'] ?></h1>
            <p class="description"><?php echo $product['pr_beschr'] ?></p>
            <p class="fabrikat">Fabrikat: <?php echo $product['fabrikat'] ?> </p>
            <p class="preis">Preis: <?php echo $product['preis'] ?>€</p>
            <form method="POST" action="/baumarkt2/products">
                <div class="menge">
                    <p>Menge</p>
                    <input class="border-[.01rem] border-black/30 rounded-[.3rem]" type="number" name="product[menge]" placeholder="0" />
                </div>
                <input type="hidden" name="product_added" value="true" />
                <input type="hidden" name="action" value="addWarenkorb" />
                <input type='hidden' name='product[id]' value="<?php echo $product['katalog_nr']?>" />
                <input type='hidden' name='product[name]' value="<?php echo $product['name']?>" />
                <input type='hidden' name='product[fabrikat]' value="<?php echo $product['fabrikat']?>" />
                <input type='hidden' name='product[best_nr]' value="<?php echo $product['best_nr']?>" />
                <input type='hidden' name='product[price]' value="<?php echo $product['preis']?>" />
                <input type='hidden' name='product[pr_beschr]' value="<?php echo $product['pr_beschr']?>" />
                <input type='hidden' name='product[img]' value="<?php echo $product['img']?>" />
                <input type='hidden' name='product[katzwei_id]' value="<?php echo $product['katzwei_id']?>" />
                <input type='hidden' name='product[total_price]' value="<?php number_format(0,2) ?>" />
                <input type="hidden" name="prev_url" value="<?php echo "/baumarkt2/products/show/" . $product['katalog_nr'] ?>" />
                <button type="submit">Zum Warenkorb</button>
            </form>
            <div class="back">
                <a href="/baumarkt2/products/categories/<?php echo strtolower($katzwei['name']) ?>/<?php echo $katzwei['id']  ?>">
                    <i class="fa-solid fa-chevron-left"></i>
                    Zurück
                </a>
            </div>
        </div>
    </div>
</div>