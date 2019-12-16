
<div id="booking" class="flex-container">
    <?php if (isset($_SESSION['infomsg']) && !empty($_SESSION['infomsg'])) {echo $_SESSION['infomsg'];unset($_SESSION['infomsg']);} ?>
<h1>BOOKING</h1>
    <form action="../actions/action_booking.php" method="post" id="booking_form">

        <div class="search_input_field_medium">
        <label class="search_label">Check-In</label>
        <input class="search_input" name="checkin" type="date" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" placeholder="dd/mm/yyyy">
        </div>

        <div class="search_input_field_medium">
        <label class="search_label">Check-Out</label>
        <input class="search_input" name="checkout" type="date" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" placeholder="dd/mm/yyyy">
        </div>

        <div class="search_input_field_small">
            <label class="search_label">Guests</label>
            <input class="search_input" name="guests" type="number" value="1" min="1" max="<?php echo $capacity ?>" maxlength="3" step="1">
        </div>

        <input type="hidden" id="houseID" name="houseID" value="<?php echo $house_id ?>">

        <input onclick="" class="button" id="booking_button" type="submit" value="BOOK">
    </form>
</div>
