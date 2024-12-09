<?php $pager->setSurroundCount(2) ?>
<div class="flex items-center justify-between mt-4">
    <div class="text-gray-600">Show 10 from 50</div>
    <nav aria-label="Page navigation">
        <ul class="inline-flex items-center space-x-2">
            <?php if ($pager->hasPrevious()) : ?>
                <li>
                    <a href="<?= $pager->getFirst() ?>"
                        class="px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100"
                        aria-label="<?= lang('Pager.first') ?>">
                        <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?= $pager->getPrevious() ?>"
                        class="px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100"
                        aria-label="<?= lang('Pager.previous') ?>">
                        <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
                    </a>
                </li>
            <?php endif ?>

            <!-- Displaying Page Links -->
            <?php foreach ($pager->links() as $link): ?>
                <li>
                    <a href="<?= $link['uri'] ?>"
                        class="px-3 py-2 text-sm font-medium <?= $link['active'] ? 'text-blue-600 bg-blue-100 border-blue-300' : 'text-gray-600 bg-white border-gray-300' ?> rounded-lg hover:bg-gray-100">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>

            <?php if ($pager->hasNext()) : ?>
                <li>
                    <a href="<?= $pager->getNext() ?>"
                        class="px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100"
                        aria-label="<?= lang('Pager.next') ?>">
                        <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?= $pager->getLast() ?>"
                        class="px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100"
                        aria-label="<?= lang('Pager.last') ?>">
                        <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</div>