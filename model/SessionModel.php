<?php

require_once(__DIR__ . "/Database.php");

class SessionModel {
  public static function saveSession(Session $session) : bool {
    $sql = "INSERT INTO tblSessions (session_date, pre_mood_index, post_mood_index, pre_med_notes, post_med_notes, session_length, user_id) VALUES (?,?,?,?,?,?,?)";
    Database::executeSql($sql, "siissii", array($session->session_date, $session->pre_mood_index, $session->post_mood_index, $session->pre_med_notes, $session->post_med_notes, $session->session_length, $session->user_id));
    return !isset(Database::$lastError);
  }
  public static function getSessions(string $username) : array {
      $sql = "SELECT * FROM tblSessions S, tblUsers U WHERE U.user_id = S.user_id AND U.username = ?";
      $results = Database::executeSql($sql, "i", array($username));
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