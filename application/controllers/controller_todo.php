<?php

class Controller_Todo extends Controller
{

  function action_index()
  { 
    unset($_SESSION['open_new_edit_window']);
    $currentPage = $_GET['page'] ?? 1;

    $model = new Model_Todo();
    $data = $model->paginatorData(PAGINATION_COUNT , $currentPage);
    $paginator =  $model->paginatorLinks(PAGINATION_COUNT, $currentPage);

    $this->view->generate('index_todo_view.php', 'template_view.php', $data, $paginator);
  }

  function action_create()
  { 
    unset($_SESSION['open_new_edit_window']);
    $this->view->generate('create_todo_view.php', 'template_view.php');
  }

  function action_store()
  { 
    unset($_SESSION['open_new_edit_window']);
  	$model = new Model_Todo();
    $result = $model->insert();

    if($result)
      $msg = "Успешно сохранено";
    else 
      $msg = "Ошибка сохранения";

    $this->view->generate('404_view.php', 'template_view.php', $msg);
  }

  function action_edit()
  { 
    if(!checkAuth()) header('Location:/todo/');
    if(isset($_SESSION['open_new_edit_window'])){
      header('Location:/login/logout');
    } else {
      $_SESSION['open_new_edit_window'] = true;
    }

    $model = new Model_Todo();
    $data = $model->getById();
    
    $this->view->generate('edit_todo_view.php', 'template_view.php', $data);
  }

  function action_update()
  { 
    if(!checkAuth()) header('Location:/todo/');
    unset($_SESSION['open_new_edit_window']);

    $model = new Model_Todo();
    $result = $model->update();

    if($result)
      $msg = "Успешно сохранено";
    else 
      $msg = "Ошибка сохранения";

    $this->view->generate('404_view.php', 'template_view.php', $msg);
  }
}