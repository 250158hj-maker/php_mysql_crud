<?php
require_once './env.php';
require_once './lib/Database.php';

use Lib\Database;

// POSTリクエスト以外、またはIDがない場合は一覧へ戻す
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['id'])) {
  header('Location: select_users.php');
  exit;
}

$id = $_POST['id'] ?? null;
if ($id) {
  $result = delete($id);
}

header('Location: select_users.php');
exit;

/**
 * ユーザデータを削除する関数
 */
function delete($id)
{
  try {
    $pdo = Database::getInstance();
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute(['id' => $id]);
    return $result;
  } catch (PDOException $e) {
    error_log($e->getMessage());
    return false;
  }
}
