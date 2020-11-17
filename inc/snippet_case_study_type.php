<div class="tax-header">
    <span class="tag-label upper">
        <h6><?php 
            $terms = get_the_terms($post->ID, 'case_study_type');
            foreach ( $terms as $term ) {
                $postNames[] = $term->name;
            }
            if(count($postNames) > 0) {
                echo $postNames[0];
            } else {
                echo 'case study';
            }
            ?></h6>
    </span>
</div>
