<?php
class Testimonials_Test extends WP_UnitTestCase {
    public static function wpSetUpBeforeClass( $factory ) {
        if ( ! class_exists( 'Woothemes_Testimonials' ) ) {
            require dirname( __DIR__ ) . '/wp-content/plugins/testimonials-by-woothemes/woothemes-testimonials.php';
        }
        // Ensure the post type is registered for the tests.
        global $woothemes_testimonials;
        if ( isset( $woothemes_testimonials ) ) {
            $woothemes_testimonials->register_post_type();
            $woothemes_testimonials->register_taxonomy();
        }
    }

    public function test_get_testimonials_returns_array_when_entries_exist() {
        // Create a testimonial post.
        self::factory()->post->create( array(
            'post_type'   => 'testimonial',
            'post_status' => 'publish',
        ) );

        $testimonials = woothemes_get_testimonials();

        $this->assertIsArray( $testimonials );
        $this->assertNotEmpty( $testimonials );
    }
}

