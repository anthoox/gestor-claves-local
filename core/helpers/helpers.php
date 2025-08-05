<?php

function showErrors($errors, $field)
{
  if (isset($errors[$field]) && !empty($errors[$field])) {
    return "<div class='alert alert-danger'>{$errors[$field]}</div>";
  }
  return '';
}

function deleteErrors()
{
  $_SESSION['errors'] = null;
  // $deleted = session_unset($_SESSION['errors']);
  // return $deleted;
};
