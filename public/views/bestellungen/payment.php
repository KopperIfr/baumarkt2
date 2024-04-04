
<?php if($paymentData !== null && $changePayment) {?>

<div class="w-[70rem] flex gap-x-[8rem] border-b-[.1rem] border-black py-[4.5rem]">
    <div class="text-[1.6rem] font-medium flex gap-x-[1rem] w-[20rem]">
        <b>2.</b><h2> Payment</h2>
    </div>
    <div class="text-[#595959] flex flex-col gap-[.7rem] w-[20rem]">
        <div>
            <p class="text-[.85rem]">KREDITKARTENTYP</p>
            <p><?php echo $paymentData['cc_type'] ?></p>
        </div>
        <div>
            <p class="text-[.85rem]">KREDITKARTENNUMMER</p>
            <p><?php echo $paymentData['cc_number'] ?></p>
        </div>
        <div>
            <p class="text-[.85rem]">GULTIG BIS</p>
            <?php 
                if(intval($paymentData['exp_month']) < 10) $paymentData['exp_month'] = '0' . $paymentData['exp_month'];
            ?>
            <p><?php echo $paymentData['exp_day'] . '/' . $paymentData['exp_month'] . '/' . $paymentData['exp_year']  ?></p>
        </div>
        <div class="mt-[1rem]">
            <a href="/baumarkt2/bestellungen?action=showCreateBestellung&change_payment=true" 
            class="text-white bg-[#6999c9] py-[.3rem] px-[1.4rem] rounded-[.3rem]">
            Verändern
            </a>
        </div>
    </div>
</div>

<?php } else { ?>



<div class="w-[70rem] flex gap-x-[8rem] border-b-[.1rem] border-black py-[4.5rem]">
        <div class="text-[1.6rem] font-medium flex gap-x-[1rem] w-[20rem]">
            <b>2.</b><h2> Payment</h2>
        </div>
        <form method="POST" action="/baumarkt2/bestellungen" class="text-[#595959] flex flex-col gap-[1rem] w-[20rem]">
            <input type="hidden" name="action" value="showCreateBestellung"/>
            <div>
                <p class="text-[.85rem] mb-[.26rem]">KREDITKARTENTYP</p>
                <select class="border-[#9c9c9c] border-[.1rem] rounded-[.3rem] px-[.1rem] w-[14.8rem]" name="payment[cc_type]">
                    <option value="Visa">Visa</option>
                    <option value="Mastercard">Mastercard</option>
                    <option value="American Express">American Express</option>
                </select>
            </div>

            <div>
                <p class="text-[.85rem] mb-[.26rem]">KREDITKARTENNUMMER</p>
                <input class="border-[#9c9c9c] border-[.1rem] rounded-[.3rem] px-[.5rem] w-[14.8rem] placeholder:text-[.8rem]" placeholder="XXXX XXXX XXXX XXXX" name="payment[cc_number]" />
            </div>

            <div>
                <p class="text-[.85rem] mb-[.26rem]">GULTIG BIS</p>
                <div class="flex gap-[.5rem]">
                    <select class="border-[#9c9c9c] border-[.1rem] rounded-[.3rem] px-[.1rem]" name="payment[exp_month]">
                        <?php 
                            foreach ($months as $index => $month) {
                                echo '<option class="text-[.8rem]" value='.$index.' >'.$month.'</option>';
                            }
                        ?>
                    </select>
                    <select class="border-[#9c9c9c] border-[.1rem] rounded-[.3rem] px-[.1rem]" name="payment[exp_day]">
                        <?php
                            for($i = 1; $i <=31; $i++) {
                        ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <select class="border-[#9c9c9c] border-[.1rem] rounded-[.3rem] px-[.1rem]" name="payment[exp_year]">
                        <?php
                            $start_yr = date("Y", strtotime($today));
                            for($i = $start_yr; $i <= $start_yr + 7; $i++)  {
                        ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="w-[10rem] bg-[#6999c9] text-white mt-[.8rem] rounded-[.3rem]">
                Speichern
            </button>
        </form>
    </div>

<?php } ?>