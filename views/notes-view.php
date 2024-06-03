<?php
require 'views/partials/header.php';
require 'views/partials/navbar.php';
require 'views/partials/banner.php';
?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <h1>This is <?= $headerText; ?> Page</h1>
        </div>
    </main>

<?php
require 'views/partials/footer.php';
?>