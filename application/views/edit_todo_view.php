<form method="POST" action="/todo/update/?id=<?=$data[0]['id']?>">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body"><!-- Начало текстового контента -->
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#">Основные данные</a>
              </li>
            </ul>
            <br>
            <div class="tab-content">
              <div id="home" class="container tab-pane active"><br>
                <div class="form-group">
                  <label for="name">Имя</label>
                  <input name='name' value="<?= $data[0]['name'] ?>"
                   id='name'
                   type="text"
                   class="form-control"
                   minlength="3"
                   required>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input name='email' value="<?= $data[0]['email'] ?>"
                   id='email'
                   type="email"
                   class="form-control"
                   minlength="3">
                </div>

                <div class="form-group">
                  <label for="description">Описание</label>
                  <textarea name='description'
                   id='description'
                   class="form-control"
                   rows="3"><?= $data[0]['text'] ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <button type="submit" class="btn btn-block btn-primary">Сохранить</button>
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-body">
            ID: <?= $data[0]['id'] ?>
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="created_at">Создано</label>
              <input name='created_at' value="<?= $data[0]['created_at'] ?>"
                id='created_at'
                type="text"
                class="form-control"
                disabled="true">
            </div>

            <div class="form-group">
              <label for="updated_at">Изменено</label>
              <input name='updated_at' value="<?= $data[0]['updated_at'] ?>"
                id='updated_at'
                type="text"
                class="form-control"
                disabled="true">
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</form>