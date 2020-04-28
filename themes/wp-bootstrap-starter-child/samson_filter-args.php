
<form action="/" class="form ">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div><b>МЕСТОПОЛОЖЕНИЕ:</b></div>
        <input class="filter_input" type="text" name="координаты_местонахождения">
      </div>
      <div class="col-sm-4">
        <div><b>КОЛИЧЕСТВО ЭТАЖЕЙ:</b></div>
        <input class="filter_input" type="number" name="количество_этажей">
      </div>
      <div class="col-sm-4">
        <div><b>ТИП СТРОЕНИЯ:</b></div>
        <label for="панель">панель</label>
        <input class="filter_input" type="radio" id="панель" name="тип_строения" value="панель">
        <label for="кирпич">кирпич</label>
        <input class="filter_input" type="radio" id="кирпич" name="тип_строения" value="кирпич">
        <label for="пеноблок">пеноблок</label>
        <input class="filter_input" type="radio" id="пеноблок" name="тип_строения" value="пеноблок">
      </div>
     </div>
    <div class="row">
      <div class="col-sm-4">
        <div><b>ЭКОЛОГИЧНОСТЬ:</b></div>
        <input class="filter_input" type="number" name="экологичность">
      </div>
      <div class="col-sm-4">
        <div><b>ПЛОЩАДЬ:</b></div>
        <input class="filter_input" type="number" name="помещение_площадь">
      </div>
      <div class="col-sm-4">
        <div><b>КОЛ.КОМНАТ:</b></div>
        <input class="filter_input" type="number" name="помещение_кол_комнат">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div><b>БАЛКОН:</b></div>
        <label for="балкон">Да</label>
        <input class="filter_input" type="radio" name="помещение_балкон" value="да">
        <label for="балкон">Нет</label>
        <input class="filter_input" type="radio" name="помещение_балкон" value="нет">
      </div>
      <div class="col-sm-4">
        <div><b>САНУЗЕЛ:</b></div>
        <label for="санузел">Да</label>
        <input class="filter_input" type="radio" name="помещение_санузел" value="да">
        <label for="санузел">Нет</label>
        <input class="filter_input" type="radio" name="помещение_санузел" value="нет">
      </div>
    </div>
  </div>
</form>
