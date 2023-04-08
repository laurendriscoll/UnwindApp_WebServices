<?php

require_once(__DIR__ . "/Database.php");

class SessionModel {
  public static function saveSession(Session $session) : bool {
    $sql = "INSERT INTO tblSessions (session_date, pre_mood_index, post_mood_index, pre_med_notes, post_med_notes, session_length, user_id) VALUES (?,?,?,?,?,?,?)";
    Database::executeSql($sql, "siissii", array($session->session_date, $session->pre_mood_index, $session->post_mood_index, $session->pre_med_notes, $session->post_med_notes, $session->session_length, $session->user_id));
    return !isset(Database::$lastError);
  }
  public static function getSessions(int $user_id) : array {
      $sql = "SELECT * FROM tblSessions WHERE user_id = ?";
      $results = Database::executeSql($sql, "i", array($user_id));
      $sessions = array();
      foreach ($results as $result) {
          array_push($sessions, new Session($result));
      }
      return $sessions;
  }
  public static function deleteSession(int $session_id) : bool{
    $sql = "DELETE FROM tblSessions WHERE session_id = ?";
    Database::executeSql($sql, "i", array($session_id));
    return !isset(Database::$lastError);
  }
  public static function updateSession(Session $session) : bool{
    $sql = "UPDATE tblSessions SET session_date = ?, pre_mood_index = ?, post_mood_index = ?, pre_med_notes = ?, post_med_notes = ?, session_length = ?, user_id = ? WHERE session_id = ?";
    Database::executeSql($sql, "siissiii", array($session->session_date, $session->pre_mood_index, $session->post_mood_index, $session->pre_med_notes, $session->post_med_notes, $session->session_length, $session->user_id, $session->session_id));
    return !isset(Database::$lastError);
  }
}