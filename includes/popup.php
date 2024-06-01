<?php
    echo '<div class="popup-close-overlay"></div>

    <div class="confirm-popup">
        <div class="popup-content">
            <i class="fa-regular fa-circle-xmark"></i>
            <h2>Are you Sure ?</h2>
            <span>Do you really want to delete your Account ?</span>
            <span>This process can not be undone.</span>
        </div>
        <div class="popup-btn">
            <button id="close-popup-modal">Cancel</button>
            <a href="./Auth/_delete_user.php?delete_account=true">Delete</a>
        </div>
    </div>';
?>