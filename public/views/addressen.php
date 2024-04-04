<?php if($back === 'true')  { ?>
<div class="bg-gray-200/50 p-[1rem] mt-[1rem]">

    <a
    class="text-black/75 text-[1.2rem] underline"
    href="/baumarkt2/bestellungen?action=showCreateBestellung"
    >   
        <i class="fa-solid fa-arrow-left mr-[1rem]"></i>
        Zurück zur bestellung
    </a>

</div>
<?php } ?>
<h1 class="py-[3rem] mt-[2rem] text-[1.5rem] text-black/75 text-center">MEINE ADDRESSEN</h1>
<div class="w-full min-h-[35rem] flex flex-wrap gap-[2.5rem] mt-[2rem] justify-center">

<?php if($main_address !== false) {?>

    <div class="shadow-lg border-blue-500/50 border-[.1rem] rounded-[.5rem] max-h-[18.9rem] w-[311px] overflow-hidden">
        <div class="text-black/55 flex flex-col gap-y-[.6rem] p-[1.3rem] py-[2rem]">
            <p>
                <?php echo $main_address['vers_name'] ?>
            </p>
            <p>
                <?php echo $main_address['email'] ?>
            </p>
            <p>
                <?php echo $main_address['telefon'] ?>
            </p>
            <p>
                <?php echo $main_address['vers_strasse'] ?>
            </p>
            <p>
                <?php echo $main_address['vers_ort'] ?>, 
                <?php echo $main_address['vers_postl'] ?>
            </p>
            <p>
                <?php echo $main_address['staat'] ?>
            </p>
        </div>
        <div class="w-full flex border-t-[.1rem] border-black/10">
            <div class="w-1/2  flex justify-center border-r-[.1rem] border-black/10 hover:bg-gray-300/15">
                <form class="w-full" method="POST" action="/baumarkt2/addressen">
                <?php if($back === 'true') {?> <input type="hidden" name="back" value="true" />  <?php }?>
                    <input type="hidden" name="action" value="setAddressAsMain" />
                    <input type="hidden" name="address_id" value="<?php echo $main_address['id'] ?>"/>
                    <button class="w-full h-[2.6rem] text-blue-500 bg-blue-100/10">Main</button>
                </form>
            </div>
            <div class="w-1/2 flex justify-center hover:bg-gray-300/15">
                <form class="w-full" method="POST" action="/baumarkt2/user">
                    <input type="hidden" name="action" value="setMainAddress" />
                    <input type="hidden" name="address_id" value="<?php echo $main_address['id'] ?>"/>
                    <button class="h-[2.6rem] w-full text-black/60">Verändern</button>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php
    
    
        foreach ($other_address as $address) {?>

                <div class="shadow-lg border-black/10 border-[.1rem] rounded-[.5rem] max-h-[18.9rem] w-[311px] overflow-hidden">
                        <div class="text-black/55 flex flex-col gap-y-[.6rem] p-[1.3rem] py-[2rem]">
                            <p>
                                <?php echo $address['vers_name'] ?>
                            </p>
                            <p>
                                <?php echo $address['email'] ?>
                            </p>
                            <p>
                                <?php echo $address['telefon'] ?>
                            </p>
                            <p>
                                <?php echo $address['vers_strasse'] ?>
                            </p>
                            <p>
                                <?php echo $address['vers_ort'] ?>, 
                                <?php echo $address['vers_postl'] ?>
                            </p>
                            <p>
                                <?php echo $address['staat'] ?>
                            </p>
                        </div>
                        <div class="w-full flex border-t-[.1rem] border-black/10">
                            <div class="w-1/2  flex justify-center border-r-[.1rem] border-black/10 hover:bg-gray-300/15">
                                <form class="w-full" method="POST" action="/baumarkt2/addressen">
                                    <input type="hidden" name="action" value="setAddressAsMain" />
                                    <?php if($back === 'true') {?> <input type="hidden" name="back" value="true" />  <?php }?>
                                    <input type="hidden" name="address_id" value="<?php echo $address['id'] ?>"/>
                                    <button class="w-full h-[2.6rem] text-black/60 bg-blue-100/10">Main</button>
                                </form>
                            </div>
                            <div class="w-1/2 flex justify-center hover:bg-gray-300/15">
                                <form class="w-full" method="POST" action="/baumarkt2/user">
                                    <input type="hidden" name="action" value="setMainAddress" />
                                    <input type="hidden" name="address_id" value="<?php echo $address['id'] ?>"/>
                                    <button class="h-[2.6rem] w-full text-black/60">Verändern</button>
                                </form>
                            </div>
                        </div>
                    </div>
        
    <?php
        }
    
    
    ?>

    <div class="shadow-lg rounded-[.5rem] max-h-[18.9rem] w-[311px] overflow-hidden bg-gray-100 
    text-black/40 text-[2rem]">
        <form method="POST" action="/baumarkt2/addressen" class="w-full h-full">
            <input type="hidden" name="action" value="showCreateAddress"/>
            <button class="w-full h-full flex items-center justify-center hover:bg-gray-200 hover:text-black/75">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>
    </div>
</div>