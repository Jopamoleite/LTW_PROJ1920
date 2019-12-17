
<?php
    $destination;
    $checkin;
    $checkout;
    $guests;

    if (isset($_GET['destination'])) { $destination = trim(htmlspecialchars($_GET['destination'])); }
    else { $destination = ""; }

    if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬-]', $destination)) {
        header('Location: main_page.php');
        die();
    }

    if (isset($_GET['checkin'])) { $checkin = trim(htmlspecialchars($_GET['checkin'])); }
    else { $checkin = ""; }

    if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬]', $checkin)) {
        header('Location: main_page.php');
        die();
    }

    if (isset($_GET['checkout'])) { $checkout = trim(htmlspecialchars($_GET['checkout'])); }
    else { $checkout = ""; }

    if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬]', $checkout)) {
        header('Location: main_page.php');
        die();
    }

    if (isset($_GET['guests'])) { $guests = ltrim(trim(htmlspecialchars($_GET['guests'])), '0'); }
    else { $guests = 1; }

    if (!ctype_digit($guests)) { $guests = 1; }
    if ($guests > 100) { $guests = 100; }
?>

<div id="search_bar">
    <form class="search_form flex-container" method="get" action="../actions/action_search.php">
        <div class="search_input_field_large">
            <label class="search_label">Going to</label>
            <input class="search_input" name="destination" type="text" value="<?php if (isset($_GET['destination'])) {echo $destination;}?>" maxlength="35" placeholder="Destination">
        </div>
        <div class="search_input_field_medium">
            <label class="search_label">Check-In</label>
            <input class="search_input" name="checkin" id="checkin" type="date" value="<?php if (isset($_GET['checkin'])) {echo $checkin;}?>" min="<?php echo date("Y-m-d"); ?>" placeholder="dd/mm/yyyy">
        </div>
        <div class="search_input_field_medium">
            <label class="search_label">Check-Out</label>
            <input class="search_input" name="checkout" id="checkout" type="date" value="<?php if (isset($_GET['checkout'])) {echo $checkout;}?>" min="<?php echo date("Y-m-d"); ?>" placeholder="dd/mm/yyyy">
        </div>
        <div class="search_input_field_small">
            <label class="search_label">Guests</label>
            <input class="search_input" name="guests" type="number" value="<?php if (isset($_GET['guests'])) {echo $guests;} else {echo 1;}?>" min="1" max="100" maxlength="3" step="1">
        </div>
        <button class="submit_search_button" type="submit">Search</button>
    </form>
</div>
<script src="../js/searchbar_scroll.js" defer></script>
