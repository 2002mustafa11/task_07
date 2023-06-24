<?php

if(session_status() == PHP_SESSION_NONE) session_start();

if(isset($_SESSION['success'])) {

    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
    
} elseif(isset($_SESSION['errors'])) {
?>
    <div class="alert alert-danger">
        <ul>
            <?php
                foreach($_SESSION['errors'] as $error) {
                    echo "<li>$error</li>";
                }
            ?>
        </ul>
    </div>
<?php
unset($_SESSION['errors']);
}
?>