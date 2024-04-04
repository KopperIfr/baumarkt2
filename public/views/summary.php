<?php
    if(!isset($bestellung['total_price'])){
        foreach($bestellung['products'] as $product) {
            $bestellung['total_price'] += $product['total_price'];
        }
    }
    $taxrate = floatval($bestellung['total_price']) *  0.0700; //floatval($bestellung['bestellung_taxrate']) ?? 0.0700;
?>

<h1 class="text-[#e47911] text-center pt-[3rem] pb-[5rem] text-[1.4rem]">
    Auftragszusammenfassung von Bestellung #<?php echo $bestellung['bestellung_num'] ?> 
</h1>

<div class="flex flex-col gap-y-[.5rem] pb-[2rem] border-b-[.1rem] border-black">
    <p class="text-black/100">
        Bestellung aufgegeben: <b class="text-black/75"><?php echo $bestellung['bestellung_date'] ?></b>
    </p>
    <p class="text-black/100">
        Bestellung von Baumarkt nummer: <b class="text-black/75"><?php echo $bestellung['bestellung_num'] ?></b>
    </p>
    <p class="text-black/100">
        Total price: <b class="text-black/75">$<?php echo number_format($bestellung['total_price'], 2) ?></b>
    </p>
</div>

<div class="flex flex-col gap-y-[1rem]">


    <!-- CONTAINER PRODUCTS -->
    <div class="mt-[2rem]">
        <h3 class="font-semibold text-[1.2rem] mb-[1rem]">Gekaufte Produkte</h3>
        <?php
            foreach($bestellung['products'] as $index => $product) {?>

            <div class="flex items-center justify-between pt-[.34rem]">
                <div class="flex gap-x-[.5rem]">
                    <p><?php echo $index + 1 ?>.</p>
                    <p><?php echo $product['name'] ?></p>
                    <p>x<?php echo $product['menge']?></p>
                </div>
                <div class="flex flex-col gap-y-[.3rem]">
                    <p>$<?php echo number_format($product['total_price'], 2) ?></p>
                </div>
            </div>

        <?php    
            }
        ?>
    </div>





    <!-- CONTAINER VERSANDADDRESSE -->
    <div class="mt-[2rem] pb-[2rem] border-b-[.1rem] border-black">
        <h3 class="font-semibold text-[1.2rem] mb-[1rem]">Versandaddresse</h3>
        <div class="flex flex-col gap-y-[.4rem] pt-[.34rem] text-black/75">
            <p>
                <?php echo $bestellung['versandAddresseData']['vers_name'] ?>
            </p>
            <p>
                <?php echo $bestellung['versandAddresseData']['vers_strasse'] ?>
            </p>
            <p>
                <?php echo $bestellung['versandAddresseData']['vers_ort'] ?>,
                <?php echo $bestellung['versandAddresseData']['vers_postl'] ?>
            </p>
            <p>
                <?php echo $bestellung['versandAddresseData']['staat'] ?>
            </p>
        </div>
    </div>




        <!-- CONTAINER PAYMENT -->
    <div class="mt-[2rem] pb-[2rem] border-b-[.1rem] border-black mb-[3rem]">
        <h3 class="font-semibold text-[1.3rem] mb-[1rem] text-center">Payment Information</h3>
        <div class="flex flex-col gap-y-[.4rem] pt-[.34rem] text-black/75">
            <div class="flex flex-col gap-y-[.34rem]">
                <p class="text-[1.1rem] font-semibold text-black"> 
                    Bezahlt mit
                </p>
                <p>
                    <?php echo $bestellung['bestellung_cc_type'] . 
                    ' das mit den Nummer ' . $bestellung['bestellung_cc_last_numbs'] . ' endet' ?>
                </p>
            </div>
            <div class=" mt-[2rem] flex flex-col gap-y-[1rem]">
            <p class="flex justify-between w-[30rem]">
                Produkte ohne umsatz steuer: 
                <b>$<?php echo number_format($bestellung['total_price'] - $taxrate, 2) ?></b>
            </p>
            <p class="flex justify-between w-[30rem]">
                Umsatz steuer: 
                <b>$<?php echo number_format($taxrate, 2) ?></b>
            </p>
            <p class="flex justify-between w-[30rem]">
                Versand kosten: 
                <b>$<?php echo number_format(0, 2) ?></b>
            </p>
            <p class="flex justify-between w-[30rem] text-black font-bold text-[1.1rem]">
                Total: 
                <b>$<?php echo number_format($bestellung['total_price'], 2) ?></b>
            </p>
            </div>
        </div>
    </div>


    

</div>