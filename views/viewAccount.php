<?php $this->_t = 'Account' ?>
<section id="account">
    <div class="container account">
        <?php
            foreach($images as $i){
                ?>
                    <div class="account_card">
                        <div class="account_card_top">
                            <img src="<?= $i->image_url() ?>" alt="Image : <?= $i->id() ?>">
                        </div>
                        <div class="account_card_bottom">
                            <a href="<?= $i->image_url() ?>" target="_blank">See</a>
                            <a href="/account-delete-<?= $i->id() ?>">Delete</a>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</section>
