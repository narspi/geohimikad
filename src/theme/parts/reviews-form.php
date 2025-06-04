<div class="reviews-form" id="reviews-form">
    <div class="container">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
            <symbol id="star-shape" viewBox="0 0 72 67" fill="none">
                <path
                    d="M36 0L44.307 25.5664H71.1891L49.441 41.3673L57.7481 66.9336L36 51.1327L14.2519 66.9336L22.559 41.3673L0.810909 25.5664H27.693L36 0Z"
                    stroke="#FFE54E" fill="currentColor" />
            </symbol>
        </svg>
        <div class="title reviews-form__title">Вы можете оставить свой отзыв!</div>
        <form class="reviews-form__elem" data-url="<?php echo admin_url('admin-ajax.php'); ?>"
            enctype="multipart/form-data">
            <input type="hidden" name="security" value="<?php echo wp_create_nonce('submit_service_review_nonce'); ?>">
            <div class="reviews-form__column">
                <textarea class="reviews-form__textarea" name="message" placeholder="Текст вашего отзыва"></textarea>
                <label class="reviews-form__label-file" for="reviews-form-file">
                    Прикрепить фото или видео к отзыву
                </label>
                <input class="reviews-form__input-file" type="file" id="reviews-form-file" name="files[]"
                    accept="image/png, image/jpeg" multiple />
                <div class="reviews-form__file-preview"></div>
            </div>
            <div class="reviews-form__column">
                <input class="reviews-form__input" type="text" name="name" placeholder="Ваше имя" />
                <input class="reviews-form__input" type="tel" name="tel" placeholder="Ваш номер телефона" />
                <div class="reviews-form__wrap-choices">
                    <select class="reviews-form__service-choices" name="service"
                        data-placeholder="Услуга, о который вы оставляете отзыв">
                        <option value="Нет Услуги" placeholder>Нет услуги</option>
                        <?php
                        $services = get_posts([
                            'post_type' => 'service',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'orderby' => 'title',
                            'order' => 'ASC',
                        ]);

                        foreach ($services as $service)
                        {
                            echo '<option value="' . esc_attr($service->post_title) . '">' . esc_html($service->post_title) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <fieldset class="reviews-form__wrap-rating">
                    <legend class="reviews-form__legend-rating">Поставить рейтинг</legend>
                    <div class="reviews-form__rating">
                        <label class="reviews-form__star reviews-form__star--filled" for="reviews-form__rating-1"
                            title="Поставить рейтинг 1 из 5">
                            <input type="radio" name="rating" id="reviews-form__rating-1" value="1"
                                class="visually-hidden reviews-form__star-input" />
                            <span class="reviews-form__star-text">
                                Поставить рейтинг 1 из 5
                            </span>
                            <svg class="reviews-form__star-icon" aria-hidden="true" width="74" height="74">
                                <use href="#star-shape" />
                            </svg>
                        </label>
                        <label class="reviews-form__star reviews-form__star--filled" for="reviews-form__rating-2"
                            title="Поставить рейтинг 2 из 5">
                            <input type="radio" name="rating" id="reviews-form__rating-2" value="2"
                                class="visually-hidden reviews-form__star-input" />
                            <span class="reviews-form__star-text">
                                Поставить рейтинг 2 из 5
                            </span>
                            <svg class="reviews-form__star-icon" aria-hidden="true" width="74" height="74">
                                <use href="#star-shape" />
                            </svg>
                        </label>
                        <label class="reviews-form__star reviews-form__star--filled" for="reviews-form__rating-3"
                            title="Поставить рейтинг 3 из 5">
                            <input type="radio" name="rating" id="reviews-form__rating-3" value="3"
                                class="visually-hidden reviews-form__star-input" />
                            <span class="reviews-form__star-text">
                                Поставить рейтинг 3 из 5
                            </span>
                            <svg class="reviews-form__star-icon" aria-hidden="true" width="74" height="74">
                                <use href="#star-shape" />
                            </svg>
                        </label>
                        <label class="reviews-form__star reviews-form__star--filled" for="reviews-form__rating-4"
                            title="Поставить рейтинг 4 из 5">
                            <input type="radio" name="rating" id="reviews-form__rating-4" value="4" checked
                                class="visually-hidden reviews-form__star-input" />
                            <span class="reviews-form__star-text">
                                Поставить рейтинг 4 из 5
                            </span>
                            <svg class="reviews-form__star-icon" aria-hidden="true" width="74" height="74">
                                <use href="#star-shape" />
                            </svg>
                        </label>
                        <label class="reviews-form__star" for="reviews-form__rating-5" title="Поставить рейтинг 5 из 5">
                            <input type="radio" name="rating" id="reviews-form__rating-5" value="5"
                                class="visually-hidden reviews-form__star-input" />
                            <span class="reviews-form__star-text">
                                Поставить рейтинг 5 из 5
                            </span>
                            <svg class="reviews-form__star-icon" aria-hidden="true" width="74" height="74">
                                <use href="#star-shape" />
                            </svg>
                        </label>
                    </div>
                </fieldset>
                <button class="btn-red reviews-form__btn-submit">Оставить отзыв</button>
                <label class="reviews-form__policy">
                    <input class="reviews-form__checkbox" type="checkbox" required />
                    <span class="reviews-form__fake"></span>
                    <span>
                        Я ознакомлен и согласен с политикой обработки персональных данных, и
                        даю согласие на обработку моих персональных данных
                    </span>
                </label>
            </div>
        </form>
    </div>
</div>