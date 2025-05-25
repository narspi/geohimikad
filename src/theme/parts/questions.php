<?php
$is_grey = $args['is_grey'];
$questions = $args['questions'];
if ($questions):
    ?>
    <section class="<?php if ($is_grey) echo 'questions questions--light';
    else echo 'questions'; ?>">
        <div class="container">
            <h2 class="title questions__title">
                Отвечаем на частые вопросы
            </h2>
            <div class="questions__items">
                <?php
                $i = 0;
                foreach ($questions as $question):
                    $is_active = $i === 0 ? true : false;
                    ?>
                    <div class="questions__item">
                        <p class="questions__item-title">
                            <button class="<?php if ($is_active) echo 'questions__item-btn active';
                            else echo 'questions__item-btn'; ?>"><?= esc_html($question['title']); ?></button>
                        </p>
                        <div class="<?php if ($is_active) echo 'questions__item-drop active';
                        else echo 'questions__item-drop'; ?>">
                            <p class="questions__item-text">
                                <?= esc_html($question['descr']); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    $i++;
                endforeach;
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>