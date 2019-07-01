<?php

function isDebug() {
    return defined('WP_DEBUG') && true === WP_DEBUG;
}

function errorNotice($message) {
    ?>
    <div class="error notice">
        <h1><?php _e('Fatal error!', PLUGIN_SLUG) ?></h1>
        <h3><?php _e('Please turn off plugin named', PLUGIN_SLUG);
    echo " - '" . PLUGIN_FULL_NAME . "'"
    ?> </h3>
        <p><?php _e($message, PLUGIN_SLUG); ?>.</p>
    </div>
    <?php
}

function errorDevNotice($exception) {
    ?>
    <div class="error notice">
        <h3>Error</h3>
        <h4><?= $exception->getMessage() ?></h4>
        <p><?= $exception->getFile() ?> (<?= $exception->getLine() ?>)</p>
        <hr/>
        <h3>Stacktrace</h3>
    <?php stackTrace($exception->getTrace()); ?>
    </div>
    <?php
}

function dumpNotice($var){
    ?>
    <div class="info notice">
        <h3>DUMP</h3>
        <pre>
            <?php var_dump($var) ?>
        </pre>
    </div>
    <?php
}

function stackTrace($stack) {
    foreach ($stack as $trace) {
      echo sprintf("<b>%s</b>::%s  <i>%s</i> (line: %s)<br/>", (isset($trace['class']))?$trace['class']:$trace['file'], $trace['function'],$trace['file'], $trace['line']);
    }
}
