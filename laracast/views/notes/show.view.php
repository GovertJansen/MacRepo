<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/laracast/notes" class="text-blue-500 hover:underline">go back...</a>
        </p>

        <p><?= $note['body'] ?></p>

        <form class="mt-6" method="POST">
            <input type="hidden" name="id" type="text" value="<?= $note['id'] ?>">
            <button class="text-sm text-red-500">Delete</button>
        </form>
    </div>
</main>

<?php require('views/partials/footer.php') ?>