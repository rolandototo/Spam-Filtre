<?php
/**
 * Plugin Name: Spam Filter
 * Description: A WordPress plugin that filters spam comments based on custom criteria.
 * Version: 1.0.0
 * Author: Rolando Escobar
 * Author URI: https://rolandototo.dev/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Filter spam comments
function filter_spam_comments( $approved, $comment_data ) {
    $ip_address = $comment_data['comment_author_IP'];
    $email = $comment_data['comment_author_email'];

    // Block comments from specific IP addresses
    $blocked_ips = array(
        '192.168.0.1',
        '10.0.0.2',
    );
    if ( in_array( $ip_address, $blocked_ips ) ) {
        return 'spam';
    }

    // Block comments with specific email addresses
    $blocked_emails = array(
        'example@example.com',
        'spam@spam.com',
    );
    if ( in_array( $email, $blocked_emails ) ) {
        return 'spam';
    }

    // Block comments with specific content
    $blocked_content = array(
        'casino',
        'viagra',
        'cialis',
    );
    foreach ( $blocked_content as $word ) {
        if ( stripos( $comment_data['comment_content'], $word ) !== false ) {
            return 'spam';
        }
    }

    return $approved;
}
add_filter( 'pre_comment_approved', 'filter_spam_comments', 10, 2 );