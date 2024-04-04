<h1 class="text-center py-[4rem] text-[2rem]">Warenkorb</h1>
    <table class="max-w-[1500px] m-auto">
        <tbody>
            <tr class="titles">
                <th></th>
                <th>Name</th>
                <th>Fabrikat</th>
                <th>Bestellungs Nummer</th>
                <th>Menge</th>
                <th>Preis</th>
                <th>Gesamt Preis</th>
                <th></th>
            </tr>
            <?php 
            if($products) {
                foreach($products as $product) {?>

            <tr class="product_row">
                <td class="img">
                    <img style="width:6rem; height:6rem; object-fit:contain;" src="<?php echo $product['img'] ?>" />
                </td>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['fabrikat'] ?></td>
                <td>#<?php echo $product['best_nr'] ?></td>
                <td><?php echo $product['menge'] ?></td>
                <td><?php echo number_format($product['price'], 2) ?>$</td>
                <td><?php echo number_format($product['total_price'], 2) ?>$</td>
                <td class="delete">
                    <form method="POST" action="/baumarkt2/products">
                        <input type="hidden" name="action" value="removeWarenkorb" />
                        <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>" />
                        <button class="bg-[#6999c9]" type="submit">
                            Entfernen
                        </button>
                    </form>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <div class="cont_total max-w-[1500px] m-auto">
        <div class="total">
            <p>TOTAL:</p>
            <p><?php echo number_format($total_price, 2) ?? number_format(0, 2) ?>$</p>
        </div>
        <form method="GET" action="/baumarkt2/bestellungen">
            <input type="hidden" name="action" value="showCreateBestellung" />
            <button type="submit" class="bg-[#FFD814]">
                Bestellung Aufgeben
            </button>
        </form>
    </div>


    <style>

    .cont_total {
        width: 100%;
        padding: 3rem 0;
        display: flex;
        gap: 3rem;
        align-items: center;
        justify-content: end;
    }

    .cont_total .total {
        font-size: 1.6rem;
        display: flex;
        gap: 1rem;
    }

    .cont_total form button{
        padding: .4rem 1rem;
        outline: none;
        cursor: pointer;
        border: none;
        border-radius: .3rem;
        font-size: 1.2rem;
    }

    h1 {
        text-align: center;
        padding: 4rem 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 1rem;
        border-bottom: 1px solid #ddd;
        text-align: left;
        border-left:  1px solid #ddd;
    }

    th:first-child {
        border-left: none;
    }

    .titles {
        background-color: rgb(250,250,250);
    }

    .product_row img {
        width: 6rem;
        height: 6rem;
        object-fit: contain;
        display: block;
        margin: 0 auto;
    }

    .product_row td {
        vertical-align: middle;
        border-left: 1px solid #ddd; /* Añade un borde izquierdo a todos los td */
    }

    .product_row td:first-child {
        border-left: none; /* Elimina el borde izquierdo del primer td (contiene la imagen) */
    }

    .product_row td.delete {
        text-align: center; /* Centra el contenido horizontalmente */
    }

    .product_row td.delete button {
        margin: 0 auto; /* Centra el botón horizontalmente */
        padding: .4rem 1rem;
        outline: none;
        cursor: pointer;
        border: none;
        color: white;
        border-radius: .3rem;
    }
</style>

<?php
// if(empty($products)) {
//     echo 'Warenkorb ist lehr';
// } else {
//     displayArray($products);
//     echo $total_price;
// }