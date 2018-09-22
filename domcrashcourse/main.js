var form = document.getElementById('addForm');
var itemList = document.getElementById('items');
var filter = document.getElementById('filter');

//Form event listner
form.addEventListener('submit', addItem);
itemList.addEventListener('click', removeItem);
filter.addEventListener("keyup", filterItems);

//Add Item function
function addItem(e){
    e.preventDefault();  
    
    //Get input item
    var newItem = document.getElementById('item').value;

    //Create a li element
    var li = document.createElement('li');
    //Add class
    li.className = 'list-group-item';
    //Add text node with input value
    li.appendChild(document.createTextNode(newItem));

    //Create a delete button

    var delBtn = document.createElement('button');
    //Add class to button
    delBtn.className  = 'btn btn-danger btn-sm float-right delete';
    // Append text 
    delBtn.appendChild(document.createTextNode('X'));

    li.appendChild(delBtn);

    itemList.appendChild(li);
}

//Remove Item
function removeItem(e){
    if(e.target.classList.contains('delete')){
        if(confirm("Are you Sure?")){
            var li = e.target.parentElement;
            itemList.removeChild(li);
        }
    }
}

//Filter Items
function filterItems(e){
    //convert text to lowercase
    var text =  e.target.value.toLowerCase();

    //Get list
    var items = itemList.getElementsByTagName('li');

    //Convert it to array
    Array.from(items).forEach(function(item){
        var itemName = item.firstChild.textContent;
        if(itemName.toLowerCase().indexOf(text) != -1){
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
    });

}