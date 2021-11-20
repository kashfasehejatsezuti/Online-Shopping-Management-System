//Book Class:Represent a Book
class Book{

	constructor(title,author,isbn)
	{
		this.title=title;
		this.author=author;
		this.isbn=isbn;
	}
}
//UI Class:Handel UI Tasks
class UI
{
	static displayBooks()
	{
		const books=Store.getBooks();

		books.forEach((book)=> UI.addBookToList(book));
	}
		static addBookToList(book)
		{
          const list =document.querySelector('#book-list');
          const row= document.createElement('tr');
          row.innerHTML= `
             <td>${book.title}</td>
             <td>${book.author}</td>
             <td>${book.isbn}</td>
             <td><a href="#" class ="btn btn-danger btn-sm delete">X</a></td>
             
             

          `;
          list.appendChild(row);
      }


        static deleteBook(el)
        {
        	if(el.classList.contains('delete'))
        	{ 
        		el.parentElement.parentElement.remove();
        	}

        	}


          static showAlert(message,className)
          {
          	const div=document.createElement('div');
          	div.className =`alert alert-${className}`;
          	div.appendChild(document.createTextNode(message));
          	const container =document.querySelector('.container');
          	const form =document.querySelector('#book-form');
          	container.insertBefore(div,form);
          	//vanish in 3 sec
          	setTimeout(()=> document.querySelector('.alert').remove(),3000);
          }


          static clearFields()
        
        {
	document.querySelector('#title').value='';
	document.querySelector('#author').value='';
	document.querySelector('#isbn').value='';
     }		
}




//Store Class:Handle Storage

class Store{

	static getBooks()
	{
		let books;
		if(localStorage.getItem('books')==null)
		{
			books=[];
		}
		else{
			books=JSON.parse(localStorage.getItem('books'));
		}
		return books;

	}
	static addBook(book)
	{
		const books=Store.getBooks();
		books.push(book);
		localStorage.setItem('books',JSON.stringify(books));
	}

	static removeBook(isbn)
	{
		const books=Store.getBooks();

	  books.forEach((book,index) =>
	  {
		if(book.isbn===isbn)
		{
			books.splice(index,1);
		}
	});
	localStorage.setItem('books',JSON.stringify(books));	
	}
}
//Event:Display Books
document.addEventListener('DOMContentLoaded',UI.displayBooks);

//Event:Add a Book



document.querySelector('#book-form').addEventListener('submit',(e)=> 
{
console.log("a");
// Prevent actual submit
	e.preventDefault();
//Get Value
const title = document.querySelector('#title').value;
const author = document.querySelector('#author').value;
const isbn = document.querySelector('#isbn').value;

//Validation
if(title==''|| author==''|| isbn=='')
{
	UI.showAlert ('Please Fill in all Fields' , 'info');

}
else {
	//Instatite book
const book = new Book(title,author,isbn);
//add book
UI.addBookToList(book);
//add book to stroge
Store.addBook(book);
UI.showAlert ('Book Add' , 'success');
UI.clearFields();

}



});
//Event:Remove a Book
document.querySelector('#book-list').addEventListener('click',(e)=>
{
	//console.log("a");
 UI.deleteBook(e.target)
// Remove to Store
 Store.removeBook(e.target.parentElement.previousElementSibling.textContent);

 UI.showAlert ('Book Removed' , 'danger');
});
