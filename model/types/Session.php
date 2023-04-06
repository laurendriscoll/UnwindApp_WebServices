<?php
require_once(__DIR__ . "/Base.php");
class Session extends Base {
    public $session_id, $session_date, $pre_mood_index, $post_mood_index, $pre_med_notes, $post_med_notes, $session_length, $user_id;
    public function __construct($sourceObject) {
        parent::__construct($sourceObject);
    }
}