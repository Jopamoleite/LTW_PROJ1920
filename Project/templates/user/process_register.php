<?
  $value = $_GET['query'];
  $field = $_GET['field'];

  // Check name
  if ($field == 'username') {
    if (strlen($value) < 4) {
      echo 'Must be 3+ letters';
    } else if (preg_match('[\W]', $value)) {
      echo 'No special characters allowed';
    } else {
      echo 'Valid';
    }
  }else
  // Check email
  if ($field == 'email') {
    if (!preg_match('/([w-]+@[w-]+.[w-]+)/', $value)) {
      echo 'Invalid email';
    } else {
      echo 'Valid';
    }
  }
?>
