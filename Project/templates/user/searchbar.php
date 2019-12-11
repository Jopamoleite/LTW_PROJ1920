<script src="scripts/searchbar_scroll.js"></script> 

<?php
    $destination;
    $checkin;
    $checkout;
    $guests;
    
    if(isset($_GET['destination'])) $destination = $_GET['destination']; else $destination = "";

    if(isset($_GET['checkin'])) $checkin = $_GET['checkin']; else $checkin = "";

    if(isset($_GET['checkout'])) $checkout = $_GET['checkout']; else $checkout = "";

    if(isset($_GET['guests'])) $guests = $_GET['guests']; else $guests = 1;
?>    

<div id="search_bar">
    <form class="search_form flex-container" method="get" action="action_search.php">
        <div class="search_input_field_large">
            <label class="search_label">Going to</label>
            <input class="search_input" name="destination" type="text" value="<?php if(isset($_GET['destination'])){ echo $_GET['destination']; }?>" placeholder="Destination">
        </div>
        <div class="search_input_field_medium">
            <label class="search_label">Check-In</label>
            <input class="search_input" name="checkin" type="date" value="<?php if(isset($_GET['checkin'])){ echo $_GET['checkin']; }?>" placeholder="dd/mm/yyyy">
        </div>
        <div class="search_input_field_medium">
            <label class="search_label">Check-Out</label>
            <input class="search_input" name="checkout" type="date" value="<?php if(isset($_GET['checkout'])){ echo $_GET['checkout']; }?>" placeholder="dd/mm/yyyy">
        </div>
        <div class="search_input_field_small">
            <label class="search_label">Guests</label>
            <input class="search_input" name="guests" type="number" value="<?php if(isset($_GET['guests'])){ echo $_GET['guests']; } else echo 1;?>" min="1" max="100" step="1">
        </div>
        <button class="submit_search_button" type="submit">Search</button>
    </form>
</div>