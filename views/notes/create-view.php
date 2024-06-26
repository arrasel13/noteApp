<?php
require base_path('views/partials/header.php');
require base_path('views/partials/navbar.php');
require base_path('views/partials/banner.php');
?>

    <main>
        <div class="mx-auto max-w-3xl py-6 sm:px-6 lg:px-8">
            <form method="POST" action="/note">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="notebody" class="block text-sm font-medium leading-6 text-gray-900">Note Content</label>
                                <div class="mt-2">
                                    <textarea id="notebody" name="notebody" rows="8" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6" placeholder="Note body content here..."><?= $_POST['notebody'] ?? '' ?></textarea>
                                </div>
                                <?php if(isset($errors['body'])): ?>
                                    <p class="mt-3 text-sm leading-6 text-red-600"><?= htmlspecialchars($errors['body']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-3">
                    <a href="/notes" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancel</a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </div>
    </main>



<?php
require base_path('views/partials/footer.php');
?>