<form method="POST" action="/baumarkt2/bestellungen" class="flex items-center gap-[2rem] w-[70rem] mt-[2rem] rounded-[.4rem] border-[#dedede] border-[.01rem] p-[1.5rem]"> 
        <input type="hidden" name="action" value="createBestellung"/>
        
        <button type="submit" class="bg-[#FFD814] py-[.5rem] px-[1.4rem] rounded-[.3rem] text-[.9rem]">Jetzt kaufen</button>
        <div class="flex gap-[.5rem] text-[#c22400] text-[1.2rem] font-bold">
            <p>GESAMT PRICE: </p>
            <p><?php echo number_format($_SESSION['total_price'], 2) ?>$</p>
        </div>
    </form>