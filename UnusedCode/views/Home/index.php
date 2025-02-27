<?php

namespace Skeleton\Views\Home;
?>


<div class="container">
<b>Test</b>
    <!-- <?php foreach ($data ?? (object)[] as $section) : ?>
        <section class="resume" id="<?= trim(strtolower($section->title), ' ') ?>">
            <div class="resume-content">
                <h2 class="mb-3"><?= $section->title ?></h2>
                <?php foreach ($section->entries ?? (object)[] as $entry) : ?>
                    <div class="mb-3 content">
                        <div class="content-body">
                            <h3><?= $entry->position ?></h3>
                            <div class="subhead mb-1"><?= $entry->at ?></div>
                            <p><?= $entry->description ?></p>
                        </div>
                        <div class="content-footer">
                            <?= $entry->from ?> - <?= $entry->to ?? 'Present' ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <hr class="m-0">--!>
    <?php endforeach; ?>
</div>