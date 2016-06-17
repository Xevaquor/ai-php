
  var tbody;

  function colorize(tableBody) {
    items = tableBody.querySelectorAll('tr');
    for (i = 0; i < items.length; i++) {
	  color = "background-color: #DDDDDD";
      if ((i % 2) === 0) {
	  color = "background-color: #AAAAAA";
      } 
	  items[i].style = color;
    }
  }

  function onSave() {
    var row = this.parentNode.parentNode;
    items = row.querySelectorAll('.input');
    for (var i = 0; i < items.length; i++) {
      items[i].parentNode.innerText = items[i].value;
    }

    this.value = "edycja";
    this.removeEventListener('click', onSave);
    this.setAttribute('class', 'editbutton');
    this.addEventListener('click', onEdit);
  }

  function onAdd() {
    var tr = document.createElement("tr");
    var cell1 = document.createElement("td");
    cell1.innerHTML = '<input type="text" class="input"/>';
    var cell2 = document.createElement("td");
    cell2.innerHTML = '<input type="text" class="input" />';
    var cell3 = document.createElement("td");
    cell3.innerHTML = '<input type="text" class="input" />';
    var cell4 = document.createElement("td");
    cell4.innerHTML = `<input type="button" value="Zapis" class="savebutton" />
    <input type="button" value="Usuniecie" class="deletebutton" />`;
    tr.appendChild(cell1);
    tr.appendChild(cell2);
    tr.appendChild(cell3);
    tr.appendChild(cell4);
    tbody.appendChild(tr);
    cell4.querySelector('.deletebutton').addEventListener('click', onDelete);
    cell4.querySelector('.savebutton').addEventListener('click', onSave);
	colorize(tbody)
  }

  function onEdit() {
    var row = this.parentNode.parentNode;
    var items = row.querySelectorAll("td");
    for (var i = 0; i < items.length - 1; i++) {
      items[i].innerHTML = `<input type="text" value="${items[i].innerText}" />`;
    }
    this.value = "zapisz";
    this.removeEventListener('click', onEdit);
    this.setAttribute('class', 'savebutton');
    this.addEventListener('click', onSave);
  }

  function onDelete() {
    tbody.removeChild(this.parentNode.parentNode);
	colorize(tbody);
  }  

  function init() {  
    document.querySelector('#addbutton').addEventListener('click', onAdd);
    tbody = document.querySelector('table');
	colorize(tbody);
  }
  document.addEventListener('DOMContentLoaded', init);

