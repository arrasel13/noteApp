<?php
require 'views/partials/header.php';
require 'views/partials/navbar.php';
require 'views/partials/banner.php';
?>

    <main>
        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
            <p>
                <?= htmlspecialchars($note['body']); ?>
            </p>
        </div>
    </main>

<?php
require 'views/partials/footer.php';
?>