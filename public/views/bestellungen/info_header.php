
<div class="text-[#595959]">
    <p class="text-[.9rem]">BESTELL NR.</p>
    <p class="text-[#b30202]">#<?php echo $bestellung['bestellung_num'] ?></p>
</div>
<div class="text-[#595959]">
    <p class="text-[.9rem]">BESTELLDATUM</p>
    <p><?php echo $bestellung['bestellung_date'] ?></p>
</div>
<div class="text-[#595959]">
    <p class="text-[.9rem]">TOTAL</p>
    <p><?php echo number_format($bestellung['total_price'], 2) ?>$</p>
</div>
<div class="text-[#595959]">
    <p class="text-[.9rem]">SHICKEN AN</p>
    <div onclick="handleClick(<?php echo intval($index) - 1 ?>)" 
    class="flex items-center gap-x-[1rem] relative cursor-pointer group">
        <p class="group-hover:text-black"><?php echo $bestellung['versandAddresseData']['vers_name'] ?></p>
        <i class="fa-solid fa-angle-down cursor-pointer group-hover:text-black"></i>
        <div class="info_popout hidden w-[20rem] absolute border-[#dedede] border-[.01rem] p-[1.5rem] top-[1.7rem] bg-white rounded-[.3rem] flex flex-col gap-[.4rem]">
            <div class="flex flex-col gap-[.4rem] cursor-default">
                <p class="text-black"><?php echo $bestellung['versandAddresseData']['email'] ?></p>
                <p><?php echo $bestellung['versandAddresseData']['vers_strasse'] ?></p>
                <p><?php echo $bestellung['versandAddresseData']['vers_ort'] ?></p>
                <p><?php echo $bestellung['versandAddresseData']['vers_postl'] ?></p>
                <p><?php echo $bestellung['versandAddresseData']['staat'] ?></p>
            </div>
        </div>
    </div>
</div>
<div class="text-[#595959] flex ml-auto mr-[2rem] flex items-center gap-[1rem]">
    <a href="/baumarkt2/bestellungen/zusammenfassung/<?php echo $bestellung['bestellung_num'] ?>" 
    class="py-[.6rem] text-[#1e66b0]">Auftragszusammenfassung</a>
    <i class="text-[#1e66b0] flex items-center fa-solid fa-angle-right"></i>
</div>
