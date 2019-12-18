<div id="booking" class="flex-container">
        <?php echo_error(); echo_info(); ?>
        <p>BOOKING</p>
        <form action="../actions/action_booking.php" method="post" id="booking_form">
            <div class="search_input_field_medium">
                <label class="search_label">Check-In</label>
                <input oninput="valid_in()" class="search_input" id="checkin" name="checkin" type="date" value="<?php date("Y-m-d"); ?>" min="<?php date("Y-m-d"); ?>" placeholder="dd/mm/yyyy">
            </div>

            <div class="search_input_field_medium">
                <label class="search_label">Check-Out</label>
                <input oninput="valid_out()" class="search_input" id="checkout" name="checkout" type="date" value="<?php date("Y-m-d"); ?>" min="<?php date("Y-m-d"); ?>" placeholder="dd/mm/yyyy">
            </div>

            <div class="search_input_field_small">
                <label class="search_label">Guests</label>
                <input class="search_input" id="guests" name="guests" type="number" value="1" min="1" max="<?php echo $capacity ?>" maxlength="3" step="1">
            </div>

            <input type="hidden" id="houseID" name="houseID" value="<?php echo $house_id ?>">

            <input onclick="check_dates()" class="button" id="booking_button" type="button" value="BOOK">
        </form>
        <div id="error_all"></div>
    </div>
    <div id="overlay_black"></div>
    <div id="overlay">
        <h1>Please confirm your reservation:</h1>
        <h3>Check-in:   </h3><span id="confirm_in"></span>
        <h3>Check-out:  </h3><span id="confirm_out"></span>
        <h3>Guests:     </h3><span id="confirm_guest"></span>
        <h3>Total price:      </h3><span id="confirm_price"></span>
        <button onclick="confirmed()">Confirm</button>
        <button onclick="cancel()">Back</button>
    </div>
</div>

<script src="../js/booking.js" defer></script>
