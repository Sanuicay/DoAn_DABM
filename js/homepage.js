document.getElementById('toggleBtn').addEventListener('click', function() {
    var hiddenElement = document.getElementById('hiddenElement');
    
    if (hiddenElement.classList.contains('hidden')) {
        hiddenElement.style.display = 'block'; // Show the element
        setTimeout(function() {
            hiddenElement.style.opacity = '1'; // Set opacity to 1 after a short delay
        }, 10);
        hiddenElement.classList.remove('hidden'); // Remove the 'hidden' class
    } else {
        hiddenElement.style.opacity = '0'; // Set opacity to 0
        setTimeout(function() {
            hiddenElement.style.display = 'none'; // Hide the element after the transition
        }, 500); // Adjust this time to match the transition duration
        hiddenElement.classList.add('hidden'); // Add the 'hidden' class
    }
});

let bookArray = [
    { book_name: 'Tiếng Việt 1 (Tập 1)', book_ID: '1'},
    { book_name: 'Tiếng Việt 1 (Tập 2)', book_ID: '2'},
    { book_name: 'Lược Sử Thời Gian', book_ID: '3'},
    { book_name: 'Đất Rừng Phương Nam', book_ID: '4'},
    { book_name: 'Doraemon', book_ID: '5'},
    { book_name: 'Giết Con Chim Nhại', book_ID: '7'},
    { book_name: 'Mắt Biếc', book_ID: '8'},
    { book_name: 'Thám Tử Lừng Danh Conan', book_ID: '9'},
    { book_name: 'Shin - Cậu Bé Bút Chì', book_ID: '10'},
    { book_name: 'Vũ Trụ Trong Vỏ Hạt Dẻ', book_ID: '11'},
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function(){
    let result = [];
    let input = inputBox.value;
    const bookNames = bookArray.map(book => book.book_name);
    if (input.length) {
        result = bookNames.filter((keyword)=>{
            return (keyword.toLowerCase().replace(/\s+/g, ' ').trim()).includes(input.toLowerCase().replace(/\s+/g, ' ').trim());
        });
        console.log(result);
    }
    display(result);

    if (!result.length) {
        resultsBox.innerHTML = '';
    }
}

function display(result){
    const content = result.map((list)=>{
        return "<li onclick=selectInput(this)>" + list + "</li>";
    });

    resultsBox.innerHTML = "<ul>" + content.join('') + "</ul> ";
}

function findBookID(bookName) {
    const bookObject = bookArray.find(book => book.book_name === bookName);
    return bookObject ? bookObject.book_ID : null;
}

function selectInput(bookName) {
    const ID = findBookID(bookName.innerHTML);
    // window.location.href = 'search_product.php?book=${encodeURIComponent(bookID)}';
    const url = 'search_product.php?book=' + ID;
    window.location.href = url;
}

function searchButton() {
    let searchTerm = inputBox.value.replace(/\s+/g, ' ').trim();
    const url = 'search_by_name.php?search=' + searchTerm;
    window.location.href = url;
}

function selectProduct(bookID) {
    const url = 'single_product.php?id=' + bookID;
    window.location.href = url;
}