<?php
get_header('index');
get_template_part('parts/top');
get_template_part('parts/services-index');
get_template_part('parts/projects');
get_template_part('parts/about-index');
get_template_part('parts/certificates-index');
$questions = get_field('questions');
// get_template_part('parts/questions', null, array(
//     'is_grey' => false,
//     'questions' => $questions
// ));
// get_template_part('parts/reviews');
// get_template_part('parts/contacts-index');
get_footer();