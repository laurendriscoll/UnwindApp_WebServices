<?php

require_once(__DIR__ . "/Database.php");

class SessionModel {
  public static function saveSession(Session $session) : bool {
    $sql = "INSERT INTO tblSessions (session_date, pre_mood_index, post_mood_index, pre_med_notes, post_med_notes, session_length, user_id) values (?,?,?,?,?,?,?)";
    Database::executeSql($sql, "siissii", array($session->session_date, $session->pre_mood_index, $session->post_mood_index, $session->pre_med_notes, $session->post_med_notes, $session->session_length, $session->user_id));
    return true;
  }
  public static function getSessions() : array {
      $sql = "SELECT * FROM tblSessions";
      $results = Database::executeSql($sql);
      return $results;
  }
  function deleteSession(int $session_id) {
    $sql = "DELETE FROM tblSessions WHERE session_id = ?";
    Database::executeSql($sql, "i", array($session_id));
    return true;
  }
  function updateSession(Session $session) {
    $sql = "UPDATE tblSessions SET (session_date, pre_mood_index, post_mood_index, pre_med_notes, post_med_notes, session_length, user_id) = (?,?,?,?,?,?,?) WHERE session_id = ?";
    Database::executeSql($sql, "siissii", array($session->session_date, $session->pre_mood_index, $session->post_mood_index, $session->pre_med_notes, $session->post_med_notes, $session->session_length, $session->user_id, $session->$session_id));
    return true;
  }
}