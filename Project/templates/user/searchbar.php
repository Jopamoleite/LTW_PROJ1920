<script src="scripts/searchbar_scroll.js"></script> 
<div id="search_bar">
    <form class="search_form flex-container" method="get" action="action_search.php">
        <div class="search_input_field_large">
            <label class="search_label">Going to</label>
            <input class="search_input" name="destination" type="text" placeholder="Destination">
        </div>
        <div class="search_input_field_medium">
            <label class="search_label">Check-In</label>
            <input class="search_input" name="checkin" type="date" placeholder="dd/mm/yyyy">
        </div>
        <div class="search_input_field_medium">
            <label class="search_label">Check-Out</label>
            <input class="search_input" name="checkout" type="date" placeholder="dd/mm/yyyy">
        </div>
        <div class="search_input_field_small">
            <label class="search_label">Guests</label>
            <input class="search_input" name="guests" type="number" value="1" min="1" max="100" step="1">
        </div>
        <button class="submit_search_button" type="submit">Search</button>
    </form>
</div>