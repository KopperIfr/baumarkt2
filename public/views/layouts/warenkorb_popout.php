<?php
if(isset($_GET['product_added']) && $_GET['product_added'] === 'true') {?>

    <div class="popout_cont">
        <div class="warenkorb_popout true">
            <p>Produkt erfolgreich hinzugefügt!</p>
            <form method="GET" action="<?php echo strtok($_SERVER['REQUEST_URI']) ?>?product_added=false">
                <button type="submit">
                    Einverstanden
                </button>
            </form>
        </div>
    </div>

<?php    
} elseif(isset($_GET['product_added']) && $_GET['product_added'] === 'false') {?>

    <div class="popout_cont">
        <div class="warenkorb_popout false">
            <p style="color: red">Menge kann nicht 0 sein!</p>
            <form method="GET" action="<?php echo strtok($_SERVER['REQUEST_URI']) ?>?product_added=false">
                <button type="submit">
                    <i class="fa-solid fa-square-xmark"></i>
                </button>
            </form>
        </div>
    </div>

<?php
}
?>

