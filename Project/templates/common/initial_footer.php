<footer>
    <div id='alert_msg'>
        <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
    </div> 
</footer>
</html>
