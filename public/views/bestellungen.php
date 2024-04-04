<h1 class="text-center text-[1.5rem] py-[2rem] pt-[4rem]">MEINE BESTELLUNGEN</h1>
<?php
    if(empty($bestellungen)) {
        echo "<p class='text-center text-[1.1rem] text-[#292929]'>Noch keine Bestellungen aufgegeben!</p>";
    }
?>
<div class="w-full min-h-[70vh] flex flex-col items-center gap-y-12 mt-[2rem]">
    <?php
    if(!empty($bestellungen)) {
        $index = 0;
        foreach($bestellungen  as $bestellung) {
            $index++;
    ?>
        <div class="w-[60rem] rounded-[.4rem] border-[#dedede] border-[.01rem] flex flex-col">
            <div class="w-full h-[5rem] border-b-[.01rem] border-[#dedede] bg-[#f5f5f5] flex items-center gap-x-[3rem] p-[1rem]">
                <?php include VIEW_PATH . 'bestellungen/info_header.php' ?>
            </div>
            <div class="w-full flex flex-col gap-[2rem]">
            <?php include VIEW_PATH . 'bestellungen/products.php' ?>
            </div>
        </div>
    <?php
        }
    }
    ?>
</div>











<script>
    function handleClick(index) {
        console.log(index);
        const popout = document.querySelectorAll('.info_popout');
        if(popout) {
            if(popout[index].classList.contains('hidden')) {
                popout[index].classList.remove('hidden');
            } else {
                popout[index].classList.add('hidden');
            }
        }
    }
</script>