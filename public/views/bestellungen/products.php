<?php foreach($bestellung['products'] as $product) { ?>
    <div class="w-full h-[12rem] flex gap-[3rem] p-[2rem] items-center">
    <div class="h-full w-[8rem]">
        <img class="w-full h-full object-contain" src="<?php echo $product['img'] ?>" />
    </div>
    <div class="h-[50%] text-[#595959]">
        <p class="text-[.8rem] mb-[.3rem]">PRODUKTNAME</p>
        <p><?php echo $product['name'] ?></p>
    </div>
    <div class="h-[50%] text-[#595959]">
        <p class="text-[.8rem] mb-[.3rem]">FABRIKAT</p>
        <p><?php echo $product['fabrikat'] ?></p>
    </div>
    <div class="h-[50%] text-[#595959]">
        <p class="text-[.8rem] mb-[.3rem]">MENGE</p>
        <p><?php echo $product['menge'] ?></p>
    </div>
    <div class="h-[50%] text-[#595959]">
        <p class="text-[.8rem] mb-[.3rem]">PREIS</p>
        <p><?php echo number_format($product['price'], 2) ?>$</p>
    </div>
    <div class="h-[50%] text-[#595959]">
        <p class="text-[.8rem] mb-[.3rem]">GESAMT PREIS</p>
        <p><?php echo number_format($product['total_price'], 2) ?>$</p>
    </div>
</div>
<?php } ?>

